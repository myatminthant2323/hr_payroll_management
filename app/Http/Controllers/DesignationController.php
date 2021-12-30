<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Designation;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();
        return view('backend.designations.index',compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.designations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = array('username' => 'required|email', 'password' => 'required');
        // $validator = Validator::make(Input::all(), $rules);


        // if ($validator->fails())
        // {
        //     return Response::json(array(
        //         'success' => false,
        //         'errors' => $validator->getMessageBag()->toArray()

        //     ), 400); 
        // }
        // return Response::json(array('success' => true), 200);

        
        $request->validate([
            'designation_name' => 'required|unique:designations,designation_name',

        ]);

        // Store Data
        $designation = new Designation;
        $designation->designation_name = $request->designation_name;

        $designation->save();

        $designations = Designation::all();
        return response()->json(array(
            'designations' => $designations,
            'status' => 1,
        ));
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
        $designation = Designation::find($id);
        // dd($item);
        return view('backend.designations.edit',compact('designation'));
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
            'designation_name' => 'required|unique:designations,designation_name',

        ]);
        $designation = Designation::find($id);
        $designation->designation_name = $request->designation_name;

        $designation->save();

        $designations = Designation::all();
        return response()->json(array(
            'designations' => $designations,
            'status' => 1,  
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = Designation::find($id);

        $designation->delete();

        $designations = Designation::all();
        return response()->json(array(
            'designations' => $designations,
            'status' => 1,  
        ));

        // $status = 3;
        // return redirect()->route('designations.index')->with('status',$status);
    }
}
