@extends('backendtemplate')

@section('title', 'Payment')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Employee Payment</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Payroll</li>
                        <li class="breadcrumb-item active">Employee Payment</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Employee Payment</h2>
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <ul class="header-dropdown">
                            <li><a href="{{route('payrolls.create')}}" class="btn btn-theme" style="color: white;">Add New</a></li>
                        </ul>
                        @endif
                    </div> 
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0" id="payroll_table">
                                <thead class="">
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <!-- <th>Designation</th> -->
                                        <th>Payment Month</th>
                                        <th>Payment Date</th>
                                        <!-- <th>Gross Salary</th>
                                        <th>Total deduction</th>
                                        <th>Net Salary</th>
                                        <th>Total Bonus</th>
                                        <th>Performance Deduction</th> -->
                                        <th>Net Pay</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="payment_tbody">
                                    @foreach($payrolls as $payroll)
                                    <tr>
                                        <td class="width45">
                                            <a href="{{route('employees.show',$payroll->employee_id)}}" style="text-decoration: none; color: black;">
                                                @foreach($employees as $employee)
                                                @if ($payroll->employee_id == $employee->id)
                                                <img src="{{asset($employee->photo)}}" class="rounded-circle width35" alt="" name="photo">
                                                @endif 
                                                @endforeach
                                            </a>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a href="{{route('employees.show',$payroll->employee_id)}}" style="text-decoration: none; color: black;">
                                                    @foreach($employees as $employee)
                                                    @if ($payroll->employee_id == $employee->id)
                                                    {{$employee->username}}
                                                    @endif 
                                                    @endforeach 
                                                </a>
                                            </h6>
                                            <span>HPM -{{sprintf("%03d", $payroll->employee_id)}}
                                            </span>

                                        </td>
                                        <!-- <td>
                                            <h6 class="mb-0">
                                                @foreach($employees as $employee)
                                                @if ($payroll->employee_id == $employee->id)
                                                @foreach($designations as $designation)
                                                @if ($employee->designation_id == $designation->id)
                                                {{$designation->designation_name}}
                                                @endif 
                                                @endforeach
                                                @endif 
                                                @endforeach 
                                            </h6>

                                        </td> -->
                                        <td>
                                            @foreach($employees as $employee)
                                            @if ($payroll->employee_id == $employee->id)
                                            {{$payroll->payment_month}}
                                            @endif 
                                            @endforeach 
                                        </td>
                                        <td>
                                            @foreach($employees as $employee)
                                            @if ($payroll->employee_id == $employee->id)
                                            {{$payroll->payment_date}}
                                            @endif 
                                            @endforeach 
                                        </td>
                                        
                                        <td class="currency_format">${{$payroll->net_pay}}</td>
                                        <td>
                                            @if ($payroll->user_id == $admin->id)
                                                <img src="{{url('/backendtemplate/employeeimg/avatar6.jpg')}}" class="rounded-circle avatar width35 mr-1">
                                                {{$admin->name}}
                                            @else
                                                @foreach($employees as $employee)
                                                @if ($payroll->user_id == $employee->user_id)
                                                <a href="{{route('employees.show',$employee->id)}}" style="text-decoration: none; color: black;">
                                                    <img src="{{asset($employee->photo)}}" class="rounded-circle avatar width35 mr-1" alt="">
                                                    {{$employee->username}}
                                                </a>
                                                @endif 
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                           @if ($payroll->status == 0)
                                           <span class="badge badge-warning">Pending</span>
                                           @elseif ($payroll->status == 1)
                                           <span class="badge badge-success">Paid</span>
                                           @endif 
                                       </td>


                                       <td class="text-center">
                                            <!-- <div class="dropdown dropdown-action">
                                                <a aria-expanded="false" data-toggle="dropdown" class="" href="#" style="text-decoration: none; color:#000;">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route('payrolls.show',$payroll->id)}}" class="dropdown-item"><i class="fa fa-envelope-o"></i><span style="margin-left: 5px;">Slip</span></a>
                                                    <a href="{{route('payrolls.edit',$payroll->id)}}" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    
                                                    <form method="post" action="{{route('payrolls.destroy',$payroll->id)}}" class="d-inline-block" id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:;" class="dropdown-item" onclick="document.getElementById('deleteForm').submit();"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </form>
                                                </div>
                                            </div> -->
                                            <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button> -->
                                            <a href="{{route('payrolls.show',$payroll->id)}}" class="btn btn-sm btn-warning text-white" title="Slip"><i class="fa fa-envelope-o"></i> Slip</a>

                                            @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                            <a href="{{route('payrolls.edit',$payroll->id)}}" class="btn btn-sm btn-success" title="Edit"><i class="icon-settings"></i></a>
                                            <form method="post" action="{{route('payrolls.destroy',$payroll->id)}}" class="d-inline-block" id="deleteform">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger" title="Delete" data-type="confirm" id="delete-button"><i class="fa fa-ban"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if (session('status'))
                        <input type="hidden" name="status" class="status" value="{{session('status')}}">
                        @endif
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

        $("#deleteform").unbind('submit');
        $("#delete-button").unbind('click');
        $('#payroll_table').on('click','#delete-button',function () {
            swal({
              title: "Are you sure to delete?",
              text: "Once deleted, you will not be able to recover this file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                $("#deleteform").unbind('submit');
                $(this).closest("#deleteform").unbind('submit').submit();
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
        }else if($( ".status" ).val() == 4){
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-bottom-right';
            toastr['success']('Mail Sent Succesfully! ');
        }


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
</script>

@endsection