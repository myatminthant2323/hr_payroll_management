<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\Employee;
use App\User;
use Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles()->pluck('name')[0] !== "staff"){
            $leaves = Leave::all()->sortByDesc('leave_date');
            $employees = Employee::all();
            $admin = User::find(1);
            $users = User::all();
            return view('backend.leaves.index',compact('leaves','employees','admin','users'));
        }else{
            $employee = Employee::where('user_id',Auth::user()->id)->firstOrFail();

            $leaves = Leave::all()->where('employee_id',$employee->id)->sortByDesc('leave_date');
            $employees = Employee::all();
            $admin = User::find(1);
            $users = User::all();
            return view('backend.leaves.index',compact('leaves','employees','admin','users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_date' => 'required',
            'leave_day' => 'required',
            'reason' => 'required',
        ]);


        $leave = new Leave;
        if (Auth::user()->roles()->pluck('name')[0] !== "staff"){
            $leave->employee_id = $request->leave_emp_name;
        }else{
            $employee = Employee::where('user_id',Auth::user()->id)->firstOrFail();
            $leave->employee_id = $employee->id;
        }
        
        $leave->leave_date = $request->leave_date;
        $leave->total_leave_day = $request->leave_day;
        $leave->reason = $request->reason;
        if((\Carbon\Carbon::parse($request->leave_date)) <= (\Carbon\Carbon::today())){
            $leave->status = 2;
        }else{
            $leave->status = 0;
        }
        $leave->user_id = null;

        $leave->save();
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
        //
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
        $request->validate([
            'leave_date' => 'required',
            'leave_day' => 'required',
            'reason' => 'required',
        ]);

        $leave = Leave::find($id);
        if (Auth::user()->roles()->pluck('name')[0] !== "staff"){
            $leave->employee_id = $request->leave_emp_name;
        }else{
            $employee = Employee::where('user_id',Auth::user()->id)->firstOrFail();
            $leave->employee_id = $employee->id;
        }
        $leave->leave_date = $request->leave_date;
        $leave->total_leave_day = $request->leave_day;
        $leave->reason = $request->reason;
        if((\Carbon\Carbon::parse($request->leave_date)) <= (\Carbon\Carbon::today())){
            $leave->status = 2;
        }else{
            $leave->status = 0;
        }
        $leave->user_id = null;

        if (Auth::user()->roles()->pluck('name')[0] !== "staff"){
            if($request->status == 0){
                $leave->status = $request->status;
                $leave->user_id = null;
            }else{
                $leave->status = $request->status;
                $leave->user_id = Auth::user()->id;
            }
            
        }

        $leave->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);

        $leave->delete();
        $status = 3;
        return redirect()->route('leaves.index')->with('status',$status);
    }

    public function declineLeave($id)
    {
        $leave = Leave::find($id);

        $leave->status = 2;
        $leave->user_id = Auth::user()->id;

        $leave->save();

        // $status = ;
        // return redirect()->route('payrolls.index')->with('status',$status);
    }

    public function acceptLeave($id)
    {
        $leave = Leave::find($id);

        $leave->status = 1;
        $leave->user_id = Auth::user()->id;

        $leave->save();

        // $status = ;
        // return redirect()->route('payrolls.index')->with('status',$status);
    }
}
