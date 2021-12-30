@extends('backendtemplate')

@section('title', 'Payment')

@section('link')

@endsection

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Payslip</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Payroll</li>
                        <li class="breadcrumb-item active">Payslip</li>
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

        <div class="row clearfix to_print">
            <div class="col-lg-12 col-md-12">
                <div class="card invoice1">                        
                    <div class="body ">
                        <div class="invoice-top clearfix">
                            <div class="logo">
                                <img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/logo-blak.svg" alt="user" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Lucid Infoweb LLC.</h6>
                                <p>8117 Roosevelt St.<br>New Rochelle, NY 10801</p>
                            </div>
                            <div class="title">
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
                        <div class="invoice-mid clearfix">      
                            <div class="float-left">
                                <div class="clientlogo">
                                    <a href="{{route('employees.show',$salary->employee_id)}}">
                                        <img src="{{url($employee->photo)}}" alt="user" class="rounded-circle img-fluid">
                                    </a>
                                </div>
                                <div class="info">
                                    <h6>
                                        <a href="{{route('employees.show',$salary->employee_id)}}" style="text-decoration: none; color: black;">{{$employee->username}}
                                        </a>
                                    </h6>
                                    <p>{{$designation->designation_name}}<br>Employee ID: HPM-{{sprintf("%03d", $employee->id)}}</p>
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
                                    <img src="{{url('/backendtemplate/employeeimg/avatar6.jpg')}}" alt="user" class="rounded-circle img-fluid" width="40px" height="40px">
                                    <span class="ml-2" style="font-weight: bold;">{{$user->name}}</span>
                                </span>
                                <!-- <p class="float-right">{{$user->name}}</p> -->
                            </span>

                            @else

                            @foreach ($employees as $employee)
                            @if($employee->user_id == $payroll->user_id)
                            <span class="mr-1">
                                <a href="{{route('employees.show',$employee->id)}}">
                                    <img src="{{url($employee->photo)}}" alt="user" class="rounded-circle img-fluid" width="40px" height="40px">
                                </a>
                            </span>
                            <p class="float-right" style="font-weight: 500;">{{$employee->username}}<br> HPM-{{sprintf("%03d", $employee->id)}}</p>
                        </span>
                        @endif
                        @endforeach
                        @endif




                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-success">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-danger">
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
                <div class="row clearfix">
                    <div class="col-md-6">
                        <h5>Note</h5>
                        <!-- <p>{{$payroll->comment}}</p> -->
                        <p>{{$payroll->comment}}</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="m-b-0"><b>Total Earnings:</b> ${{$earning}}</p>
                        <p class="m-b-0"><b>Total Deductions:</b> ${{$deduction}}</p>
                        <h5 class="m-b-0 m-t-10">Net Salary ${{$payroll->net_pay}}</h5>
                    </div>                                    

                </div>
                <div class="row clearfix">
                    <div class="hidden-print col-md-12 text-right">
                        <hr>
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <button class="btn btn-outline-secondary print" data-id="{{$payroll->id}}"><i class="icon-printer"></i></button>
                        <a class="btn btn-theme send-pdf" href="{{route('sendmail',$payroll->id)}} data-id="{{$payroll->id}}">Send</a>
                        <!-- @if ($payroll->status == 0)

                        @else

                        @endif -->
                        @else
                        <!-- <button class="btn btn-outline-secondary print" data-id="{{$payroll->id}}"><i class="icon-printer"></i></button> -->
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


        // let doc = new jsPDF('p','pt','a4');
        // doc.addHTML(document.body,function() {
        //     doc.save('html.pdf');
        // });

        
        $(".currency_format").digits();
                // console.log(trim($("td").text()));
                // if($("td").text("")){
                //     $("td").text("0");
                // }
            });

    



    $.fn.digits = function(){ 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        })
    }

    function paid(id) {
        if(id !== ""){
            $.ajax({
               type:'POST',
               url:'/changepaid' + '/' + id,
               data:{
                "_token": "{{ csrf_token() }}",
                "id" : id,
            },
            success:function(response) {
                console.log(response);
                // if((response != null) && (response["overtime"][0] != null)){
                //     var total_overtime_hour = 0;
                //     var basic_salary = response["basic_salary"][0].basic_salary;
                //     var overtime_rate = response["overtime"][0].overtime_rate;
                //     $.each( response["overtime"], function( key, value ) {
                //         total_overtime_hour = total_overtime_hour + response["overtime"][key].overtime_hour;
                //     })
                //     var hourly_basic_pay_rate = (12 * basic_salary) / (52 * 44);
                //     var overtime_pay = hourly_basic_pay_rate * overtime_rate * total_overtime_hour;
                //     console.log(Math.ceil(overtime_pay));
                //     $(".total_overtime_amount").val(Math.ceil(overtime_pay));
                // }else{
                //     $(".total_overtime_amount").val(0);
                // }

            }
        });
        }
    }


    function send(id) {
        if(id !== ""){
            $.ajax({
               type:'POST',
               url:'/sendmail' + '/' + id,
               data:{
                "_token": "{{ csrf_token() }}",
            },
            success:function(response) {
                console.log(response);

            }
        });
        }
    }
</script>

@endsection