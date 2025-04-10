<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use App\AssignCustomer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Symfony\Component\Console\Input\Input;


class AssignCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assigncustomers = AssignCustomer::with('employee')->get();
        return view('assigncustomer.index',compact('assigncustomers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $customers = User::where('user_type','pos')->where('section_id',2)->get();
        return view('assigncustomer.create',compact('employees','customers'));
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
            'from' => 'required|date',
            'to'   => 'required|date',
            'employee'   => 'required',
            'assigned_customers'   => 'required|array',
        ]);

        $from = AssignCustomer::where('employee_id',$request->employee)->whereBetween('from', [$request->from, $request->to])->get();

        
        $to = AssignCustomer::where('employee_id',$request->employee)->whereBetween('to', [$request->from, $request->to])->get();

        if(count($from) > 0){
            Toastr::error('this date range already exists or overlaps others');
            return redirect()->back();
        }else if(count($to) > 0){
            Toastr::error('this date range already exists or overlaps others');
            return redirect()->back();
        }


        $assigncustomers = new AssignCustomer;
        $assigncustomers->from = $request->from;
        $assigncustomers->to = $request->to;
        $assigncustomers->employee_id = $request->employee;
        $assigncustomers->employee_id = $request->employee;
        if($request->has('assigned_customers')){
            $assigncustomers->customers_arr = serialize($request->assigned_customers);
        }
        $assigncustomers->save();
        Toastr::success('Assigned Successfully');
        return redirect()->route('assigncustomers.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assigncustomer = AssignCustomer::findOrFail($id);
        $employees = Employee::all();
        $customers = User::where('user_type','pos')->where('section_id',2)->get();
        return view('assigncustomer.edit',compact('employees','customers','assigncustomer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'from' => 'required|date',
            'to'   => 'required|date',
            'employee'   => 'required',
        ]);

        $assigncustomers =  AssignCustomer::findOrFail($id);
        $assigncustomers->from = $request->from;
        $assigncustomers->to = $request->to;
        $assigncustomers->employee_id = $request->employee;
        $assigncustomers->employee_id = $request->employee;
        if($request->has('assigned_customers')){
            $assigncustomers->customers_arr = serialize($request->assigned_customers);
        }
        $assigncustomers->save();
        Toastr::success('Updated Successfully');
        return redirect()->route('assigncustomers.index');
    }


    public function destroy($id)
    {
        //
    }
}
