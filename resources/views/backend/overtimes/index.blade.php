@extends('backendtemplate')

@section('title', 'Overtime')

@section('content')

<!-- Modals -->

<!-- Add -->
<div class="modal fade" id="addOvertimeModal" tabindex="-1" role="dialog" aria-labelledby="addOvertime" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Overtime</h6>
            </div>
            <div class="modal-body">
                <form id="addOvertimeForm">
                   @csrf
                   <div class="row clearfix">
                    <div class="col-md-12">
                        <select class="select form-control mb-3 show-tick" name="overtime_emp_name" id="add_overtime_emp_name">
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
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('overtime_date') ? 'has-error' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Overtime Date *" data-date-format="yyyy-mm-dd" name="overtime_date" id="add_overtime_date">
                                    <span class="text-danger">{{ $errors->first('overtime_date') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('overtime_hour') ? 'has-error' : '' }}">
                                <input type="number" class="form-control" placeholder="Overtime Hours *" name="overtime_hour" id="add_overtime_hour" min="0">
                                <span class="text-danger">{{ $errors->first('overtime_hour') }}</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('overtime_rate') ? 'has-error' : '' }}">
                                <input type="number" class="form-control" placeholder="Overtime Rate% (hr) *" name="overtime_rate" id="add_overtime_rate" min="0" step="0.1" value="1.5" readonly="readonly">
                                <span class="text-danger">{{ $errors->first('overtime_rate') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <textarea rows="6" class="form-control no-resize" placeholder="Description *" name="description" id="add_overtime_description"></textarea>
                                <!-- <span class="text-danger">{{ $errors->first('description') }}</span> -->
                            </div>
                        </div>                    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="addOvertimeForm" class="btn btn-theme btnAddOvertime" id="btnAddOvertime">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add -->

<!-- Edit -->
<div class="modal fade" id="editOvertimeModal" tabindex="-1" role="dialog" aria-labelledby="editOvertime" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Overtime</h6>
            </div>
            <div class="modal-body">
                <form id="editOvertimeForm">
                   @csrf
                   @method('PUT')
                   <div class="row clearfix">
                    <div class="col-md-12">
                        <select class="select form-control mb-3 show-tick" name="overtime_emp_name" id="edit_overtime_emp_name">
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
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('overtime_date') ? 'has-error' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar"></i></span>
                                    </div>
                                    <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Overtime Date *" data-date-format="yyyy-mm-dd" name="overtime_date" id="edit_overtime_date">
                                    <span class="text-danger">{{ $errors->first('overtime_date') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('overtime_hour') ? 'has-error' : '' }}">
                                <input type="number" class="form-control" placeholder="Overtime Hours *" name="overtime_hour" id="edit_overtime_hour" min="0">
                                <span class="text-danger">{{ $errors->first('overtime_hour') }}</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group {{ $errors->has('overtime_rate') ? 'has-error' : '' }}">
                                <input type="number" class="form-control" placeholder="Overtime Rate% (hr) *" name="overtime_rate" id="edit_overtime_rate" min="0" step="0.1" value="1.5" readonly="readonly">
                                <span class="text-danger">{{ $errors->first('overtime_rate') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <textarea rows="6" class="form-control no-resize" placeholder="Description *" name="description" id="edit_overtime_description"></textarea>
                                <!-- <span class="text-danger">{{ $errors->first('description') }}</span> -->
                            </div>
                        </div>                    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="editOvertimeForm" class="btn btn-theme btnEditOvertime" id="btnEditOvertime">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit -->

<!-- End Modals -->

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Overtime</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Overtime</li>
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
                        <h2>Overtime</h2>
                        <ul class="header-dropdown">
                            <li><a href="javascript:void(0);" class="btn btn-theme" data-toggle="modal" data-target="#addOvertimeModal">Add New</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0 c_list " id="overtime_table">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Overtime Date</th>
                                        <th>Overtime Hour</th>
                                        <th>Overtime Rate</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($overtimes as $overtime)
                                    <tr>
                                        <td class="width45">
                                            @foreach($employees as $employee)
                                            @if ($overtime->employee_id == $employee->id)
                                            <a href="{{route('employees.show',$overtime->employee_id)}}">
                                                <img src="{{asset($employee->photo)}}" class="rounded-circle avatar" alt="">
                                            </a>
                                            @endif 
                                            @endforeach
                                        </td>
                                        <td>
                                            <h6 class="mb-0 h6_emp_name">

                                                @foreach($employees as $employee)
                                                @if ($overtime->employee_id == $employee->id)
                                                <a href="{{route('employees.show',$overtime->employee_id)}}" style="text-decoration: none; color: black;">
                                                    {{$employee->username}}
                                                </a>
                                                @endif 
                                                @endforeach 
                                            </h6>
                                            <span>HPM -{{sprintf("%03d", $overtime->employee_id)}}</span>                                     
                                        </td>
                                        <!-- <td>HPM -{{sprintf("%03d", $overtime->employee_id)}}</td> -->
                                        <td>{{$overtime->overtime_date}}</td>
                                        <td>{{$overtime->overtime_hour}}</td>
                                        <td>{{$overtime->overtime_rate}}<span class="text-danger" style="font-weight: bold;"> x</span></td>
                                        <td>{{$overtime->description}}</td>
                                        @if ($overtime->status == 0)
                                        <td><span class="badge badge-warning">Old</span></td>
                                        @elseif ($overtime->status == 1)
                                        <td><span class="badge badge-success"><i class="fa  fa-dot-circle-o"> New</i></span></td>
                                        @endif
                                        <td>
                                            @if ($overtime->user_id == $admin->id)
                                                <img src="{{url('/backendtemplate/employeeimg/avatar6.jpg')}}" class="rounded-circle avatar mr-1" alt="">
                                                {{$admin->name}}
                                            @else
                                                @foreach($employees as $employee)
                                                @if ($overtime->user_id == $employee->user_id)
                                                <a href="{{route('employees.show',$employee->id)}}" style="text-decoration: none; color: black;">
                                                    <img src="{{asset($employee->photo)}}" class="rounded-circle avatar mr-1" alt="">
                                                    {{$employee->username}}
                                                </a>
                                                @endif 
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success editOvertimeBtn" title="Approved" data-id="{{$overtime->id}}"><i class="icon-settings"></i></button>
                                            <form method="post" action="{{route('overtimes.destroy',$overtime->id)}}" class="d-inline-block" id="deleteform">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger" title="Declined" data-type="confirm" id="delete-button"><i class="fa fa-ban"></i></button>
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

        $("#deleteform").unbind('submit');
        $("#delete-button").unbind('click');
        $('#overtime_table').on('click','#delete-button',function () {
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
          title: "Delete Completed!",
          text: "Delete Successful",
          icon: "success",
          button: "OK",
      });
    }


        $('#overtime_table').on('click','.editOvertimeBtn',function () {
            $('#editOvertimeModal').modal('show');

            $tr = $(this).closest('tr');
            
            // console.log($.trim($tr.children("td").text()));

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            // console.log(data);
            var overtime_edit_id = $(this).attr('data-id');
                // alert(deisg_edit_id)

                // console.log($.trim($tr.children("td").children("h6").text()));
                
                $('select#edit_overtime_emp_name option').each(function(){

                    if($.trim($tr.children("td").children("h6").text()) == $(this).text()){
                        $("select#edit_leave_emp_name").find('option:selected').removeAttr("selected");
                        $(this).attr("selected","selected");
                    }

                    // alert($.trim((data[4]).replace('%','')));
                    
                });
                $('#edit_overtime_date').val($.trim(data[2]));
                $('#edit_overtime_hour').val($.trim(data[3]));
                $('#edit_overtime_rate').val($.trim((data[4]).replace('x','')));
                $('#edit_overtime_description').val($.trim(data[5]));

                // $('select#edit_desig_dept_name option').each(function(){
                //     if($.trim(data[2]) == $(this).text()){
                //         // alert($(this).text())
                //         $(this).attr("selected","selected");
                //     }

                // });

                $('#editOvertimeForm').on('submit',function(e){
                    e.preventDefault();
                // alert(id);

                if(overtime_edit_id !== ""){
                    var url = "{{route('overtimes.store')}}"+ '/' + overtime_edit_id;
                // alert(url)
                $.ajax({
                    type:"POST",
                    url: url,
                    enctype:"multipart/form-data",
                    data: $('#editOvertimeForm').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#editOvertimeModal').modal('hide')
                        location.reload();
                        

                    },
                    error: function(error){
                        console.log(error)
                        alert("Data did not Updated");
                    }
                })
            }


            overtime_edit_id = "";
        })
            })
    })

    $(document).ready(function () {
        $('#addOvertimeForm').on('submit',function(e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                enctype:"multipart/form-data",
                url:"{{route('overtimes.store')}}",
                data: $('#addOvertimeForm').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#addOvertimeModal').modal('hide')
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