<!doctype html>
<html lang="en">



<head>
    <title>:: Lucid HR :: Payroll Payslip</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- VENDOR CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backendtemplate/main/assets/css/main.css')}}"> -->
    <style type="text/css">
        .img-circle {
            border-radius: 50%;
        }
    </style>

</head>
<body class="theme-orange mx-0">


    <div class="container-fluid mt-4 mx-0">

        <div class="card">                        
            <div class="card-body ">
                <div class="invoice-top clearfix">
                    <div class="logo">
                        <!-- <img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/logo-blak.svg" alt="user" class="img-fluid"> -->
                    </div>
                    <div class="info float-left">
                        <h6>Lucid Infoweb LLC.</h6>
                        <p>8117 Roosevelt St.<br>New Rochelle, NY 10801</p>
                    </div>
                    <div class="title float-right">
                        <h4>Invoice #<span>{{sprintf("%03d", $payroll->id)}}</span></h4>

                        @php
                        $month_and_year = explode("-", $payroll->payment_month);
                        $month = $month_and_year[1];
                        $year = $month_and_year[0];
                        $dateObj   = DateTime::createFromFormat('!m', $month);
                        $monthName = $dateObj->format('F');
                        @endphp

                        <p>Salary Month: {{$monthName}}, {{$year}}</p>
                    </div>
                </div>
                <hr>
                <div class="invoice-mid clearfix ">      
                    <div class="float-left">
                        <div class="clientlogo" style="display: inline">
                            <a href="{{route('employees.show',$salary->employee_id)}}">
                                <img class="rounded-circle img-fluid" src="{{public_path($employee->photo)}}" alt="user" width="70px" height="70px">
                            </a>
                        </div>
                        <div class="info" style="display: inline;">
                            <h6 class="mb-0">
                                <a href="{{route('employees.show',$salary->employee_id)}}" style="text-decoration: none; color: black;">{{$employee->username}}
                                </a>
                            </h6>
                            <p style="font-size: 12px;">{{$designation->designation_name}}<br>Employee ID: HPM-{{sprintf("%03d", $employee->id)}}</p>
                        </div>
                    </div>
                    <div class="float-right" style="font-size: 13px;">
                        <div class="clientlogo">
                         <!--  <p>Payment Made By-</p> -->
                     </div>
                     <span class="info">
                        <p class="mb-1" style="font-size: 16px; font-weight: bold;"><span class="ml-1">Payment made:</span></p>


                        @if ($payroll->user_id == $user->id)
                        <span class="mr-1">
                            <img src="{{public_path('/backendtemplate/employeeimg/avatar6.jpg')}}" alt="user" class="rounded-circle img-fluid" width="40px" height="40px">
                            <span class="ml-2" style="font-weight: bold;">{{$user->name}}</span>
                        </span>
                        <!-- <p class="float-right">{{$user->name}}</p> -->
                    </span>

                    @else

                    @foreach ($employees as $employee)
                    @if($employee->user_id == $payroll->user_id)
                    <span class="mt-1">
                        <a href="{{route('employees.show',$employee->id)}}">
                            <img src="{{public_path($employee->photo)}}" alt="user" class="rounded-circle img-fluid" width="40px" height="40px">
                        </a>
                    </span>
                    <p style="font-size: 12px;">{{$employee->username}}<br> HPM-{{sprintf("%03d", $employee->id)}}</p>
                </span>
                @endif
                @endforeach
                @endif




            </div>
        </div>

        <div class="row clearfix" style="margin-bottom: 120px;">
            <div class="col-lg-12 col-md-12 mt-2">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-success" style="background-color: #22af46; color: white; border-color: #22af46;">
                            <tr>
                                <th>#</th>
                                <th>Earnings</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($total_days_to_pay !== 0)
                            <tr>
                                <td>1</td>
                                <td>Basic Salary</td>
                                <td><span style="text-decoration: line-through;">${{$basic_salary}}</span><span class="text-danger ml-1" style="font-weight: bold;"> (-${{$first_month_deduction}})</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>1st {{$total_days_to_pay}}-Day Salary</td>
                                <td>${{$employee_basic_salary}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Medical Allowance (M.A)</td>
                                <td>${{$salary->medical_allowance}}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Transport Allowance (T.A.)</td>
                                <td>${{$salary->transport_allowance}}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Accomodation Allowance</td>
                                <td>${{$salary->accomodation_allowance}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Other Allowance</td>
                                <td>${{$salary->other_allowance}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Overtime Bonus</td>
                                <td>${{$payroll->overtime_bonus}}</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Attendance Bonus</td>
                                <td>${{$payroll->attendance_bonus}}</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Other Bonus</td>
                                <td>${{$payroll->other_bonus}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><strong>Total Earnings</strong></td>
                                <td><strong>${{$earning}}</strong></td>
                            </tr>
                            @else
                            <tr>
                                <td>1</td>
                                <td>Basic Salary</td>
                                <td>${{$basic_salary}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Medical Allowance (M.A)</td>
                                <td>${{$salary->medical_allowance}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Transport Allowance (T.A.)</td>
                                <td>${{$salary->transport_allowance}}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Accomodation Allowance</td>
                                <td>${{$salary->accomodation_allowance}}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Other Allowance</td>
                                <td>${{$salary->other_allowance}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Overtime Bonus</td>
                                <td>${{$payroll->overtime_bonus}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Attendance Bonus</td>
                                <td>${{$payroll->attendance_bonus}}</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Other Bonus</td>
                                <td>${{$payroll->other_bonus}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><strong>Total Earnings</strong></td>
                                <td><strong>${{$earning}}</strong></td>
                            </tr>
                            @endif
                        </tbody>                                            
                    </table>
                </div>
            </div>
            
        </div>   
        <div class="row clearfix">  
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-danger" style="color: #fff; background-color: #de4848; border-color: #de4848;">
                            <tr>
                                <th>#</th>
                                <th>Deductions</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Employee Provident Fund (E.P.F.)</td>
                                <td>${{$epf}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Employee State Insurance (E.S.I.)</td>
                                <td>${{$esi}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Other Insurances</td>
                                <td>${{$salary->other_insurance}}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Other Deductions</td>
                                <td>${{$salary->other_deduction}}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Leave Deduction</td>
                                <td>${{$payroll->leave_deduction}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Attendance Deduction</td>
                                <td>${{$payroll->attendance_deduction}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Other Performance Deductions</td>
                                <td>${{$payroll->other_deduction}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><strong>Total Deductions</strong></td>
                                <td><strong>${{$deduction}}</strong></td>
                            </tr>
                        </tbody>                                            
                    </table>
                </div>
            </div>
        </div>                       
        <hr>
        <div class="row clearfix" style="margin-bottom: 50px;">

            <div class="col-md-6 text-right">
                <p class="m-b-0"><b>Total Earnings:</b> ${{$earning}}</p>
                <p class="m-b-0"><b>Total Deductions:</b> ${{$deduction}}</p>
                <h5 class="m-b-0 m-t-10">Net Salary ${{$payroll->net_pay}}</h5>
            </div>                                    

        </div>
        <div class="row clearfix">
            <div class="col-md-6">
                <h5>Note</h5>
                <!-- <p>{{$payroll->comment}}</p> -->
                <p>{{$payroll->comment}}</p>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    </body>

    <!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/payroll-payslip.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:41:42 GMT -->
    </html>
