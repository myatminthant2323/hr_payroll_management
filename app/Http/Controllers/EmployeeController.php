<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 
use App\Department;
use App\Designation;
use App\Employee;
use App\Salary;
use App\User;
use Alert;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = \Spatie\Permission\Models\Role::all();
      $employees = Employee::all();
      $departments = Department::all();
      $designations = Designation::all();
      return view('backend.employees.index',compact('departments','employees','designations','$roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = \Spatie\Permission\Models\Role::all();
      // dd($roles);
      $designations = Designation::all();
      $departments = Department::all();
      return view('backend.employees.create',compact('departments','designations','roles'));
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
        'photo' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'address' => 'required',
        'phone_one' => 'required',
        'dob' => 'required',
        'join_date' => 'required',
        'martialradio' => 'required',
        'gender' => 'required', 
        'role' => 'required',
      ]);
        // dd($request->role);

      $user = User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);



      if(strtolower($request->role) == "admin"){
        $user->assignRole('admin');
      }else if(strtolower($request->role) == "hr"){
        $user->assignRole('hr');
      }else if(strtolower($request->role) == "staff"){
        $user->assignRole('staff');
      }

      $imageName = time().'.'.$request->photo->extension();

      $request->photo->move(public_path('backendtemplate/employeeimg'),$imageName);
      $myfile = 'backendtemplate/employeeimg/'.$imageName;

        // Store Data
      $employee = new Employee;
      $employee->user_id = $user->id;
      $employee->photo = $myfile;
      $employee->fname = $request->first_name;
      $employee->lname = $request->last_name;
      $employee->username = $request->username;
      $employee->email = $request->email;
      $employee->address = $request->address;
      $employee->phno1 = $request->phone_one;
      $employee->phno2 = $request->phone_two;
      $employee->date_of_birth = $request->dob;
      $employee->join_date = $request->join_date;
      $employee->martial_status = $request->martialradio;
      $employee->gender = $request->gender;
      $employee->department_id = $request->department_id;
      $employee->designation_id = $request->designation_id;

      $employee->save();

        // Alert::success('Success!', 'New Item Inserted Successfully.');

      return redirect()->route('employees.index')->with('status',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::find($id);
      $designation = Designation::find($employee->designation_id);
      $department = Department::find($employee->department_id);
      $emp_salary = Salary::where('employee_id', $id)->get();
        // dd(sizeof($emp_salary));
      if(sizeof($emp_salary) != 0){
        $salary = $emp_salary[0];
      }else{
        $salary = "";
      }

        // dd($salary[0]);
      return view('backend.employees.show',compact('department','designation','employee','salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $employee = Employee::find($id);
      $roles = \Spatie\Permission\Models\Role::all();
      $user = User::find($employee->user_id);
      $user_role = $user->roles()->pluck('name')[0];
      $designations = Designation::all();
      $departments = Department::all();



        // if ($role->name !== 'admin'){
        //   if($employee->id == 1){
        //     return redirect()->to('/');
        //   }else{

        //     $designations = Designation::all();
        //     $departments = Department::all();
        //   }
        // }else if($role->name !== 'hr'){

        //   $designations = Designation::all();
        //   $departments = Department::all();

        // }else if($role->name !== 'staff'){

        //   $designations = Designation::all();
        //   $departments = Department::all();
        // }
      

        // dd($item);
      return view('backend.employees.edit',compact('departments','designations','employee','user_role','roles'));
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
        'first_name' => 'required',
        'last_name' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'phone_one' => 'required',
        'dob' => 'required',
        'join_date' => 'required',
        'martialradio' => 'required',
        'gender' => 'required',
      ]);



      if ($request->hasFile('photo')) {

        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backendtemplate/employeeimg'),$imageName);
        $myfile = 'backendtemplate/employeeimg/'.$imageName;
      }

      $employee = Employee::find($id);

      if ($request->hasFile('photo')) {
        File::delete($employee->photo);
        $employee->photo = $myfile;  
      }else{
            // dd("Hi");
        $employee->photo = $employee->photo;
      }

      $employee->fname = $request->first_name;
      $employee->lname = $request->last_name;
      $employee->username = $request->username;
      $employee->email = $request->email;
      $employee->address = $request->address;
      $employee->phno1 = $request->phone_one;
      $employee->phno2 = $request->phone_two;
      $employee->date_of_birth = $request->dob;
      $employee->join_date = $request->join_date;
      $employee->martial_status = $request->martialradio;
      $employee->gender = $request->gender;
      $employee->department_id = $request->department_id;
      $employee->designation_id = $request->designation_id;

      $employee->save();


      $user = User::find($employee->user_id);
      $user->name = $request->username;
      $user->email = $request->email;
      if($request->password !== ""){
        $user->password = Hash::make($request->password);
      }
      $user->save();

      // foreach ($user->roles()->pluck('name') as $role) {
      //   // dd($role);
      //   $user->removeRole($role);
      // }

      if(strtolower($request->role) == "admin"){
        $user->syncRoles('admin');
      }else if(strtolower($request->role) == "hr"){
        $user->syncRoles('hr');
      }else if(strtolower($request->role) == "staff"){
        $user->syncRoles('staff');
      }

      // dd($user->roles()->pluck('name'));

      $status = 2;

        // Redirect
      return redirect()->route('employees.index')->with('status',$status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
      $employee = Employee::find($id);
        // dd($id);
        // dd($employee);
      foreach (Auth::user()->roles()->get() as $role){
        if ($role->name !== 'admin'){
          if($employee->id == 1){
            return redirect()->to('/');
          }else{
            $employee->delete();
          }
        }else{
          $employee->delete();
        }
      }



      $status = 3;
      return redirect()->route('employees.index')->with('status',$status);
    }
  }
