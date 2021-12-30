@extends('backendtemplate')

@section('title', 'Employee')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Employee List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item btn-theme-link"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Employees</li>
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
        <div class="container-fluid shadow-lg">
            <div class="row clearfix">
                <!-- <h3 class="text-center">Add Employees</h3> -->
                <div class="col-sm-10 mx-auto" style="margin-top: 10px; margin-bottom: 50px; ">
                    <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12 my-4">
                                <h3 class="d-inline">Add Employee</h3>
                                <span class="float-right"><a href="{{route('employees.index')}}" class="btn"><i class="icon-arrow-left btn-theme-link"></i></a></span>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Photo <span class="text-danger">*</span></label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="jpg jpeg png" name="photo" id="add_emp_photo">
                                    <span class="text-danger">{{ $errors->first('photo') }}</span>
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
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" checked="checked" value="Male">Male
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" value="Female">Female
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
                                                    <input type="radio" class="form-check-input" name="martialradio" checked="checked" value="Single">Single
                                                </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="martialradio" value="Married">Married
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Role <span class="text-danger">*</span></label>
                                    <select class="form-control" name="role">
                                        <option>Select Role...</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach 
                                    </select>
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                </div>
                            </div>

                            
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="address"></textarea>
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-theme" style="color: white;" name="btnAddDesig" value="Add">
                        
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {

    })
</script>
@endsection