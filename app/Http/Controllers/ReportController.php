<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use PDF;
use App\Cash;
use App\Sale;
use App\User;
use App\Expense;
use App\Payment;
use App\Prevdue;
use App\Section;
use App\Employee;
use App\Expensecategory;
use App\Purchase;
use App\Supplier;
use Carbon\Carbon;
use App\Supplierdue;
use App\GeneralOption;
use App\Returnproduct;
use App\MarketingReport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');

        $this->middleware('permission:customer.statements')->only('posUserStatement','showPosUserstatement','pdfPosUserstatement');

        $this->middleware('permission:customer.details.statements')->only('posDeatilStatement','showPosDeatilStatement','pdfPosDeatilStatement');

        $this->middleware('permission:customer.due.report')->only('InvDueReport','InvDueReportResult', 'pdfInvDueReportResult');


        $this->middleware('permission:cash.report')->only('cashreport','showcashreport','pdfcashreport');
        $this->middleware('permission:sales.report')->only('SalesReport','SalesReportResult','pdfSalesReport');
        $this->middleware('permission:delivery.report')->only('DeliveryReport','ShowDeliveryReport','pdfDeliveryReport');
        $this->middleware('permission:supplier_due.report')->only('supplierdue','showsupplierdue','pdfsupplierdue');
    }

    public function date_sort($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    }
    public function date_sort_desc($a, $b) {
        return  strtotime($b['date']) - strtotime($a['date']);
    }






    public function posUserStatement(){
        $users = User::where('user_type','pos')->get();
        return view('pos.report.userstatement',compact('users'));
    }



    public function showPosUserstatement(Request $request){
        $this->validate($request,[
            'user' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $current_user = User::findOrFail($request->user);
        $users = User::where('user_type','pos')->get();


        $prevdues = Prevdue::where('user_id',$request->user)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('due_at', 'ASC')->get();

        $sales = Sale::where('user_id',$request->user)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();


        $returns = Returnproduct::where('user_id',$request->user)->whereBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('returned_at', 'ASC')->get();


        $cashes = Cash::where('status',1)->where('user_id',$request->user)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();


        $salesinfo = [];
        foreach($sales as $sale){
            $salesinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$sale->sales_at)->format('d-m-Y'),
                'id' => $sale->id,
                'particular'=>  'sales',
                'debit' => $sale->amount,
                'credit' => 0,
                'reference' => NULL,
                'discount' => 0,
            ];
        }

        $returninfo = [];
        foreach($returns as $return){
            $returninfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$return->returned_at)->format('d-m-Y'),
                'id' => $return->id,
                'particular'=>  'return',
                'debit' => 0,
                'credit' => $return->amount,
                'reference' => NULL,
                'discount' => 0,
            ];
        }

        $prevdue_info = [];

        foreach($prevdues as $pvd){
            $prevdue_info[] = [
                'date' => Carbon::createFromFormat('Y-m-d H:i:s',$pvd->due_at)->format('d-m-Y'),
                'id' => $pvd->id,
                'particular'=>  'prevdue',
                'debit' => $pvd->amount,
                'credit' => 0,
                'reference' => $pvd->reference,
                'discount' => 0,
            ];
        }

        $cashinfo = [];
        foreach($cashes as $cash){
            $cashinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$cash->received_at)->format('d-m-Y'),
                'id' => $cash->id,
                'particular'=>  'cash',
                'debit' => 0,
                'credit' => $cash->amount,
                'reference' => $cash->reference,
                'discount' => $cash->discount,
            ];
        }



        $merge_data =  array_merge($salesinfo,$returninfo, $cashinfo,$prevdue_info);

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'id' => $merge['id'],'particular' => $merge['particular'], 'debit' => $merge['debit'], 'credit' => $merge['credit'],'discount' => $merge['discount'],'reference' => $merge['reference'] ];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));


        $previous_sales = Sale::where('user_id',$request->user)
            ->where('sales_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_returns = Returnproduct::where('user_id',$request->user)
            ->where('returned_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_cashes = Cash::where('status',1)
            ->where('user_id',$request->user)
            ->where('received_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_prevdue = Prevdue::where('user_id',$request->user)
            ->where('due_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $balance = ($previous_sales+$previous_prevdue) - ($previous_returns + $previous_cashes);


        return view('pos.report.showuserstatement',compact('datewise_sorted_data','request','users','balance','current_user'));

    }




    public function pdfPosUserstatement(Request $request){
        $this->validate($request,[
            'user' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);

        $current_user = User::findOrFail($request->user);
        $users = User::where('user_type','pos')->get();


        $prevdues = Prevdue::where('user_id',$request->user)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('due_at', 'ASC')->get();

        $sales = Sale::where('user_id',$request->user)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();


        $returns = Returnproduct::where('user_id',$request->user)->whereBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('returned_at', 'ASC')->get();


        $cashes = Cash::where('status',1)->where('user_id',$request->user)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();


        $salesinfo = [];
        foreach($sales as $sale){
            $salesinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$sale->sales_at)->format('d-m-Y'),
                'id' => $sale->id,
                'particular'=>  'sales',
                'debit' => $sale->amount,
                'credit' => 0,
                'reference' => NULL,
                'discount' => 0,
            ];
        }

        $returninfo = [];
        foreach($returns as $return){
            $returninfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$return->returned_at)->format('d-m-Y'),
                'id' => $return->id,
                'particular'=>  'return',
                'debit' => 0,
                'credit' => $return->amount,
                'reference' => NULL,
                'discount' => 0,
            ];
        }

        $prevdue_info = [];

        foreach($prevdues as $pvd){
            $prevdue_info[] = [
                'date' => Carbon::createFromFormat('Y-m-d H:i:s',$pvd->due_at)->format('d-m-Y'),
                'id' => $pvd->id,
                'particular'=>  'prevdue',
                'debit' => $pvd->amount,
                'credit' => 0,
                'reference' => $pvd->reference,
                'discount' => 0,
            ];
        }

        $cashinfo = [];
        foreach($cashes as $cash){
            $cashinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$cash->received_at)->format('d-m-Y'),
                'id' => $cash->id,
                'particular'=>  'cash',
                'debit' => 0,
                'credit' => $cash->amount,
                'reference' => $cash->reference,
                'discount' => $cash->discount,
            ];
        }


        $merge_data =  array_merge($salesinfo,$returninfo, $cashinfo,$prevdue_info);

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'id' => $merge['id'],'particular' => $merge['particular'], 'debit' => $merge['debit'], 'credit' => $merge['credit'],'discount' => $merge['discount'],'reference' => $merge['reference'] ];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));


        $previous_sales = Sale::where('user_id',$request->user)
            ->where('sales_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_returns = Returnproduct::where('user_id',$request->user)
            ->where('returned_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_cashes = Cash::where('status',1)->where('user_id',$request->user)
            ->where('received_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_prevdue = Prevdue::where('user_id',$request->user)
            ->where('due_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $balance = ($previous_sales+$previous_prevdue) - ($previous_returns + $previous_cashes);

        $pdf = PDF::loadView('pos.report.pdfuserstatement',compact('datewise_sorted_data','request','users','balance','current_user','general_opt_value'));

        Storage::put('public/statements/'.Str::slug($current_user->name).'-from-'.$request->start.'-to-'.$request->end.'.pdf', $pdf->output());
        return $pdf->download('Satements Of '.$current_user->name.' from '.$request->start.' to '.$request->end.'.pdf');


    }




    public function posDeatilStatement(){
        $users = User::where('user_type','pos')->get();
        return view('pos.report.detailstatement',compact('users'));
    }


    public function showPosDeatilStatement(Request $request){
        $this->validate($request,[
            'user' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $current_user = User::findOrFail($request->user);
        $users = User::where('user_type','pos')->get();


        $prevdues = Prevdue::where('user_id',$request->user)
            ->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])
            ->orderBy('due_at', 'ASC')
            ->get();

        $sales = Sale::with('product')
            ->where('user_id',$request->user)
            ->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])
            ->orderBy('sales_at', 'ASC')
            ->get();

        $returns = Returnproduct::with('product')
            ->where('user_id',$request->user)
            ->whereBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])
            ->orderBy('returned_at', 'ASC')
            ->get();


        $cashes = Cash::where('status',1)
            ->where('user_id',$request->user)
            ->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])
            ->orderBy('received_at', 'ASC')
            ->get();

        $salesinfo = [];

        foreach($sales as $sale){
            $salesinfo[] = [
                'date' => Carbon::createFromFormat('Y-m-d H:i:s',$sale->sales_at)->format('d-m-Y'),
                'id' => $sale->id,
                'particular'=>  'sales',
                'debit' => $sale->amount,
                'credit' => 0,
                'product' => $sale->product,
                'discount'=> $sale->discount,
                'carrying_and_loading' => $sale->carrying_and_loading,
                'reference' => ''
            ];
        }

        $returninfo = [];
        foreach($returns as $return){
            $returninfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$return->returned_at)->format('d-m-Y'),
                'id' => $return->id,
                'particular'=>  'return',
                'debit' => 0,
                'credit' => $return->amount,
                'product' => $return->product,
                'discount'=> $return->discount,
                'carrying_and_loading' => $return->carrying_and_loading,
                'reference' => ''];
        }

        $prevdue_info = [];

        foreach($prevdues as $pvd){
            $prevdue_info[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$pvd->due_at)->format('d-m-Y'),
                'id' => $pvd->id,
                'particular'=>  'prevdue',
                'debit' => $pvd->amount,
                'credit' => 0,'product' => [],
                'discount'=> 0,
                'carrying_and_loading' => 0,
                'reference' => $pvd->reference
            ];
        }

        $cashinfo = [];
        foreach($cashes as $cash){
            $cashinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$cash->received_at)->format('d-m-Y'),
                'id' => $cash->id,
                'particular'=>  'cash',
                'debit' => 0,  'credit' => $cash->amount,
                'product' => [],
                'discount'=> $cash->discount,
                'carrying_and_loading' => 0,
                'reference' => $cash->reference
            ];
        }


        $merge_data =  array_merge($salesinfo,$returninfo,$cashinfo,$prevdue_info);

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = [
                'date' => $merge['date'],
                'id' => $merge['id'],
                'particular' => $merge['particular'],
                'debit' => $merge['debit'],
                'credit' => $merge['credit'],
                'product' => $merge['product'],
                'discount' => $merge['discount'],
                'carrying_and_loading' => $merge['carrying_and_loading'],
                'reference' => $merge['reference']];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));

        $previous_sales = Sale::where('user_id',$request->user)
            ->where('sales_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_returns = Returnproduct::where('user_id',$request->user)
            ->where('returned_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_cashes = Cash::where('status',1)
            ->where('user_id',$request->user)
            ->where('received_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_prevdue = Prevdue::where('user_id',$request->user)
            ->where('due_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $balance = ($previous_sales+$previous_prevdue) - ($previous_returns + $previous_cashes);


        return view('pos.report.showdetailstatements',compact('datewise_sorted_data','request','users','balance','current_user'));

    }





    public function pdfPosDeatilStatement(Request $request){
        $this->validate($request,[
            'user' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);

        $current_user = User::findOrFail($request->user);
        $users = User::where('user_type','pos')->get();



        $prevdues = Prevdue::where('user_id',$request->user)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('due_at', 'ASC')->get();

        $sales = Sale::with('product')->where('user_id',$request->user)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();


        $returns = Returnproduct::with('product')->where('user_id',$request->user)->whereBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('returned_at', 'ASC')->get();


        $cashes = Cash::where('status',1)->where('user_id',$request->user)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();


        $salesinfo = [];
        foreach($sales as $sale){
            $salesinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$sale->sales_at)->format('d-m-Y'), 'id' => $sale->id, 'particular'=>  'sales', 'debit' => $sale->amount,  'credit' => 0,'product' => $sale->product,'discount'=> $sale->discount, 'carrying_and_loading' => $sale->carrying_and_loading,'reference' => ''];
        }

        $returninfo = [];
        foreach($returns as $return){
            $returninfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$return->returned_at)->format('d-m-Y'), 'id' => $return->id, 'particular'=>  'return', 'debit' => 0,  'credit' => $return->amount,'product' => $return->product,'discount'=> $return->discount, 'carrying_and_loading' => $return->carrying_and_loading,'reference' => ''];
        }

        $prevdue_info = [];

        foreach($prevdues as $pvd){
            $prevdue_info[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$pvd->due_at)->format('d-m-Y'), 'id' => $pvd->id, 'particular'=>  'prevdue', 'debit' => $pvd->amount,  'credit' => 0,'product' => [],'discount'=> 0, 'carrying_and_loading' => 0,'reference' => $pvd->reference];
        }

        $cashinfo = [];
        foreach($cashes as $cash){
            $cashinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$cash->received_at)->format('d-m-Y'),
                'id' => $cash->id,
                'particular'=>  'cash',
                'debit' => 0,
                'credit' => $cash->amount,
                'product' => [],
                'discount'=> $cash->discount,
                'carrying_and_loading' => 0,
                'reference' => $cash->reference
            ];
        }


        $merge_data =  array_merge($salesinfo,$returninfo,$cashinfo,$prevdue_info);

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'id' => $merge['id'],'particular' => $merge['particular'], 'debit' => $merge['debit'], 'credit' => $merge['credit'],'product' => $merge['product'], 'discount' => $merge['discount'], 'carrying_and_loading' => $merge['carrying_and_loading'],'reference' => $merge['reference']];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));


        $previous_sales = Sale::where('user_id',$request->user)
            ->where('sales_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_returns = Returnproduct::where('user_id',$request->user)
            ->where('returned_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_cashes = Cash::where('status',1)->where('user_id',$request->user)
            ->where('received_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $previous_prevdue = Prevdue::where('user_id',$request->user)
            ->where('due_at', '<', $request->start." 00:00:00")
            ->sum('amount');

        $balance = ($previous_sales+$previous_prevdue) - ($previous_returns + $previous_cashes);



        $pdf = PDF::loadView('pos.report.pdfdetailstatements',compact('datewise_sorted_data','request','users','balance','current_user','general_opt_value'));

        Storage::put('public/detailstatements/'.Str::slug($current_user->name).'-from-'.$request->start.'-to-'.$request->end.'.pdf', $pdf->output());
        return $pdf->download('Satements Of '.$current_user->name.' from '.$request->start.' to '.$request->end.'.pdf');


    }


    public function InvDueReport(){
        $sections = Section::where('module','inventory')->get();
        return view('pos.report.invduereport',compact('sections'));
    }

    public function InvDueReportResult(Request $request){
        $this->validate($request,[
            'section' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

    $sections = Section::all();
    if($request->section === 'all'){
        $poscustomer = User::with('section')->where('user_type','pos')->get();
    }else{
        $poscustomer = User::with('section')->where('user_type','pos')->where('section_id',$request->section)->get();
    }

    $inv_due_report = [];

    foreach($poscustomer as $customer){


        $prevdues = Prevdue::where('user_id',$customer->id)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

        $sales = Sale::where('user_id',$customer->id)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $returns = Returnproduct::with('product')->where('user_id',$customer->id)->whereBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $cashes = Cash::where('status',1)->where('user_id',$customer->id)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');



        $previous_prevdue =Prevdue::where('user_id',$customer->id)->whereNotBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

        $previous_sales = Sale::where('user_id',$customer->id)->whereNotBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $previous_returns = Returnproduct::with('product')->where('user_id',$customer->id)->whereNotBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $previous_cashes = Cash::where('status',1)->where('user_id',$customer->id)->whereNotBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

        $prev_balance = ($previous_sales+ $previous_prevdue)-( $previous_cashes+$previous_returns);



        $inv_due_report [] = ['customer' => $customer->name,'address' => $customer->address,'section' => $customer->section->name,'sales' => $sales, 'returns' => $returns, 'cashes' => $cashes,'prevdues' => $prevdues, 'prev_balance' =>  $prev_balance];

    }


    return view('pos.report.showinvduereport',compact('inv_due_report','request','sections'));


    }


    public function pdfInvDueReportResult(Request $request){
        $this->validate($request,[
            'section' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
    $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
    $general_opt_value = json_decode($general_opt->options, true);

    $sections = Section::all();
    if($request->section === 'all'){
        $poscustomer = User::with('section')->where('user_type','pos')->get();
    }else{
        $poscustomer = User::with('section')->where('user_type','pos')->where('section_id',$request->section)->get();
    }

    $inv_due_report = [];

    foreach($poscustomer as $customer){
        $prevdues = Prevdue::where('user_id',$customer->id)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

        $sales = Sale::where('user_id',$customer->id)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $returns = Returnproduct::with('product')->where('user_id',$customer->id)->whereBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $cashes = Cash::where('status',1)->where('user_id',$customer->id)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');



        $previous_prevdue =Prevdue::where('user_id',$customer->id)->whereNotBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

        $previous_sales = Sale::where('user_id',$customer->id)->whereNotBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $previous_returns = Returnproduct::with('product')->where('user_id',$customer->id)->whereNotBetween('returned_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');


        $previous_cashes = Cash::where('status',1)->where('user_id',$customer->id)->whereNotBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

        $prev_balance = ($previous_sales+ $previous_prevdue)-( $previous_cashes+$previous_returns);



        $inv_due_report [] = ['customer' => $customer->name,'address' => $customer->address,'section' => $customer->section->name,'sales' => $sales, 'returns' => $returns, 'cashes' => $cashes,'prevdues' => $prevdues, 'prev_balance' =>  $prev_balance];

    }

    $pdf = PDF::loadView('pos.report.pdfshowinvduereport',compact('inv_due_report','request','sections','general_opt_value'));
    return $pdf->download('Due Report from '.$request->start.' to'.$request->end.'.pdf');

    }



    public function cashreport(){
        $sections = Section::where('module','inventory')->get();
        return view('general_report.cashreport',compact('sections'));
    }

    public function showcashreport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'section' => 'required',
        ]);

        $sections = Section::where('module','inventory')->get();
        if($request->section === 'all'){
            $poscashes = Cash::where('status',1)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();
        }else{
            $users = User::where('user_type','pos')->where('section_id',$request->section)->select('id')->get();
            $poscashes = Cash::whereIn('user_id',$users)->where('status',1)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();
        }


        $poscashinfo = [];
        foreach($poscashes as $cash){
            $poscashinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$cash->received_at)->format('d-m-Y'),'user_id' => $cash->user_id, 'id' => $cash->id, 'amount' => $cash->amount, 'discount'=> $cash->discount,'reference' => $cash->reference,'source' =>'inventory'];
        }


        $merge_data =  $poscashinfo;

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'user_id' => $merge['user_id'],'id' => $merge['id'], 'amount' => $merge['amount'],'reference' => $merge['reference'],'discount'=> $merge['discount'],'source' => $merge['source']  ];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));

        return view('general_report.showcashreport',compact('datewise_sorted_data','request','sections'));

    }

    public function pdfcashreport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'section' => 'required',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);


        $sections = Section::all();
        if($request->section === 'all'){
            $poscashes = Cash::where('status',1)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();
        }else{
            $users = User::where('section_id',$request->section)->select('id')->get();
            $poscashes = Cash::whereIn('user_id',$users)->where('status',1)->whereBetween('received_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('received_at', 'ASC')->get();
        }



        $poscashinfo = [];
        foreach($poscashes as $cash){
            $poscashinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$cash->received_at)->format('d-m-Y'),'user_id' => $cash->user_id, 'id' => $cash->id, 'amount' => $cash->amount,'discount'=> $cash->discount,'reference' => $cash->reference,'source' =>'inventory'];
        }


        $merge_data =  $poscashinfo;

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'user_id' => $merge['user_id'],'id' => $merge['id'], 'amount' => $merge['amount'],'reference' => $merge['reference'],'source' => $merge['source'],'discount'=> $merge['discount']  ];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));




        $pdf = PDF::loadView('general_report.pdfcashreport',compact('datewise_sorted_data','request','general_opt_value'));
        return $pdf->download('cash report from '.$request->start.' to '. $request->end.'.pdf');
    }


    public function SalesReport(){
        $sections = Section::where('module','inventory')->get();
        return view('pos.report.salesreport',compact('sections'));
    }
    public function SalesReportResult(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'section' => 'required',
        ]);
        $sections = Section::where('module','inventory')->get();
        if($request->section === 'all'){
        $sales = Sale::whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();
        }else{
            $users = User::where('user_type','pos')->where('section_id',$request->section)->select('id')->get();
            $sales = Sale::whereIn('user_id',$users)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();
        }

        $datewise_sorted_data = [];
        foreach($sales as $sale){
            $datewise_sorted_data[] = ['date' => $sale->sales_at->format('d-F-Y'),'customer' => $sale->user->name,'address' =>$sale->user->address,'phone' =>$sale->user->phone ,'id' => $sale->id, 'amount' => $sale->amount];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));

        return view('pos.report.showsalesreport',compact('datewise_sorted_data','request','sections'));
    }

    public function pdfSalesReport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'section' => 'required',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);

        if($request->section === 'all'){
            $sales = Sale::whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();
        }else{
            $users = User::where('section_id',$request->section)->select('id')->get();
            $sales = Sale::whereIn('user_id',$users)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();
        }

        $datewise_sorted_data = [];
        foreach($sales as $sale){
            $datewise_sorted_data[] = ['date' => $sale->sales_at->format('d-m-Y'),'customer' => $sale->user->name,'address' =>$sale->user->address,'phone' =>$sale->user->phone ,'id' => $sale->id, 'amount' => $sale->amount];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));

        $pdf = PDF::loadView('pos.report.pdfsalesreport',compact('datewise_sorted_data','request','general_opt_value'));
        return $pdf->download('invoice.pdf');
    }


    public function supplierdue(){
        $suppliers = Supplier::all();
        return view('general_report.supplierreport',compact('suppliers'));
    }

    public function showsupplierdue(Request $request){
        $this->validate($request,[
            'supplier' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $current_supplier = Supplier::findOrFail($request->supplier);
        $suppliers = Supplier::all();


        $supplierdue = Supplierdue::where('supplier_id',$request->supplier)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('due_at', 'ASC')->get();

        $purchase = Purchase::where('supplier_id',$request->supplier)->whereBetween('purchased_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('purchased_at', 'ASC')->get();


        $payments = Payment::where('supplier_id',$request->supplier)->whereBetween('payments_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('payments_at', 'ASC')->get();






        $supplierdueinfo = [];
        foreach($supplierdue as $sdue){
            $supplierdueinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$sdue->due_at)->format('d-m-Y'), 'id' => $sdue->id, 'particular'=>  'prevdue', 'debit' => $sdue->amount,  'credit' => 0,'reference' => $sdue->reference];
        }


        $purchaseinfo = [];
        foreach($purchase as $pinfo){
            $purchaseinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$pinfo->purchased_at)->format('d-m-Y'), 'id' => $pinfo->id, 'particular'=>  'purchase', 'debit' => $pinfo->amount,  'credit' => 0,'reference' => NULL];
        }

        $paymentinfo = [];
        foreach($payments as $payment){
            $paymentinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$payment->payments_at)->format('d-m-Y'), 'id' => $payment->id, 'particular'=>  'payment', 'debit' => 0,  'credit' => $payment->amount,'reference' => $payment->reference];
        }

        $merge_data =  array_merge($supplierdueinfo,$purchaseinfo, $paymentinfo);

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'id' => $merge['id'],'particular' => $merge['particular'], 'debit' => $merge['debit'], 'credit' => $merge['credit'],'reference' => $merge['reference'] ];
        }

       usort($datewise_sorted_data,  array($this, "date_sort"));

       $prevsupplierdue = Supplierdue::where('supplier_id',$request->supplier)->whereNotBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

       $prevpurchase = Purchase::where('supplier_id',$request->supplier)->whereNotBetween('purchased_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

       $prevpayments = Payment::where('supplier_id',$request->supplier)->whereNotBetween('payments_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

       $balance = ($prevsupplierdue+$prevpurchase) - ($prevpayments);

        return view('general_report.showsuppliereport',compact('datewise_sorted_data','request','suppliers','balance','current_supplier'));


    }

    public function pdfsupplierdue(Request $request){
        $this->validate($request,[
            'supplier' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);

        $current_supplier = Supplier::findOrFail($request->supplier);
        $suppliers = Supplier::all();


        $supplierdue = Supplierdue::where('supplier_id',$request->supplier)->whereBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('due_at', 'ASC')->get();

        $purchase = Purchase::where('supplier_id',$request->supplier)->whereBetween('purchased_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('purchased_at', 'ASC')->get();


        $payments = Payment::where('supplier_id',$request->supplier)->whereBetween('payments_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('payments_at', 'ASC')->get();






        $supplierdueinfo = [];
        foreach($supplierdue as $sdue){
            $supplierdueinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$sdue->due_at)->format('d-m-Y'), 'id' => $sdue->id, 'particular'=>  'prevdue', 'debit' => $sdue->amount,  'credit' => 0,'reference' => $sdue->reference];
        }


        $purchaseinfo = [];
        foreach($purchase as $pinfo){
            $purchaseinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$pinfo->purchased_at)->format('d-m-Y'), 'id' => $pinfo->id, 'particular'=>  'purchase', 'debit' => $pinfo->amount,  'credit' => 0,'reference' => NULL];
        }

        $paymentinfo = [];
        foreach($payments as $payment){
            $paymentinfo[] = ['date' => Carbon::createFromFormat('Y-m-d H:i:s',$payment->payments_at)->format('d-m-Y'), 'id' => $payment->id, 'particular'=>  'payment', 'debit' => 0,  'credit' => $payment->amount,'reference' => $payment->reference];
        }

        $merge_data =  array_merge($supplierdueinfo,$purchaseinfo, $paymentinfo);

        $datewise_sorted_data = [];
        foreach($merge_data as $merge){
            $datewise_sorted_data[] = ['date' => $merge['date'],'id' => $merge['id'],'particular' => $merge['particular'], 'debit' => $merge['debit'], 'credit' => $merge['credit'],'reference' => $merge['reference'] ];
        }

       usort($datewise_sorted_data,  array($this, "date_sort"));

       $prevsupplierdue = Supplierdue::where('supplier_id',$request->supplier)->whereNotBetween('due_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

       $prevpurchase = Purchase::where('supplier_id',$request->supplier)->whereNotBetween('purchased_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

       $prevpayments = Payment::where('supplier_id',$request->supplier)->whereNotBetween('payments_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->sum('amount');

       $balance = ($prevsupplierdue+$prevpurchase) - ($prevpayments);



       $pdf = PDF::loadView('general_report.pdfsupplierreport',compact('datewise_sorted_data','request','suppliers','balance','current_supplier','general_opt_value'));
       return $pdf->download('suppleriduereport.pdf');
    }

    public function MarketingReport(){
        $employees = Employee::get();
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);
        return view('general_report.marketingreport',compact('general_opt_value','employees'));
    }

    public function ShowMarketingReport(Request $request){
        $marketingreport = MarketingReport::where('employee_id',$request->employee)->whereBetween('at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('at','ASC')->get();
        $employee = Employee::findOrFail($request->employee);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);
        $pdf = PDF::loadView('general_report.showmarketingreport',compact('marketingreport','general_opt_value','employee','request'));

        return $pdf->download($employee->name.' Sales Report'.$request->start.'to '.$request->end.'.pdf');
    }



    public function DeliveryReport(){
        return view('pos.report.deliveryreport');
    }
    public function ShowDeliveryReport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'filter' => 'required',
        ]);
        if($request->filter === 'all'){
        $sales = Sale::whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->get();
        }else{
            $sales = Sale::where('delivery_status',$request->filter)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->get();
        }

        $datewise_sorted_data = [];
        foreach($sales as $sale){
            if($sale->deliveryinfo != null){
                $d_info = json_decode($sale->deliveryinfo);
            }else{
                $d_info = $sale->deliveryinfo;
            }
            $datewise_sorted_data[] = ['date' => $sale->sales_at->format('d-m-Y'),'customer' => $sale->user->name,'address' =>$sale->user->address,'phone' =>$sale->user->phone ,'id' => $sale->id, 'status' => $sale->delivery_status,'delivery_info'=> $d_info];
        }
        usort($datewise_sorted_data,  array($this, "date_sort_desc"));
        return view('pos.report.showdeliveryreport',compact('datewise_sorted_data','request'));
    }

    public function pdfDeliveryReport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'filter' => 'required',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);
        if($request->filter === 'all'){
        $sales = Sale::whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->get();
        }else{
            $sales = Sale::where('delivery_status',$request->filter)->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->get();
        }

        $datewise_sorted_data = [];
        foreach($sales as $sale){
            if($sale->deliveryinfo != null){
                $d_info = json_decode($sale->deliveryinfo);
            }else{
                $d_info = $sale->deliveryinfo;
            }
            $datewise_sorted_data[] = ['date' => $sale->sales_at->format('d-m-Y'),'customer' => $sale->user->name,'address' =>$sale->user->address,'phone' =>$sale->user->phone ,'id' => $sale->id, 'status' => $sale->delivery_status,'delivery_info'=> $d_info];
        }
        usort($datewise_sorted_data,  array($this, "date_sort_desc"));

        $pdf = PDF::loadView('pos.report.pdfdeliveryreport',compact('datewise_sorted_data','request','general_opt_value'));
        return $pdf->download('DeliveryReport'.$request->start.'to '.$request->end.'.pdf');
    }


    public function expensereport(){
        $expensetype = Expensecategory::all();
        return view('general_report.expensereport',compact('expensetype'));
    }


    public function pdfexpensereport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
            'filter' => 'required',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);

        if($request->filter === 'all'){
            $expensecollection =   Expense::whereBetween('expense_date', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('expense_date','ASC')->get();
        }else{
            $expensecollection =   Expense::where('expensecategory_id',$request->filter)->whereBetween('expense_date', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('expense_date','ASC')->get();
        }

        $pdf =  PDF::loadView('general_report.pdfexpensereport',compact('general_opt_value','expensecollection','request'));
        return $pdf->download('Expense Report'.$request->start.'to '.$request->end.'.pdf');

    }


    public function SalesDetailsReport(){
        return view('pos.report.sales_details_report');
    }

    public function SalesDetailsReportResult(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
        $sales = Sale::with('product')->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();
        $datewise_sorted_data = [];
        foreach($sales as $sale){
            $datewise_sorted_data[] = ['date' => $sale->sales_at->format('d-F-Y'),'customer' => $sale->user->name,'address' =>$sale->user->address,'phone' =>$sale->user->phone ,'id' => $sale->id, 'amount' => $sale->amount,'discount' => $sale->discount, 'carrying_and_loading' => $sale->carrying_and_loading,'products_info' => $sale->product];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));
        return view('pos.report.show_sales_details_report',compact('datewise_sorted_data','request'));
    }

    public function pdfSalesDetailsReport(Request $request){
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);
        $sales = Sale::with('product')->whereBetween('sales_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->orderBy('sales_at', 'ASC')->get();
        $datewise_sorted_data = [];
        foreach($sales as $sale){
            $datewise_sorted_data[] = ['date' => $sale->sales_at->format('d-F-Y'),'customer' => $sale->user->name,'address' =>$sale->user->address,'phone' =>$sale->user->phone ,'id' => $sale->id, 'amount' => $sale->amount,'discount' => $sale->discount, 'carrying_and_loading' => $sale->carrying_and_loading,'products_info' => $sale->product];
        }
        usort($datewise_sorted_data,  array($this, "date_sort"));
        $pdf = PDF::loadView('pos.report.pdf_sales_details_report',compact('datewise_sorted_data','request','general_opt_value'));
        return $pdf->download('Sales Details Report '.now().'.pdf');
    }


}
