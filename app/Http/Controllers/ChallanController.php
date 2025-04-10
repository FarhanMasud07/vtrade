<?php

namespace App\Http\Controllers;

use App\Challan;
use App\User;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class ChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:challan.index')->only('index');
        $this->middleware('permission:challan.create')->only('create');
        $this->middleware('permission:challan.edit')->only('edit','update');
        $this->middleware('permission:challan.show')->only('show');
        $this->middleware('permission:challan.delete')->only('destroy');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $challanInitialQuery = Challan::query();
            $challan_logs = Datatables::of($challanInitialQuery)
                ->addIndexColumn()
                ->editColumn('created_at',function($row){
                    return $row->created_at->diffForHumans();
                })
                ->editColumn('id',function($row){
                    return  "#".$row->id;
                })
                ->editColumn('challan_date',function($row){
                    return  date('d-M-Y', strtotime($row->challan_date));
                })
                ->editColumn('delivery_date',function($row){
                    return  date('d-M-Y', strtotime($row->delivery_date));
                })
                ->addColumn('action', function($row){
                    $actionbtn='<a href="'.route('challan.show',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
| <a href="'.route('challan.edit',[$row->id]).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>';
                    return $actionbtn;
                })
                ->rawColumns(['action','challan_date','delivery_date'])
                ->make(true);
            return  $challan_logs;

        }
        return view('challan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = "post";
        $id = '';
        return view('challan.form', compact('method','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'challan_date' => 'required',
           'delivery_date' => 'required',
           'customer' => 'required',
           'phone' => 'required',
           'address' => 'required',
           'items' => 'required',
        ]);
        $request->merge(['created_by' => Auth::user()->name]);
        $challan = Challan::create($request->all());
        $pivotData = [];
        if($request->has('items')){
            foreach ($request->items as $item){
                $pivotData[] = [
                    'challan_id' => $challan->id,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'unit' => $item['unit'],
                ];
            }
        };

        $challan->products()->attach($pivotData);
        return $challan;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Challan $challan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request()->ajax()) {
            return Challan::with('products.size')->find($id);
        }
        $challanInfo =  Challan::with('products.size')->find($id);
        return view('challan.show',compact('challanInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Challan $challan
     * @return \Illuminate\Http\Response
     */
    public function edit(Challan $challan)
    {
        $method = "put";
        $id = $challan->id;
        return view('challan.form', compact('method','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Challan $challan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challan $challan)
    {
        $this->validate($request,[
            'challan_date' => 'required',
            'delivery_date' => 'required',
            'customer' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'items' => 'required',
        ]);
        $challan->fill($request->all());
        $challan->save();
        $pivotData = [];
        if($request->has('items')){
            foreach ($request->items as $item){
                $pivotData[] = [
                    'challan_id' => $challan->id,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'unit' => $item['unit'],
                ];
            }
        };

        $challan->products()->detach();
        $challan->products()->attach($pivotData);
        return $challan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Challan $challan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challan $challan)
    {
        //
    }

    public function getCustomersAndProducts()
    {
        return [
            'customers' => User::where('user_type', 'pos')
                ->select('id','name','phone','address')
                ->get(),
            'products'  => Product::with('size')
                ->where('discontinued', false)
                ->select('id','product_name','size_id')
                ->get()
        ];
    }

    public function generatePDF($id){
        $challanInfo =  Challan::with('products.size')->find($id);
        $pdf = PDF::loadView('challan.pdf', compact('challanInfo'));
        return $pdf->download(' challan-' . $challanInfo->challan_date . '.pdf');
    }
}
