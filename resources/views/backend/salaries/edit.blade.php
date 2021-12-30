@extends('backendtemplate')

@section('title', 'Salary')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Employee Salary</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Payroll</li>
                        <li class="breadcrumb-item active">Employee Salary</li>
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
                    <form action="{{route('salaries.update',$salary->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-12 my-4">
                                <h3 class="d-inline">Edit Salary <span class="text-danger"> (Monthly)</span></h3>
                                <span class="float-right"><a href="{{route('salaries.index')}}" class="btn"><i class="icon-arrow-left btn-theme-link"></i></a></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Staff <span class="text-danger">*</span></label>
                                    <select class="select form-control" name="staff">
                                        <option selected="selected">Select Staff...</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}" @if($salary->employee_id == $employee->id)
                                            {{'selected'}} 
                                            @endif>{{$employee->username}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Basic Salary <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="basic_salary" value="{{$salary->basic_salary}}">
                                    <span class="text-danger">{{ $errors->first('basic_salary') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_working_time') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Basic Working Hour (per day) <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="basic_working_time" value="{{$salary->basic_working_time_per_day}}">
                                    <span class="text-danger">{{ $errors->first('basic_working_time') }}</span>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('overtime_rate') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Overtime Rate <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="overtime_rate" value="{{$salary->overtime_rate}}">
                                    <span class="text-danger">{{ $errors->first('overtime_rate') }}</span>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('basic_salary') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Annual Leave Allowance (Days) <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="leave_allowance" value="{{$salary->leave_allowance}}">
                                    <span class="text-danger">{{ $errors->first('leave_allowance') }}</span>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-4">
                                <div class="form-row">
                                    <div class="col mr-2">
                                      <h4 style="color: green">Earnings</h4>
                                  </div>
                                  <div class="col ml-2">
                                      <h4 style="color: red">Deductions</h4>
                                  </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 mb-4 mt-4">
                                <h4 style="color: red">Deductions</h4>
                            </div> -->
                            <div class="col-sm-12">
                                <div class="form-row my-3">
                                    <div class="col mr-2">
                                        <label class="col-form-label">Medical Allowance</label>
                                        <input class="form-control" type="number" name="medical_allowance" min="0" value="{{$salary->medical_allowance}}">
                                    </div>
                                    <div class="col ml-2">
                                        <label class="col-form-label">EPF <span class="text-danger">(%)</span></label>
                                        <input class="form-control" type="number" name="epf" min="0"  step=".01" value="{{$salary->epf}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-row my-3">
                                    <div class="col mr-2">
                                        <label class="col-form-label">Transport Allowance</label>
                                        <input class="form-control" type="number" name="transport_allowance" value="{{$salary->transport_allowance}}">
                                    </div>
                                    <div class="col ml-2">
                                        <label class="col-form-label">ESI <span class="text-danger">(%)</span></label>
                                        <input class="form-control" type="number" name="esi" min="0"  step=".01" value="{{$salary->esi}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-row my-3">
                                    <div class="col mr-2">
                                        <label class="col-form-label">Accomodation Allowance</label>
                                        <input class="form-control" type="number" name="accomodation_allowance" value="{{$salary->accomodation_allowance}}">
                                    </div>
                                    <div class="col ml-2">
                                        <label class="col-form-label">Other Insurance</label>
                                        <input class="form-control" type="number" name="other_insurance" value="{{$salary->other_insurance}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-row my-3">
                                    <div class="col mr-2">
                                        <label class="col-form-label">Other Allowance</label>
                                        <input class="form-control" type="number" name="other_allowance" value="{{$salary->other_allowance}}">
                                    </div>
                                    <div class="col ml-2">
                                        <label class="col-form-label">Other Deduction</label>
                                        <input class="form-control" type="number" name="other_deduction" value="{{$salary->other_deduction}}">
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <input type="submit" class="btn btn-theme" name="btnEditDesig" value="Update">
                        
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