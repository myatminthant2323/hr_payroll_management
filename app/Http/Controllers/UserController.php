<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Employee;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::role('hr')->get(); 
        // dd($users);

        $users = User::all();
        $employees = Employee::all();
        // dd(User::find(1)->roles->pluck('name') ->toArray());

        return view('backend.users.index',compact('users','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $assigned_emps = User::select('employee_id')->get();
        // $assigned_emp_id_array = array();
        // foreach ($assigned_emps as $key => $assigned_emp) {
        //     if (!in_array($assigned_emp["employee_id"], $assigned_emp_id_array)) {
        //         array_push($assigned_emp_id_array, $assigned_emp["employee_id"] );
        //     }
        // }

        // // dd($paid_emp_id_array);

        // $employees = Employee::whereNotIn('id',$assigned_emp_id_array)->get();
        // // $employees = Employee::all();
        // return view('backend.users.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // // Store Data
        // $user = new User;
        // $user->employee_id = $request->emp_name;
        // $user->name = $request->username;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();
        // $user->assignRole('hr');
        // return redirect()->route('users.index');
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
        $user = User::find($id);
        return view('backend.users.edit',compact('user'));
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
        $user = User::find($id);
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // $user->assignRole('hr');
        // return redirect()->route('users.index');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        $status = 3;
        return redirect()->route('users.index')->with('status',$status);
    }

    public function getEmployee($id)
    {


        $employee = Employee::find($id);
        return response()->json(array(
            'employee' => $employee,
        ));
        // return view('backend.salaries.edit',compact('salary'));
    }
}
