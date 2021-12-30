<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Overtime;
use App\User;
use Auth;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles()->pluck('name')[0] !== "staff"){
            $overtimes = Overtime::all()->sortByDesc('overtime_date');
            $employees = Employee::all();
            $admin = User::find(1);
            // dd(today());
            return view('backend.overtimes.index',compact('overtimes','employees','admin'));
        }else{
            $employee = Employee::where('user_id',Auth::user()->id)->firstOrFail();

            $overtimes = Overtime::all()->where('employee_id',$employee->id)->sortByDesc('overtime_date');
            $employees = Employee::all();
            $admin = User::find(1);
            return view('backend.overtimes.index',compact('overtimes','employees','admin'));
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
            'overtime_emp_name' => 'required',
            'overtime_date' => 'required',
            'overtime_hour' => 'required',
            'overtime_rate' => 'required',
            'description' => 'required',
        ]);

        $overtime = new Overtime;
        $overtime->employee_id = $request->overtime_emp_name;
        $overtime->overtime_date = $request->overtime_date;
        $overtime->overtime_hour = $request->overtime_hour;
        $overtime->overtime_rate = $request->overtime_rate;
        $overtime->description = $request->description;

        if((\Carbon\Carbon::parse($request->overtime_date)) >= (\Carbon\Carbon::today())){
            $overtime->status = 1;
        }else{
            $overtime->status = 0;
        }
        
        $overtime->user_id = Auth::user()->id;

        $overtime->save();
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
            'overtime_emp_name' => 'required',
            'overtime_date' => 'required',
            'overtime_hour' => 'required',
            'overtime_rate' => 'required',
            'description' => 'required',
        ]);

        $overtime = Overtime::find($id);
        $overtime->employee_id = $request->overtime_emp_name;
        $overtime->overtime_date = $request->overtime_date;
        $overtime->overtime_hour = $request->overtime_hour;
        $overtime->overtime_rate = $request->overtime_rate;
        $overtime->description = $request->description;
        // dd(\Carbon\Carbon::today());
        if((\Carbon\Carbon::parse($request->overtime_date)) >= (\Carbon\Carbon::today())){
            $overtime->status = 1;
        }else{
            $overtime->status = 0;
        }
        $overtime->user_id = Auth::user()->id;

        $overtime->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $overtime = Overtime::find($id);

        $overtime->delete();
        $status = 3;
        return redirect()->route('overtimes.index')->with('status',$status);
    }
}
