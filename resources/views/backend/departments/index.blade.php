@extends('backendtemplate')

@section('title', 'Department')

@section('content')

<!-- Modals -->
<!-- Add Deptment -->
<div class="modal animated fade" id="addDeptModal" tabindex="-1" role="dialog" aria-labelledby="addDept" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addDeptForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Departments</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('dept_name') ? 'has-error' : '' }}">                      
                                <input type="text" class="form-control" name="dept_name" id="add_dept_name" placeholder="Departments Name">
                                <span class="text-danger add_dept_name_error ml-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-theme" name="btnsubmit" value="Add">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>/
    </div>
</div>
<!-- End of Add Department -->

<!-- Edit Department -->
<div class="modal animated fade" id="editDeptModal" tabindex="-1" role="dialog" aria-labelledby="addDept" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editDeptForm">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Edit Department</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('dept_name') ? 'has-error' : '' }}">  
                                <input type="hidden" name="dept_id" id="dept_id">                    
                                <input type="text" class="form-control" name="dept_name" id="dept_name" placeholder="Departments Name">
                                <span class="text-danger add_dept_name_error ml-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-theme" name="btnsubmit" value="Update">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>/
    </div>
</div>
<!-- End of Edit Department -->

<!-- End of Modals -->

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Departments List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Departments List</li>
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
                        <h2>Department List</h2>
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <ul class="header-dropdown">
                            <li><a href="javascript:void(0);" class="btn btn-theme" data-toggle="modal" data-target="#addDeptModal">Add New</a></li>
                        </ul>
                        @endif
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dept_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                        <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                    @php ($i = 1)
                                    @foreach($departments as $department)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><h6 class="mb-0">{{$department->department_name}}</h6></td>
                                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-secondary editDeptBtn" title="Edit"  data-id="{{$department->id}}"><i class="icon-note" ></i></button>
                                            <button class="btn btn-sm btn-danger js-sweetalert deleteDeptBtn" title="Delete" data-id="{{$department->id}}"><i class="icon-trash"></i></button>
                                        </td>
                                        @endif
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
        $(".editDeptBtn").unbind('click');
        $('#dept_table').on('click','.editDeptBtn',function () {
            // $('.editDeptBtn').on('click',function(){
                // alert("entered")
                $('#editDeptModal').modal('show')
                $(".add_dept_name_error").text("");

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                var id = $(this).attr('data-id');
                
                $('#dept_name').val(data[1]);

                $("#editDeptForm").unbind('submit');
                $('#editDeptForm').on('submit',function(e){
                    e.preventDefault();
                    var new_dept = $('#dept_name').val();
                // alert(id);
                if(id !== ""){
                    var url = "{{route('departments.store')}}"+ '/' + id;
                // alert(url)
                $.ajax({
                    type:"POST",
                    url: url,
                    data: $('#editDeptForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        $('#editDeptModal').modal('hide')
                        $(".add_dept_name_error").text("");
                        var tbody;

                        $.each( response["departments"], function( key, department ) {
                            var i = key
                            tbody += `<tr>
                            <td>${++i}</td>
                            <td><h6 class="mb-0">${department.department_name}</h6></td>
                            <td class="text-center">
                            <button class="btn btn-sm btn-secondary editDeptBtn" title="Edit"  data-id="${department.id}"><i class="icon-note" ></i></button>
                            <button class="btn btn-sm btn-danger js-sweetalert deleteDeptBtn" title="Delete" data-id="${department.id}"><i class="icon-trash"></i></button>
                            </td>
                            </tr>`;

                        });

                        $('#table_body').html(tbody);
                        if(response["status"] == 1){
                            toastr.options.closeButton = true;
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr['success']('Updated successfully! ');  
                            // toastr['success']('"'+new_dept+'" is updated successfully! ');
                        }
                        // console.log(tbody)
                        tbody = "";
                        // id = "";
                        
                        
                    },
                    error: function(jqXHR,error, errorThrown) {  
                       if(jqXHR.status&&jqXHR.status==400){
                        // alert(jqXHR.responseText); 
                    }else if(jqXHR.status&&jqXHR.status==422){
                        console.log(jqXHR.responseJSON.errors);
                        $.each(jqXHR.responseJSON.errors, function (key, item) 
                        {
                            $(".add_dept_name_error").text(item);
                        });
                    }else{
                     toastr.options.closeButton = true;
                     toastr.options.positionClass = 'toast-bottom-right';
                     toastr.options.showDuration = 1000;
                     toastr['error']('Edit Failed!  Something went wrong!');
                 }
             }
         })
            }
            
            
            // id = "";
        })
            })
        $("#addDeptForm").unbind('submit');
        $('#addDeptForm').on('submit',function(e){
            e.preventDefault();
            var new_dept = $('#add_dept_name').val();
            $.ajax({
                type:"POST",
                url:"{{route('departments.store')}}",
                data: $('#addDeptForm').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#addDeptModal').modal('hide');
                    $(".add_dept_name_error").text("");
                    var tbody_add;

                        // if(status == 1){
                        //     toastr.options.closeButton = true;
                        //     toastr.options.positionClass = 'toast-bottom-right';    
                        //     toastr['success']('Create Deparyment Sucessfully');
                        // }

                        $.each( response["departments"], function( key, department ) {
                            var i = key
                            tbody_add += `<tr>
                            <td>${i++}</td>
                            <td><h6 class="mb-0">${department.department_name}</h6></td>
                            <td class="text-center">
                            <button class="btn btn-sm btn-secondary editDeptBtn" title="Edit"  data-id="${department.id}"><i class="icon-note" ></i></button>
                            <button class="btn btn-sm btn-danger js-sweetalert deleteDeptBtn" title="Delete" data-id="${department.id}"><i class="icon-trash"></i></button>
                            </td>
                            </tr>`;

                        });

                        $('#table_body').html(tbody_add);
                        if(response["status"] == 1){
                            toastr.options.closeButton = true;
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr['success']('Created successfully! ');
                            // toastr['success']('New Depertment "'+new_dept+'" is created successfully! ');
                        }
                        $('#add_dept_name').val("");
                    },
                    error: function(jqXHR,error, errorThrown) {  
                       if(jqXHR.status&&jqXHR.status==400){
                        // alert(jqXHR.responseText); 
                    }else if(jqXHR.status&&jqXHR.status==422){
                        console.log(jqXHR.responseJSON.errors);
                        $.each(jqXHR.responseJSON.errors, function (key, item) 
                        {
                            $(".add_dept_name_error").text(item);
                        });
                    }else{
                       toastr.options.closeButton = true;
                       toastr.options.positionClass = 'toast-bottom-right';
                       toastr.options.showDuration = 1000;
                       toastr['error']('Create Failed!  Something went wrong!');
                   }
               }


                    // error: function(xhr, status, error) 
                    // {

                    //   $.each(xhr.responseJSON.errors, function (key, item) 
                    //   {
                    //     $(".add_dept_name_error").text(item);
                    // });

                    // }


                    // error: function(error){
                    //     console.log(error)
                    //     alert("Data did not saved");
                    // }




                    
                })
        })

        $(".deleteDeptBtn").unbind('click');
        $('#dept_table').on('click','.deleteDeptBtn',function () {
                // e.preventDefault();
                var dept_delete_id = $(this).attr('data-id');
                // console.log(dept_delete_id);
                swal({
                  title: "Are you sure to delete?",
                  text: "Once deleted, you will not be able to recover this file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                        type:"DELETE",
                        url:"{{route('departments.store')}}"+ '/' + dept_delete_id,
                        cache: false,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            console.log(response)
                        // $('#addDesigModal').modal('hide')
                        var tbody_delete_dept;

                        $.each( response["departments"], function( key, department ) {
                            var i = key
                            tbody_delete_dept += `
                            <tr>
                            <td>${++i}</td>
                            <td><h6 class="mb-0">${department.department_name}</h6>
                            </td>`;
                            
                          // $.each( response["departments"], function( key, department ){
                          //   if (designation.department_id == department.id)
                          //       tbody_add_desig += `${department.department_name}`;

                          //   })
                          tbody_delete_dept += `<td class="text-center">
                          <button class="btn btn-sm btn-secondary editDeptBtn" title="Edit" data-id="${department.id}"><i class="icon-note"></i></button>
                          <button class="btn btn-sm btn-danger js-sweetalert deleteDeptBtn" title="Delete" data-id="${department.id}"><i class="icon-trash"></i></button>
                          </td>
                          </tr>`;

                      });

                        

                        $('#table_body').html(tbody_delete_dept);
                        if(response["status"] == 1){
                            toastr.options.closeButton = true;
                            toastr.options.positionClass = 'toast-bottom-right';    
                            toastr['success']('Deleted Successfully! ');
                        }
                    },
                    error: function(error){
                     toastr.options.closeButton = true;
                     toastr.options.positionClass = 'toast-bottom-right';
                     toastr.options.showDuration = 1000;
                     toastr['error']('Delete Failed!  Something went wrong!');
                 }
             })
                } else {

                }
            });
                
            })
    })

$(document).ready(function () {

})
</script>
@endsection