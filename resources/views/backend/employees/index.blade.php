@extends('backendtemplate')

@section('title', 'Employee')

@section('content')

<div class="modal animated fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="addEmp" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="addEmpForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Employee</h6>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card  {{ $errors->has('photo') ? 'has-error' : '' }}">
                                <div class="header px-0">
                                    <h2>Photo <span class="text-danger">*</span></h2>
                                </div>
                                <div class="body">
                                    <input type="file" class="dropify" data-allowed-file-extensions="jpg jpeg png" name="photo" id="add_emp_photo">
                                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="first_name">
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <label class="col-form-label">Last Name</label>
                                <input class="form-control" type="text" name="last_name">
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username">
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" name="password">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_id">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Joining Date" data-date-format="yyyy-mm-dd" name="join_date">
                                </div>

                                    <!-- <div class="input-group date" data-date-autoclose="true" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control" name="join_date">
                                        <div class="input-group-append">                                            
                                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('phone_one') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Phone One <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone_one">
                                    <span class="text-danger">{{ $errors->first('phone_one') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone Two (Optional)</label>
                                    <input class="form-control" type="text" name="phone_two">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" checked="checked" value="male">Male
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" value="female">Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Martial Status <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="martialradio" checked="checked" value="single">Single
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="martialradio" value="married">Married
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Birthdate" data-date-format="yyyy-mm-dd" name="dob">
                                    </div>
                                    <!-- <div class="input-group date" data-date-autoclose="true" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control" name="dob">
                                        <div class="input-group-append">                                            
                                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="address"></textarea>
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="select form-control" name="department_id">
                                        @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation <span class="text-danger">*</span></label>
                                    <select class="select form-control" name="designation_id">
                                        @foreach($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Baic Salary <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="basic_salary">
                                    <span class="text-danger">{{ $errors->first('basic_salary') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('working_hr') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Basic Working Hour/Day  <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="working_hr">
                                    <span class="text-danger">{{ $errors->first('working_hr') }}</span>
                                </div>
                            </div> -->
                        </div>
                    <!-- <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation Name</label>
                                <div class="form-group {{ $errors->has('designation_name') ? 'has-error' : '' }}">                      
                                    <input type="text" class="form-control" name="designation_name" id="add_desig_name">
                                    <span class="text-danger">{{ $errors->first('designation_name') }}</span>
                                </div>
                                <label for="exampleInputEmail1">Department Name</label>
                                <div class="form-group">                      
                                    <select class="form-control form-control-md" id="choose_desig_dept_name" name="department_name">
                                        <optgroup label="Choose Category">
                                            @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                            @endforeach 
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="btnAddDesig" value="Add">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>/
    </div>
</div>

<!-- Edit -->

<!-- <div class="modal animated fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editEmp" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editEmpForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Edit Employee</h6>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="first_name" id="edit_emp_fname">
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <label class="col-form-label">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="edit_emp_lname">
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username" id="edit_emp_username">
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" id="edit_emp_email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="edit_emp_password">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control" type="password" id="edit_emp_cpassword">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_id" id="edit_emp_id">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <div class="input-group date" data-date-autoclose="true" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" name="join_date" id="edit_emp_join_date">
                                    <div class="input-group-append">                                            
                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('phone_one') ? 'has-error' : '' }}">
                                <label class="col-form-label">Phone One <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="phone_one" id="edit_emp_phno1">
                                <span class="text-danger">{{ $errors->first('phone_one') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone Two (Optional)</label>
                                <input class="form-control" type="text" name="phone_two" id="edit_emp_phno2">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" checked="checked" value="male">Male
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" value="female">Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">Martial Status <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="martialradio" checked="checked" value="single">Single
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="martialradio" value="married">Married
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
                                <div class="input-group date" data-date-autoclose="true" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" name="dob" id="edit_emp_dob">
                                    <div class="input-group-append">                                            
                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="edit_emp_address" rows="2" name="address"></textarea>
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <select class="select form-control" name="department_id" id="edit_emp_dept">
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <select class="select form-control" name="designation_id" id="edit_emp_desig">
                                    @foreach($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                <label class="col-form-label">Baic Salary <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="basic_salary" id="edit_emp_bsalary">
                                <span class="text-danger">{{ $errors->first('basic_salary') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('working_hr') ? 'has-error' : '' }}">
                                <label class="col-form-label">Basic Working Hour/Day  <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="working_hr" id="edit_emp_bhour">
                                <span class="text-danger">{{ $errors->first('working_hr') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="btnAddDesig" value="Add">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>/
    </div>
</div> -->

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Employee List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Employee List</li>
                    </ul>
                </div>            
                <!-- <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                    <div class="bh_chart hidden-xs">
                        <div class="float-left m-r-15">
                            <small>Visitors</small>
                            <h6 class="mb-0 mt-1"><i class="icon-user btn-theme-link"></i> 1,784</h6>
                        </div>
                        <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Visits</small>
                            <h6 class="mb-0 mt-1"><i class="icon-globe btn-theme-link"></i> 325</h6>
                        </div>
                        <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Chats</small>
                            <h6 class="mb-0 mt-1"><i class="icon-bubbles btn-theme-link"></i> 13</h6>
                        </div>
                        <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="row clearfix list" style="display: none">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Employee List</h2>
                        <ul class="header-dropdown">
                            <li><a class="toggle-tile"><i class="fa fa-th text-dark"></i></a></li>
                            @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                            <li><a a href="{{route('employees.create')}}" class="btn btn-theme" style="color: white;" >Add New</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list" id="emp_table">
                                <thead class="">
                                    <tr>
                                        <th>
                                            <label class="fancy-checkbox">
                                                <input class="select-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Phone</th>
                                        <th>Joined Date</th>
                                        <th>Designation</th>
                                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td class="width45">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <a href="{{route('employees.show',$employee->id)}}">
                                                <img src="{{$employee->photo}}" class="rounded-circle avatar" alt="">
                                            </a>
                                            <!-- <img src="{{ asset('backendtemplate/assets/images/xs/avatar1.jpg')}}" class="rounded-circle avatar" alt=""> -->
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="{{route('employees.show',$employee->id)}}" style="text-decoration: none; color: black;">{{$employee->username}}
                                                </a>
                                            </h6>
                                            <span>{{$employee->email}}</span>
                                        </td>
                                        <td><span>HPM -{{sprintf("%03d", $employee->id)}}</span></td>
                                        <td><span>{{$employee->phno1}}</span></td>
                                        <td><span>
                                            {{$employee->join_date}}
                                        </span></td>
                                        <td>
                                            <span>
                                                @foreach($designations as $designation)
                                                @if ($employee->designation_id == $designation->id)
                                                {{$designation->designation_name}}
                                                @endif 
                                                @endforeach
                                            </span>
                                        </td>
                                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                        <td>
                                            <a href="{{route('employees.edit',$employee->id)}}" type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form method="post" action="{{route('employees.destroy',$employee->id)}}" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="row" id="list_tile">
            <div class="col-lg-12 pt-1" style="padding-left: 30px; padding-right: 30px; margin-top: 10px;">
                <h2 style="font-size: 17px;" class="d-inline">Employee List</h2>
                <div class="float-right">
                    <span><a class="toggle-list mr-2" style="font-size: 20px;"><i class="fa fa-th text-dark"></i></a></span>
                    @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                    <span><a a href="{{route('employees.create')}}" class="btn btn-theme" style="font-size: 14px; color: white;">Add New</a></span>
                    @endif
                </div>
            </div>
            @foreach($employees as $employee)
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                <div class="card shadow" id="emp">

                    <div class="body text-center">
                        <div>
                            @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                            <span>
                                <div class="dropdown dropdown-action float-right">
                                    <a aria-expanded="false" data-toggle="dropdown" class="" href="#" style="text-decoration: none; color:#000; font-size: 16px;">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- <a href="#" class="dropdown-item"><i class="fa fa-envelope-o"></i><span style="margin-left: 5px;">Slip</span></a> -->
                                        <a href="{{route('employees.edit',$employee->id)}}" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <form method="post" action="{{route('employees.destroy',$employee->id)}}" class="d-inline-block" id="deleteeForm">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0);" class="dropdown-item" id="delete-btn" onClick="showDiv();"><i class="fa fa-trash-o m-r-5" ></i> Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </span>
                            @endif
                            <span><a href="{{route('employees.show',$employee->id)}}"> <img src="{{$employee->photo}}" data-toggle="tooltip" data-placement="top" title="{{$employee->username}}" alt="user" class="rounded-circle" width="101px" height="100px" /></a></span>
                        </div>


                        <h6 class="mt-2 mb-0"><a href="{{route('employees.show',$employee->id)}}" style="text-decoration: none; color: black;">{{$employee->username}}</a> </h6>
                        <small class="d-block">{{$employee->email}}</small>
                        <small class="d-block mb-1">
                            @foreach($designations as $designation)
                            @if ($employee->designation_id == $designation->id)
                            {{$designation->designation_name}}
                            @endif 
                            @endforeach
                        </small>
                        <small @foreach ($employee->user->roles()->pluck('name') as $role)
                                            @if ($role == 'admin')
                                            class="badge badge-danger"
                                            @elseif ($role == 'hr') class="badge badge-success"
                                            @else class="badge badge-warning"
                                            @endif
                                            @endforeach>

                            @if ($employee->user->roles()->pluck('name')[0] == "admin")
                                Admin
                            @elseif ($employee->user->roles()->pluck('name')[0] == "hr")
                                HR
                            @elseif ($employee->user->roles()->pluck('name')[0] == "staff")
                                Staff
                            @endif
                        </small>
                        <ul class="social-links list-unstyled">
                            <li><a title="facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li><a title="twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li><a title="instagram" href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <div>
                            <span>{{$employee->phno1}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- <div class="card"> -->
                    <div class="body text-center">
                        <div class="p-t-70 p-b-70">
                            <h6>Add New <br> Employee</h6>                                
                            <a href="{{route('employees.create')}}" class="btn btn-theme m-t-10"><i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            @endif
            @if (session('status'))
            <input type="hidden" name="status" class="status" value="{{session('status')}}">
            @endif
        </div>
    </div>

    @endsection

    @section('script')
    <script type="text/javascript">
        $(document).ready(function () {


            $("#deleteeForm").unbind('submit');
            $("#delete-btn").unbind('click');
            // $('#emp').find('#delete-button').trigger('click',function(){
                $(document).on('click','#delete-btn',function () {
                    swal({
                      title: "Are you sure to delete?",
                      text: "Once deleted, you will not be able to recover this file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                    .then((willDelete) => {
                      if (willDelete) {
                        $("#deleteeForm").unbind('submit');
                        $(this).closest("#deleteeForm").unbind('submit').submit();
                    // $( "#deleteform" ).unbind('submit').submit();
                } else {

                }
            });

                }); 

                $("#deleteeForm").unbind('submit');
                $("#delete-button").unbind('click');
                $('#emp_table').on('click','#delete-button',function () {
                    swal({
                      title: "Are you sure to delete?",
                      text: "Once deleted, you will not be able to recover this file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                    .then((willDelete) => {
                      if (willDelete) {
                        $("#deleteeForm").unbind('submit');
                        $(this).closest("#deleteeForm").unbind('submit').submit();
                    // $( "#deleteform" ).unbind('submit').submit();
                } else {

                }
            });

                }); 


                if($( ".status" ).val() == 1){
                  toastr.options.closeButton = true;
                  toastr.options.positionClass = 'toast-bottom-right';
                  toastr['success']('Created successfully! ');
              }else if($( ".status" ).val() == 2){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-bottom-right';
                toastr['success']('Updated successfully! ');
            }else if($( ".status" ).val() == 3){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-bottom-right';
                toastr['success']('Deleted successfully! ');
            }


            $(document).on("click", ".toggle-list", function(){
                $('.list').show();
                $('#list_tile').hide();
            // $(this).removeClass("toggle-list");
            // $(this).addClass("toggle-tile");
            $(this).html("<i class='fa fa-th-list text-dark'></i>");
        });

            $(document).on("click", ".toggle-tile", function(){
                $('.list').hide();
                $('#list_tile').show();
            // $(this).removeClass("toggle-tile");
            // $(this).addClass("toggle-list");
            $(this).html("<i class='fa fa-th text-dark'></i>");
        });

        })

        // function showDiv()
        //     {
        //        swal({
        //           title: "Are you sure to delete?",
        //           text: "Once deleted, you will not be able to recover this file!",
        //           icon: "warning",
        //           buttons: true,
        //           dangerMode: true,
        //       })
        //         .then((willDelete) => {
        //           if (willDelete) {
        //             $("#deleteeForm").unbind('submit');
        //             $('#delete-btn').closest("#deleteeForm").unbind('submit').submit();
        //             // $( "#deleteform" ).unbind('submit').submit();
        //         } else {

        //         }
        //     });
        //    }

    </script>

    @endsection