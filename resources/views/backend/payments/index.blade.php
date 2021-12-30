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
                        <li class="breadcrumb-item active">Employee Payroll</li>
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
                        <h2>Employee Payroll</h2>
                        <ul class="header-dropdown">
                            <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addLeaveModal">Add Leave</a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dataTable table-custom m-b-0 c_list " id="leave_table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Employee ID</th>
                                        <th>Leave Date</th>
                                        <th>Leave Days</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leaves as $leave)
                                    <tr>
                                        <td class="width45">
                                            @foreach($employees as $employee)
                                            @if ($leave->employee_id == $employee->id)
                                            <img src="{{asset($employee->photo)}}" class="rounded-circle avatar" alt="">
                                            @endif 
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($employees as $employee)
                                            @if ($leave->employee_id == $employee->id)
                                            {{$employee->username}}
                                            @endif 
                                            @endforeach                                        
                                        </td>
                                        <td>HPM -{{sprintf("%03d", $leave->employee_id)}}</td>
                                        <td>{{$leave->leave_date}}</td>
                                        <td>{{$leave->total_leave_day}}</td>
                                        <td>{{$leave->reason}}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success editLeaveBtn" title="Approved" data-id="{{$leave->id}}"><i class="icon-settings"></i></button>
                                            <form method="post" action="{{route('leaves.destroy',$leave->id)}}" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger js-sweetalert" title="Declined" data-type="confirm"><i class="fa fa-ban"></i></button>
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
        $('#leave_table').on('click','.editLeaveBtn',function () {
            $('#editLeaveModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            var leave_edit_id = $(this).attr('data-id');
                // alert(deisg_edit_id)
                
                $('select#edit_leave_emp_name option').each(function(){
                    // alert($(this).text());
                    if($.trim(data[1]) == $(this).text()){
                        $("select#edit_leave_emp_name").find('option:selected').removeAttr("selected");
                        $(this).attr("selected","selected");
                    }
                    
                });
                $('#edit_leave_date').val($.trim(data[3]));
                $('#edit_leave_day').val($.trim(data[4]));
                $('#edit_leave_reason').val($.trim(data[5]));

                // $('select#edit_desig_dept_name option').each(function(){
                //     if($.trim(data[2]) == $(this).text()){
                //         // alert($(this).text())
                //         $(this).attr("selected","selected");
                //     }

                // });

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


            leave_edit_id = "";
        })
            })
    })

    $(document).ready(function () {
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