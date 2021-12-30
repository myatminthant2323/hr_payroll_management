@extends('backendtemplate')

@section('title', 'DASHBOARD')

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

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Employee Salary <span class="text-danger"> (Monthly)</span></h2>
                        <ul class="header-dropdown">
                            <li><a href="{{route('salaries.create')}}" class="btn btn-theme">Add New</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0" id="salary_table">
                                <thead class="">
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <!-- <th>Employee ID</th> -->

                                        <th>Designation</th>
                                        <th>Basic Salary</th>
                                        <th>Gross Salary</th>
                                        <th>Deductions</th>
                                        <th>Net Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($salaries as $salary)
                                    <tr>
                                        <td class="width45">
                                            <a href="{{route('employees.show',$salary->employee_id)}}">
                                                <!-- @foreach($employees as $employee)
                                                    @if ($salary->employee_id == $employee->id) -->
                                                    <img src="{{asset($salary->employee->photo)}}" class="rounded-circle width35" alt="" name="photo">
                                                <!-- @endif 
                                                    @endforeach -->
                                                </a>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">
                                                    <a href="{{route('employees.show',$salary->employee_id)}}" style="text-decoration: none; color: black;">
                                                        {{$salary->employee->username}}
                                                    </a>
                                                </h6>
                                                <span>HPM -{{sprintf("%03d", $salary->employee_id)}}
                                                </span>
                                                <!-- <span>
                                                    @foreach($employees as $employee)
                                                    @if ($salary->employee_id == $employee->id)
                                                    {{$employee->email}}
                                                    @endif 
                                                    @endforeach 
                                                </span> -->
                                            </td>
                                            <!-- <td><span>HPM -{{sprintf("%03d", $salary->employee_id)}}
                                            </span></td> -->
                                            <!-- <td><span>
                                                @foreach($employees as $employee)
                                                @if ($salary->employee_id == $employee->id)
                                                {{$employee->phno1}}
                                                @endif 
                                                @endforeach
                                            </span></td>
                                            <td>
                                                @foreach($employees as $employee)
                                                @if ($salary->employee_id == $employee->id)
                                                {{$employee->join_date}}
                                                @endif 
                                                @endforeach
                                            </td> -->
                                            <td>
                                                @foreach($designations as $designation)
                                                @if ($salary->employee->designation_id == $designation->id)
                                                {{$designation->designation_name}}
                                                @endif 
                                                @endforeach
                                            </td>
                                            <td class="currency_format">{{$salary->basic_salary}}</td>
                                            <td class="currency_format">{{$salary->gross_salary}}</td>
                                            <td class="currency_format">{{$salary->total_deduction}}</td>
                                            <td class="currency_format">{{$salary->net_salary}}</td>

                                            <td>
                                                <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button> -->
                                                
                                                <a href="{{route('salaries.edit',$salary->id)}}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></a>
                                                <form method="post" action="{{route('salaries.destroy',$salary->id)}}" class="d-inline-block deleteform" id="deleteform">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete" title="Delete" data-type="confirm" id="btn-delete"><i class="fa fa-trash-o"></i></button>
                                                </form>
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

    <!-- Add Salary Modal -->
    <!-- <div id="add_salary" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Staff Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Select Staff</label>
                                    <select class="select"> 
                                        <option>John Doe</option>
                                        <option>Richard Miles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <label>Net Salary</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <h4 class="text-primary">Earnings</h4>
                                <div class="form-group">
                                    <label>Basic</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>DA(40%)</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>HRA(15%)</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Conveyance</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Allowance</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Medical  Allowance</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="add-more">
                                    <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                            <div class="col-sm-6">  
                                <h4 class="text-primary">Deductions</h4>
                                <div class="form-group">
                                    <label>TDS</label>
                                    <input class="form-control" type="text">
                                </div> 
                                <div class="form-group">
                                    <label>ESI</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>PF</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Leave</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Prof. Tax</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Labour Welfare</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="add-more">
                                    <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /Add Salary Modal -->
    
    <!-- Edit Salary Modal -->
    <!-- <div id="edit_salary" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Staff Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Select Staff</label>
                                    <select class="select"> 
                                        <option>John Doe</option>
                                        <option>Richard Miles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <label>Net Salary</label>
                                <input class="form-control" type="text" value="$4000">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <h4 class="text-primary">Earnings</h4>
                                <div class="form-group">
                                    <label>Basic</label>
                                    <input class="form-control" type="text" value="$6500">
                                </div>
                                <div class="form-group">
                                    <label>DA(40%)</label>
                                    <input class="form-control" type="text" value="$2000">
                                </div>
                                <div class="form-group">
                                    <label>HRA(15%)</label>
                                    <input class="form-control" type="text" value="$700">
                                </div>
                                <div class="form-group">
                                    <label>Conveyance</label>
                                    <input class="form-control" type="text" value="$70">
                                </div>
                                <div class="form-group">
                                    <label>Allowance</label>
                                    <input class="form-control" type="text" value="$30">
                                </div>
                                <div class="form-group">
                                    <label>Medical  Allowance</label>
                                    <input class="form-control" type="text" value="$20">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text">
                                </div>  
                            </div>
                            <div class="col-sm-6">  
                                <h4 class="text-primary">Deductions</h4>
                                <div class="form-group">
                                    <label>TDS</label>
                                    <input class="form-control" type="text" value="$300">
                                </div> 
                                <div class="form-group">
                                    <label>ESI</label>
                                    <input class="form-control" type="text" value="$20">
                                </div>
                                <div class="form-group">
                                    <label>PF</label>
                                    <input class="form-control" type="text" value="$20">
                                </div>
                                <div class="form-group">
                                    <label>Leave</label>
                                    <input class="form-control" type="text" value="$250">
                                </div>
                                <div class="form-group">
                                    <label>Prof. Tax</label>
                                    <input class="form-control" type="text" value="$110">
                                </div>
                                <div class="form-group">
                                    <label>Labour Welfare</label>
                                    <input class="form-control" type="text" value="$10">
                                </div>
                                <div class="form-group">
                                    <label>Fund</label>
                                    <input class="form-control" type="text" value="$40">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text" value="$15">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /Edit Salary Modal -->
    
    <!-- Delete Salary Modal -->
    <!-- <div class="modal custom-modal fade" id="delete_salary" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Salary</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /Delete Salary Modal -->   

    @endsection

    @section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#deleteform").unbind('submit');
            $("#btn-delete").unbind('click');
            $('#salary_table').on('click','#btn-delete',function () {
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
        }

            $(".currency_format").digits();
        })

        $.fn.digits = function(){ 
            return this.each(function(){ 
                $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
            })
        }
    </script>

    @endsection



