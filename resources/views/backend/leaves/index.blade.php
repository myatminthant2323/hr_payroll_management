@extends('backendtemplate')

@section('title', 'Leave')

@section('content')

<!-- Modals -->

<!-- Add -->
<div class="modal fade" id="addLeaveModal" tabindex="-1" role="dialog" aria-labelledby="addLeave" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Leave</h6>
            </div>
            <div class="modal-body">
                <form id="addLeaveForm">
                   @csrf
                   <div class="row clearfix">
                    @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                    <div class="col-md-12">
                        <select class="select form-control mb-3 show-tick" name="leave_emp_name" id="add_leave_emp_name">
                            <option selected="selected">Select Employee ...</option>
                            @foreach($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->username}}</option>
                            @endforeach 
                        </select>
                            <!-- <select class="form-control mb-3 show-tick">
                                <option>Select Leave Type</option>
                                <option>Casual Leave (12)</option>
                                <option>Medical Leave</option>
                                <option>Maternity Leave</option>
                            </select> -->
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('leave_date') ? 'has-error' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Leave Date *" data-date-format="yyyy-mm-dd" name="leave_date" id="add_leave_date">
                                    <span class="text-danger">{{ $errors->first('leave_date') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('leave_day') ? 'has-error' : '' }}">
                                <input type="number" class="form-control" placeholder="Leave Days *" name="leave_day" id="add_leave_day">
                                <span class="text-danger">{{ $errors->first('leave_day') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
                                <textarea rows="6" class="form-control no-resize" placeholder="Leave Reason *" name="reason" id="add_leave_reason"></textarea>
                                <span class="text-danger">{{ $errors->first('reason') }}</span>
                            </div>
                        </div>                    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="addLeaveForm" class="btn btn-theme btnAddLeave" id="btnAddLeave">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add -->

<!-- Edit -->

<!-- End Edit -->
<div class="modal fade" id="editLeaveModal" tabindex="-1" role="dialog" aria-labelledby="editLeave" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Leave</h6>
            </div>
            <div class="modal-body">
                <form id="editLeaveForm">
                    @csrf
                    @method('PUT')
                    <div class="row clearfix">
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <div class="col-md-12">
                            <select class="select form-control mb-3 show-tick" name="leave_emp_name" id="edit_leave_emp_name">
                                <option selected="selected">Select Employee ...</option>
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->username}}</option>
                                @endforeach 
                            </select>
                            <!-- <select class="form-control mb-3 show-tick">
                                <option>Select Leave Type</option>
                                <option>Casual Leave (12)</option>
                                <option>Medical Leave</option>
                                <option>Maternity Leave</option>
                            </select> -->
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('leave_date') ? 'has-error' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Leave Date *" data-date-format="yyyy-mm-dd" name="leave_date" id="edit_leave_date">
                                    <span class="text-danger">{{ $errors->first('leave_date') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('leave_day') ? 'has-error' : '' }}">
                                <input type="number" class="form-control" placeholder="Leave Days *" name="leave_day" id="edit_leave_day">
                                <span class="text-danger">{{ $errors->first('leave_day') }}</span>
                            </div>
                        </div>
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                <select class="select form-control mb-3 show-tick" name="status" id="status">
                                <option value="0">Pending</option>
                                <option value="1">Approved</option>
                                <option value="2">Declined</option>
                            </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
                                <textarea rows="6" class="form-control no-resize" placeholder="Leave Reason *" name="reason" id="edit_leave_reason"></textarea>
                                <span class="text-danger">{{ $errors->first('reason') }}</span>
                            </div>
                        </div>                    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="editLeaveForm" class="btn btn-theme btnEditLeave" id="btnEditLeave">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modals -->

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Leave Request</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Leave Request</li>
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

                        <h2>Employee List<span>{{session('status')}}</span></h2>
                        <ul class="header-dropdown">
                            <li><a href="javascript:void(0);" class="btn btn-theme" data-toggle="modal" data-target="#addLeaveModal">Add Leave</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <button type="button" class="btn  btn-simple btn-sm btn-default btn-filter" data-target="all"><span class="mx-4">All</span></button>
                        <button type="button" class="btn  btn-simple btn-sm btn-success btn-filter" data-target="approved">Approved</button>
                        <button type="button" class="btn  btn-simple btn-sm btn-warning btn-filter" data-target="pending">Pending</button>
                        <button type="button" class="btn  btn-simple btn-sm btn-danger btn-filter" data-target="declined">Declined</button>
                        <!-- <select class="form-control float-right mb-3" style="width: 150px;">
                            <option>All</option>
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Declined</option>
                        </select> -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover js-basic-example table-filter dataTable table-custom m-b-0 c_list " id="leave_table">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Leave Date</th>
                                        <th>Leave Days</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Approved By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leaves as $leave)
                                    <tr 
                                    @if ($leave->status == 0)
                                    data-status="pending"
                                    @elseif($leave->status == 1)
                                    data-status="approved"
                                    @else
                                    data-status="declined"
                                    @endif
                                    >
                                        <td class="width45">
                                            @foreach($employees as $employee)
                                            @if ($leave->employee_id == $employee->id)
                                            <a href="{{route('employees.show',$leave->employee_id)}}">
                                                <img src="{{asset($employee->photo)}}" class="rounded-circle avatar" alt="">
                                            </a>
                                            @endif 
                                            @endforeach
                                        </td>
                                        <td>
                                            <h6 class="mb-0 h6_emp_name">

                                                @foreach($employees as $employee)
                                                @if ($leave->employee_id == $employee->id)
                                                <a href="{{route('employees.show',$leave->employee_id)}}" style="text-decoration: none; color: black;">
                                                    {{$employee->username}}
                                                </a>
                                                @endif 
                                                @endforeach 
                                            </h6>
                                            <span>HPM -{{sprintf("%03d", $leave->employee_id)}}</span>                                       
                                        </td>
                                        <td>{{$leave->leave_date}}</td>
                                        <td>{{$leave->total_leave_day}}</td>
                                        <td>{{$leave->reason}}</td>
                                        @if ($leave->status == 0)
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        @elseif ($leave->status == 1)
                                        <td><span class="badge badge-success">Approved</span></td>
                                        @else
                                        <td><span class="badge badge-danger">Declined</span></td>
                                        @endif
                                        
                                        <td>
                                            @if($leave->user_id == null)
                                                -
                                            @else
                                            
                                                @if ($leave->user_id == $admin->id)
                                                    <img src="{{url('/backendtemplate/employeeimg/avatar6.jpg')}}" class="rounded-circle avatar mr-1" alt="">
                                                    {{$admin->name}}
                                                @else
                                                    @foreach($employees as $employee)
                                                    @if ($leave->user_id == $employee->user_id)
                                                    <a href="{{route('employees.show',$employee->id)}}" style="text-decoration: none; color: black;">
                                                        <img src="{{asset($employee->photo)}}" class="rounded-circle avatar mr-1" alt="">
                                                        {{$employee->username}}
                                                    </a>
                                                    @endif 
                                                    @endforeach
                                                @endif
                                            @endif
                                        </td>
                                        @if (Auth::user()->roles()->pluck('name')[0] == "staff")
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success editLeaveBtn" title="Approved" data-id="{{$leave->id}}"><i class="icon-settings"></i></button>
                                            <form method="post" action="{{route('leaves.destroy',$leave->id)}}" class="d-inline-block" id="deleteform">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger" title="Declined" data-type="confirm" id="delete-button"><i class="fa fa-ban"></i></button>
                                            </form>
                                        </td>
                                        @else
                                        @if ($leave->status == 0)
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger js-sweetalert btnDeclined" title="Declined" data-id="{{$leave->id}}" id="btnDeclined"><i class="fa fa-ban"></i></button>
                                            <button type="button" class="btn btn-sm btn-success btnApprove" title="Approved" data-id="{{$leave->id}}" id="btnApprove"><i class="fa fa-check"></i></button>
                                        </td>
                                        @else
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success editLeaveBtn" title="Approved" data-id="{{$leave->id}}"><i class="icon-settings"></i></button>
                                            <form method="post" action="{{route('leaves.destroy',$leave->id)}}" class="d-inline-block" id="deleteform">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger" title="Declined" data-type="confirm" id="delete-button"><i class="fa fa-ban"></i></button>
                                            </form>
                                        </td>
                                        @endif
                                        @endif
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

        $("#btnDeclined").unbind('click');
        $('#leave_table').on('click','#btnDeclined',function () {
            var leave_declined_emp_id = $(this).attr('data-id');
            if(leave_declined_emp_id !== ""){
                $.ajax({
                 type:'POST',
                 url:'/declineleave' + '/' + leave_declined_emp_id,
                 data:{
                    "_token": "{{ csrf_token() }}",
                    "id" : leave_declined_emp_id,
                },
                success:function(response) {
                    location.reload();
            }
        });
            }
        }); 

        $("#btnApprove").unbind('click');
        $('#leave_table').on('click','#btnApprove',function () {
            var leave_approve_emp_id = $(this).attr('data-id');
            if(leave_approve_emp_id !== ""){
                $.ajax({
                 type:'POST',
                 url:'/acceptleave' + '/' + leave_approve_emp_id,
                 data:{
                    "_token": "{{ csrf_token() }}",
                    "id" : leave_approve_emp_id,
                },
                success:function(response) {
                    location.reload();
            }
        });
            }
        }); 


        $("#deleteform").unbind('submit');
        $("#delete-button").unbind('click');
        $('#leave_table').on('click','#delete-button',function () {
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
          alert($( ".status" ).val());
          swal({
              title: "Creation Complete!",
              text: "Create Successful",
              icon: "success",
              button: "OK",
          });
      }else if($( ".status" ).val() == 2){
        swal({
          title: "Update Complete!",
          text: "Update Successful",
          icon: "success",
          button: "OK",
      });
    }else if($( ".status" ).val() == 3){
        swal({
          title: "Deletion Complete!",
          text: "Delete Successful",
          icon: "success",
          button: "OK",
      });
    }


    $(".editLeaveBtn").unbind('click');
    $('#leave_table').on('click','.editLeaveBtn',function () {
        $('#editLeaveModal').modal('show');

        $tr = $(this).closest('tr');

            // console.log($.trim($tr.children("td").text()));

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            // console.log(data);
            var leave_edit_id = $(this).attr('data-id');
                // alert(deisg_edit_id)

                // console.log($.trim($tr.children("td").children("h6").text()));
                
                $('select#edit_leave_emp_name option').each(function(){
                    // console.log($(this).text());
                    if($.trim($tr.children("td").children("h6").text()) == $(this).text()){
                        // alert($(this).text());
                        $("select#edit_leave_emp_name").find('option:selected').removeAttr("selected");
                        $(this).attr("selected","selected");
                    }
                    
                });
                $('#edit_leave_date').val($.trim(data[2]));
                $('#edit_leave_day').val($.trim(data[3]));
                $('#edit_leave_reason').val($.trim(data[4]));

                var user = "{!! auth()->user()->roles()->pluck('name')[0] !!}";
                // alert(data[5]);
                if(user !== "staff"){

                    $('select#status option').each(function(){
                        // console.log($.trim(data[5]));
                    if($.trim(data[5]) == $.trim($(this).text())){
                        // alert($.trim(data[5]));
                        $("select#status").find('option:selected').removeAttr("selected");
                        $(this).attr("selected","selected");
                    }
                    
                });

                    // if(data[5] == "Declined"){
                    //     $("select#status").find('option[text="Declined"]').attr("selected","selected");
                    //     // if( $('#status').text() == "Declined"){
                    //     //     $(this).attr("selected","selected");
                    //     // }
                    // }
                    
                }
                // console.log(data[5]);
                // $('select#edit_desig_dept_name option').each(function(){
                //     if($.trim(data[2]) == $(this).text()){
                //         // alert($(this).text())
                //         $(this).attr("selected","selected");
                //     }

                // });
                $("#editLeaveForm").unbind('submit');
                $('#editLeaveForm').on('submit',function(e){
                    e.preventDefault();
                // alert(id);

                if(leave_edit_id !== ""){
                    var url = "{{route('leaves.store')}}"+ '/' + leave_edit_id;
                // alert(url)
                $.ajax({
                    type:"POST",
                    url: url,
                    enctype:"multipart/form-data",
                    data: $('#editLeaveForm').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#editLeaveModal').modal('hide')
                        location.reload();
                        

                    },
                    error: function(error){
                        console.log(error)
                        alert("Data did not Updated");
                    }
                })
            }


            // leave_edit_id = "";
        })
            })
})

$(document).ready(function () {
    $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });



    $("#addLeaveForm").unbind('submit');
    $('#addLeaveForm').on('submit',function(e){
        e.preventDefault();

        $.ajax({
            type:"POST",
            enctype:"multipart/form-data",
            url:"{{route('leaves.store')}}",
            data: $('#addLeaveForm').serialize(),
            success: function (response) {
                console.log(response)
                $('#addLeaveModal').modal('hide')
                status = 1;
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
</script>
@endsection