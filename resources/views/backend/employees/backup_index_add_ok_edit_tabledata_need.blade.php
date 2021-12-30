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
                                    <div class="input-group date" data-date-autoclose="true" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control" name="join_date">
                                        <div class="input-group-append">                                            
                                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div>
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
                                    <div class="input-group date" data-date-autoclose="true" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control" name="dob">
                                        <div class="input-group-append">                                            
                                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                        </div>
                                    </div>
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
                            <div class="col-sm-6">
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
                            </div>
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

<div class="modal animated fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editEmp" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
</div>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Employee List</li>
                    </ul>
                </div>            
                <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                    <div class="bh_chart hidden-xs">
                        <div class="float-left m-r-15">
                            <small>Visitors</small>
                            <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                        </div>
                        <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Visits</small>
                            <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                        </div>
                        <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                    </div>
                    <div class="bh_chart hidden-sm">
                        <div class="float-left m-r-15">
                            <small>Chats</small>
                            <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                        </div>
                        <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Employee List</h2>
                        <ul class="header-dropdown">
                            <!-- <li><a href="{{route('employees.create')}}" class="btn btn-info">Add New</a></li> -->
                            <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addEmpModal">Add New</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list" id="emp_table">
                                <thead class="thead-dark">
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
                                        <th>Action</th>
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
                                            <img src="{{ asset('backendtemplate/assets/images/xs/avatar1.jpg')}}" class="rounded-circle avatar" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{$employee->username}}</h6>
                                            <span>{{$employee->email}}</span>
                                        </td>
                                        <td><span>{{$employee->emp_id}}</span></td>
                                        <td><span>{{$employee->phno1}}</span></td>
                                        <td><span>
                                            {{$employee->join_date}}
                                        </span></td>
                                        <td>
                                            <span>
                                                @foreach($departments as $department)
                                                @if ($employee->department_id == $department->id)
                                                {{$department->department_name}}
                                                @endif 
                                                @endforeach
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary editEmpBtn" title="Edit" data-id="$employee->id"><i class="fa fa-edit"></i></button>
                                            <form method="post" action="{{route('employees.destroy',$employee->id)}}" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
            $('#addEmpForm').on('submit',function(e){
                e.preventDefault();

                $.ajax({
                    type:"POST",
                    url:"{{route('employees.store')}}",
                    data: $('#addEmpForm').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#addDesigModal').modal('hide')
                        location.reload();
                        // $('#choose_desig_dept_name').val("");
                    },
                    error: function(error){
                        console.log(error)
                        alert("Data did not saved");
                    }
                })
            })
        })


    $(document).ready(function () {

          $('#emp_table').on('click','.editEmpBtn',function () {
            $('#editEmpModal').modal('show')

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            var emp_edit_id = $(this).attr('data-id');
                // alert(deisg_edit_id)
                
                $('#edit_emp_name').val($.trim(data[1]));
                $('#edit_emp_fname').val($.trim(data[2]));
                $('#edit_emp_lname').val($.trim(data[3]));
                $('#edit_emp_username').val($.trim(data[4]));
                $('#edit_emp_id').val($.trim(data[7]));
                $('#edit_emp_join_date').val($.trim(data[8]));
                $('#edit_emp_phno1').val($.trim(data[9]));
                $('#edit_emp_phno2').val($.trim(data[10]));
                // $('#edit_emp_name').val(data[11]);
                // $('#edit_emp_name').val(data[12]);
                $('#edit_emp_dob').val($.trim(data[13]));
                $('#edit_emp_address').val($.trim(data[14]));
                $('#edit_emp_dept').val($.trim(data[15]));
                $('#edit_emp_design').val($.trim(data[16]));
                $('#edit_emp_bsalary').val($.trim(data[17]));
                $('#edit_emp_bhour').val($.trim(data[18]));                

                $('select#edit_emp_dept option').each(function(){
                    if($.trim(data[15]) == $(this).text()){
                        // alert($(this).text())
                        $(this).attr("selected","selected");
                    }
                    
                });

                $('select#edit_emp_design option').each(function(){
                    if($.trim(data[16]) == $(this).text()){
                        // alert($(this).text())
                        $(this).attr("selected","selected");
                    }
                    
                });

                $('#editEmpForm').on('submit',function(e){
                    e.preventDefault();
                // alert(id);

                if(emp_edit_id !== ""){
                    var url = "{{route('employees.store')}}"+ '/' + emp_edit_id;
                    alert(url)
                    $.ajax({
                        type:"POST",
                        url: url,
                        data: $('#editEmpForm').serialize(),
                        success: function (response) {
                            console.log(response)
                            $('#editEmpModal').modal('hide')
                            location.reload();


                        },
                        error: function(error){
                            console.log(error)
                            alert("Data did not Updated");
                        }
                    })
                }
                
                
                emp_edit_id = "";
            })
            })
      })
  </script>

  @endsection