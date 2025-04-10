<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use PDF;
use App\Cash;
use App\Sale;
use App\User;
use App\Employee;
use App\EmployeeType;
use App\GeneralOption;
use App\Returnproduct;
use App\AssignCustomer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\EmployeeCustCollection;


class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:Employee Section');
        $this->middleware('permission:Employee Edit')->only('edit','update');

    }


    public function index()
    {
        $employees = Employee::all();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::where('user_type','pos')->where('section_id',2)->get();
        $emp_types = EmployeeType::all();
        return view('employee.create',compact('emp_types','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:employees',
            'phone' => 'required|unique:employees',
            'address' => 'required',
            'joining_date' => 'required',
            'salary' => 'required|integer',
            'employee_type_id' => 'required|integer',
        ]);


        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->joining_date = $request->joining_date;
        $employee->salary = $request->salary;
        if($request->has('nid')) :
        $employee->nid = $request->nid;
        endif;
        $employee->employee_type_id = $request->employee_type_id;

        if($request->has('assigned_customers')){
            $employee->assigned_customers = json_encode($request->assigned_customers);
        }

        $employee->save();




        Toastr::success('Employee  Created Successfully', 'success');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return  view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $customers = User::where('user_type','pos')->where('section_id',2)->get();
        $emp_types = EmployeeType::all();
        return view('employee.edit',compact('employee','emp_types','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'name' => 'required|unique:employees,name,'.$employee->id,
            'phone' => 'required|unique:employees,phone,'.$employee->id,
            'address' => 'required',
            'joining_date' => 'required',
            'salary' => 'required|integer',
            'employee_type_id' => 'required|integer',
        ]);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->joining_date = $request->joining_date;
        $employee->salary = $request->salary;
        if($request->has('nid')) :
        $employee->nid = $request->nid;
        endif;
        if($request->has('assigned_customers')){
            $employee->assigned_customers = json_encode($request->assigned_customers);
        }else{
            $employee->assigned_customers = NULL;
        }
        $employee->employee_type_id = $request->employee_type_id;
        $employee->save();
        Toastr::success('Employee  Updated Successfully', 'success');
        return redirect()->route('employee.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }




    public function employeewiseperformance(){
        $employees = Employee::all();//where('assigned_customers','!=','NULL')->get();
        return view('general_report.performancereport',compact('employees'));
    }


    public function showemployeewiseperformance(Request $request){
        $this->validate($request,[
            'employee' => 'required',
            'date_range' => 'required',
        ]);

        $employeeinfo = Employee::findOrFail($request->employee);

        $assigned_customer = AssignCustomer::findOrFail($request->date_range);
        $customers_array = unserialize($assigned_customer->customers_array);

        $customer_list = User::whereIn('id',$customers_array)->get();



        $from = $assigned_customer->from;
        $to = $assigned_customer->to;


        $sales = Sale::with('product')->whereIn('user_id',$customers_array)->whereBetween('sales_at', [$from, $to])->orderBy('sales_at', 'DESC')->get();

        $product_returns = Returnproduct::with('product')->whereIn('user_id',$customers_array)->whereBetween('returned_at', [$from, $to])->orderBy('returned_at', 'DESC')->get();

       $cashes = Cash::whereIn('user_id',$customers_array)->whereBetween('received_at', [$from, $to])->orderBy('received_at', 'DESC')->get();

        return view('general_report.showperformancereport',compact('sales','product_returns','cashes','from','to','employeeinfo','customer_list','request'));

    }

    public function pdfemployeewiseperformance(Request $request){
        $this->validate($request,[
            'employee' => 'required',
            'date_range' => 'required',
        ]);


        $general_opt = Cache::get('g_opt') ?? GeneralOption::first();
        $general_opt_value = json_decode($general_opt->options, true);

        $employeeinfo = Employee::findOrFail($request->employee);

        $assigned_customer = AssignCustomer::findOrFail($request->date_range);
        $customers_array = unserialize($assigned_customer->customers_array);

        $customer_list = User::whereIn('id',$customers_array)->get();



        $from = $assigned_customer->from;
        $to = $assigned_customer->to;


        $sales = Sale::with('product')->whereIn('user_id',$customers_array)->whereBetween('sales_at', [$from, $to])->orderBy('sales_at', 'DESC')->get();

        $product_returns = Returnproduct::with('product')->whereIn('user_id',$customers_array)->whereBetween('returned_at', [$from, $to])->orderBy('returned_at', 'DESC')->get();

       $cashes = Cash::whereIn('user_id',$customers_array)->whereBetween('received_at', [$from, $to])->orderBy('received_at', 'DESC')->get();



       $pdf = PDF::loadView('general_report.pdfperformancereport',compact('general_opt_value','sales','product_returns','cashes','from','to','employeeinfo','customer_list','request'));


       //Storage::put('public/performancereport/'.$employeeinfo->name.'-at-'.now()->toDateTimeString().'.pdf', $pdf->output());
       return $pdf->download($employeeinfo->name.'-at-'.now()->toDateTimeString().'.pdf');

       //return [$sales,$product_returns,$cashes];
        //return view('general_report.showperformancereport',compact('sales','product_returns','cashes','from','to','employeeinfo','customer_list'));

    }




    public function getEmployeeCust($id){
        $assigned_customer = AssignCustomer::where('employee_id',$id)->get();
        return  new EmployeeCustCollection($assigned_customer);
    }




}



