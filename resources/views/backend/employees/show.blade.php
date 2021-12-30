@extends('backendtemplate')

@section('title', 'Employee')

@section('content')



<div id="main-content" class="profilepage_2 blog-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Employee Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Emloyee Profile</li>
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
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card member-card">
                    <div class="header l-coral">
                        <h4 class="m-t-10 text-light">{{$employee->username}}</h4>
                    </div>
                    <div class="member-img">
                        <img src="{{url($employee->photo)}}" class="rounded-circle" alt="profile-image" height="150">
                    </div>
                    <div class="body">
                        <div class="col-12">
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a title="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>                            
                        </div>
                        <hr>
                        
                        <strong>Email ID</strong>
                        <p>{{$employee->email}}</p>
                        <strong>Employee Role</strong>
                        <p class="mt-1"><span @foreach ($employee->user->roles()->pluck('name') as $role)
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
                        </span>
                        </p>
                        <strong>Department</strong>
                        <p>{{$department->department_name}}</p>
                        <strong>Designation</strong>
                        <p>{{$designation->designation_name}}</p>
                        <hr>
                        <!-- <strong>Address</strong>
                        <address>{{$employee->address}}</address> -->
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="header">
                        <h2>General Report</h2>
                    </div>
                    <div class="body">
                        <ul class="list-unstyled">
                            <li>
                                <div>Blood Pressure</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Heart Beat</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Haemoglobin</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Sugar</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="body">
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <span class="float-right"><a href="{{route('employees.edit',$employee->id)}}" class="btn" id="edit-icon"><i class="icon-pencil btn-theme-link"></i></a></span>
                        @endif
                        <ul class="nav nav-tabs-theme">                                
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#info">Personal</a></li>
                            @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#salary">Salary</a></li>
                            @else
                                @if (Auth::user()->id == $employee->user_id)
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#salary">Salary</a></li>
                                @endif
                            @endif
                        </ul>  
                                             
                        <div class="tab-content mt-3">

                            <div class="tab-pane active" id="info">
                                <div class="table-responsive px-2">
                                    <table class="table table-hover emp_info">
                                        <tbody>
                                            <tr>
                                                <td style="width: 280px;">Employee ID:</td>
                                                <td>HPM-{{sprintf("%03d", $employee->id)}}</td>
                                            </tr>
                                            <tr>
                                                <td>First Name:</td>
                                                <td>{{$employee->fname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Last Name:</td>
                                                <td>{{$employee->lname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth:</td>
                                                <td>{{$employee->date_of_birth}}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td>{{$employee->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>Martial Status:</td>
                                                <td>{{$employee->martial_status}}</td>
                                            </tr>

                                            <tr>
                                                <td>Joined Date:</td>
                                                <td>{{$employee->join_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone 1:</td>
                                                <td>{{$employee->phno1}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone 2:</td>
                                                <td>
                                                    @if($employee->phno2 !== null)
                                                    {{$employee->phno2}}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>{{$employee->address}}</td>
                                            </tr>
                                        </tbody>                                            
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="salary"> 
                            @if ($salary != null)                             
                                <div class="table-responsive px-2">
                                    <table class="table table-hover emp_info">
                                        <tbody>
                                            <tr>
                                                <td style="width: 280px;">Basic Salary:</td>
                                                <td>${{$salary->basic_salary}}</td>
                                            </tr>
                                            <tr>
                                                <td>Basic Working hour (day):</td>
                                                <td>{{$salary->basic_working_time_per_day}} hr</td>
                                            </tr>
                                            <tr>
                                                <td>Annual Leave Allowance:</td>
                                                <td>{{$salary->leave_allowance}} days</td>
                                            </tr>
                                            <tr>
                                                <td>Medical Allowance:</td>
                                                <td>${{$salary->medical_allowance}}</td>
                                            </tr>
                                            <tr>
                                                <td>Transport Allowance:</td>
                                                <td>${{$salary->transport_allowance}}</td>
                                            </tr>
                                            <tr>
                                                <td>Accomodation Allowance:</td>
                                                <td>${{$salary->accomodation_allowance}}</td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Other Allowance:</td>
                                                <td>${{$salary->other_allowance}}</td>
                                            </tr> -->
                                            
                                            <tr>
                                                <td>Employee Provident Fund (E.P.F.)</td>
                                                <td>{{$salary->epf}} %</td>
                                            </tr>
                                            <tr>
                                                <td>Employee State Insurance (E.S.I.):</td>
                                                <td>{{$salary->esi}} %</td>
                                            </tr>
                                        </tbody>                                            
                                    </table>
                                </div>
                                @endif
                            </div>

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
        

    })

</script>

@endsection