<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
   
        return view('backend.departments.index',compact('departments'));
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
        // $rules = array('dept_name' => 'required|unique:departments,department_name');
        // $validator = validate($request, $rules);

        // dd($validator);
        // if ($validator->fails())
        // {
        //     return Response::json(array(
        //         'success' => false,
        //         'errors' => $validator->getMessageBag()->toArray()

        //     ), 422);
        // }
        // return Response::json(array('success' => true), 200);


        $request->validate([
            'dept_name' => 'required|unique:departments,department_name',
        ]);

        

        // Store Data
        $department = new Department;
        $department->department_name = $request->dept_name;
        $department->save();
        $departments = Department::all();
        // return response()->json($departments);

        return response()->json(array(
            'departments' => $departments,
            'status' => 1,
        ));


        // $status = 1;
        // // Redirect
        // return redirect()->route('departments.index')->with('status',$status);
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
        // $department = Department::find($id);
        // // dd($item);
        // return view('backend.departments.edit',compact('department'));
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
            'dept_name' => 'required|unique:departments,department_name',
        ]);

        $department = Department::find($id);
        // dd($category);
        $department->department_name = $request->input('dept_name');
        // dd($request->dept_name);
        $department->save();
        $status = 2;
        $departments = Department::all();
        return response()->json(array(
            'departments' => $departments,
            'status' => 1,
        ));
        // Redirect
        // return redirect()->route('departments.index')->with('status',$status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        $department->delete();

        $status = 3;
        $departments = Department::all();
        return response()->json(array(
            'departments' => $departments,
            'status' => 1,
        ));
    }
}
