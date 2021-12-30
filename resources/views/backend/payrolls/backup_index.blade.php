@extends('backendtemplate')

@section('title', 'Payment')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee Payment</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Payroll</li>
                        <li class="breadcrumb-item active">Employee Payment</li>
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
                        <h2>Employee Payment</h2>
                        <ul class="header-dropdown">
                            <li><a href="{{route('payrolls.create')}}" class="btn btn-info">Add New</a></li>
                        </ul>
                    </div> 
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Gross Salary</th>
                                        <th>Total deduction</th>
                                        <th>Net Salary</th>
                                        <th>Performance Bonus</th>
                                        <th>Performance Deductions</th>
                                        <th>Payment Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payrolls as $payroll)
                                    <tr>
                                        <td class="width45">
                                            @foreach($employees as $employee)
                                            @if ($payroll->employee_id == $employee->id)
                                            <img src="{{asset($employee->photo)}}" class="rounded-circle width35" alt="" name="photo">
                                            @endif 
                                            @endforeach
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                @foreach($employees as $employee)
                                                @if ($payroll->employee_id == $employee->id)
                                                {{$employee->username}}
                                                @endif 
                                                @endforeach 
                                            </h6>
                                            <span>HPM -{{sprintf("%03d", $payroll->employee_id)}}
                                            </span>
                                            
                                        </td>
                                            <!-- <td>
                                                @foreach($employees as $employee)
                                                @if ($payroll->employee_id == $employee->id)
                                                    @foreach($designations as $designation)
                                                    @if ($employee->designation_id == $designation->id)
                                                    {{$designation->designation_name}}
                                                    @endif 
                                                    @endforeach
                                                @endif 
                                                @endforeach
                                            </td> -->
                                            @foreach($salaries as $salary)
                                            @if ($payroll->employee_id == $salary->employee_id)
                                            <td class="currency_format">{{$salary->gross_salary}}</td>
                                            <td class="currency_format">{{$payroll->total_deduction}}</td>
                                            <td class="currency_format">{{$salary->net_salary}}</td>
                                            <td class="currency_format">{{$payroll->total_bonus}}</td>
                                            <td class="currency_format">{{$payroll->total_deduction}}</td>
                                            <td class="currency_format">{{$payroll->net_pay}}</td>
                                            @endif 
                                            @endforeach
                                            

                                            <td>
                                                <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button> -->
                                                
                                                <a href="{{route('payrolls.edit',$payroll->id)}}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                                                <form method="post" action="{{route('payrolls.destroy',$payroll->id)}}" class="d-inline-block">
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
            $(".currency_format").digits();
        })

        $.fn.digits = function(){ 
            return this.each(function(){ 
                $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
            })
        }
    </script>

    @endsection