@extends('backendtemplate')

@section('title', 'Department')

@section('content')

<!-- Modals -->

<!-- Add -->

<div class="modal animated fade" id="addDesigModal" tabindex="-1" role="dialog" aria-labelledby="addDept" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addDesigForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Designations</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation Name</label>
                                <div class="form-group {{ $errors->has('designation_name') ? 'has-error' : '' }}">                      
                                    <input type="text" class="form-control" name="designation_name" id="add_desig_name">
                                    <span class="text-danger add_desig_name_error ml-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-theme" name="btnAddDesig" value="Add">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>/
    </div>
</div>

<!-- End Add -->

<!-- Edit -->

<div class="modal animated fade" id="editDesigModal" tabindex="-1" role="dialog" aria-labelledby="addDept" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editDesigForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Edit Designations</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation Name</label>
                                <div class="form-group {{ $errors->has('designation_name') ? 'has-error' : '' }}">                      
                                    <input type="text" class="form-control" name="designation_name" id="edit_desig_name">
                                    <span class="text-danger add_desig_name_error ml-1"></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-theme" name="btnAddDesig" value="Update">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>/
    </div>
</div>


<!-- End Edit -->

<!-- End of Modals -->




<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Designations List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">designation-s List</li>
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
                        <h2>Designation List</h2>
                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                        <ul class="header-dropdown">
                            <li><a href="javascript:void(0);" class="btn btn-theme" data-toggle="modal" data-target="#addDesigModal">Add New</a></li>
                        </ul>
                        @endif
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead id="desig_table_head">
                                    <tr>
                                        <th>#</th>
                                        <th>Designation Name</th>
                                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                        <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody id="desig_table">
                                    @php ($i = 1)
                                    @foreach($designations as $designation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><h6 class="mb-0">{{$designation->designation_name}}</h6>
                                        </td>
                                        @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-secondary editDesigBtn" title="Edit" data-id="{{$designation->id}}"><i class="icon-note"></i></button>
                                            <button class="btn btn-sm btn-danger js-sweetalert deleteDesigBtn" title="Delete" data-id="{{$designation->id}}"><i class="icon-trash"></i></button>
                                            
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

          //   $( "th" ).one( "click", function() {
          //     alert( "This will be displayed only once." );
          // });

          $(".editDesigBtn").unbind('click');
          $('#desig_table').on('click','.editDesigBtn',function () {
            $('#editDesigModal').modal('show');
            $(".add_desig_name_error").text("");

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            var deisg_edit_id = $(this).attr('data-id');
                // alert(deisg_edit_id)
                
                $('#edit_desig_name').val($.trim(data[1]));

                // $('select#edit_desig_dept_name option').each(function(){
                //     if($.trim(data[2]) == $(this).text()){
                //         // alert($(this).text())
                //         $(this).attr("selected","selected");
                //     }

                // });

                $("#editDesigForm").unbind('submit');
                $('#editDesigForm').on('submit',function(e){
                    e.preventDefault();
                    var new_design = $('#edit_desig_name').val();

                    if(deisg_edit_id !== ""){
                        var url = "{{route('designations.store')}}"+ '/' + deisg_edit_id;
                // alert(url)
                $.ajax({
                    type:"POST",
                    url: url,
                    data: $('#editDesigForm').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#editDesigModal').modal('hide');
                        $(".add_desig_name_error").text("");
                        var tbody_desig_edit;

                        $.each( response["designations"], function( key, designation ) {
                            var i = key
                            tbody_desig_edit += `
                            <tr>
                            <td>${++i}</td>
                            <td><h6 class="mb-0">${designation.designation_name}</h6>
                            </td>`;

                          // $.each( response["departments"], function( key, department ){
                          //   if (designation.department_id == department.id)
                          //       tbody_desig_edit += `${department.department_name}`;

                          //   })
                          
                          tbody_desig_edit += `<td class="text-center">
                          <button class="btn btn-sm btn-secondary editDesigBtn" title="Edit" data-id="${designation.id}"><i class="icon-note"></i></button>
                          <button class="btn btn-sm btn-danger js-sweetalert deleteDesigBtn" title="Delete" data-id="${designation.id}"><i class="icon-trash"></i></button>
                          </td>
                          </tr>`;

                      });

                        $('#desig_table').html(tbody_desig_edit);
                        if(response["status"] == 1){
                            toastr.options.closeButton = true;
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr['success']('Updated successfully! ');
                            // toastr['success']('"'+new_design+'" is updated successfully! ');
                        }
                        // console.log(tbody_desig_edit)
                        tbody_desig_edit = "";
                        // deisg_edit_id = "";
                        

                    },
                    error: function(jqXHR,error, errorThrown) {  
                       if(jqXHR.status&&jqXHR.status==400){
                        // alert(jqXHR.responseText); 
                    }else if(jqXHR.status&&jqXHR.status==422){
                        console.log(jqXHR.responseJSON.errors);
                        $.each(jqXHR.responseJSON.errors, function (key, item) 
                        {
                            $(".add_desig_name_error").text(item);
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


                // deisg_edit_id = "";
            })
            })


$("#addDesigForm").unbind('submit');
$('#addDesigForm').on('submit',function(e){
    e.preventDefault();
    var new_design = $('#add_desig_name').val();
    $.ajax({
        type:"POST",
        url:"{{route('designations.store')}}",
        data: $('#addDesigForm').serialize(),
        success: function (response) {
            console.log(response)
            $('#addDesigModal').modal('hide')
            $(".add_desig_name_error").text("");
            var tbody_add_desig;

            $.each( response["designations"], function( key, designation ) {
                var i = key
                tbody_add_desig += `
                <tr>
                <td>${++i}</td>
                <td><h6 class="mb-0">${designation.designation_name}</h6>
                </td>`;

                          // $.each( response["departments"], function( key, department ){
                          //   if (designation.department_id == department.id)
                          //       tbody_add_desig += `${department.department_name}`;

                          //   })
                          tbody_add_desig += `<td class="text-center">
                          <button class="btn btn-sm btn-secondary editDesigBtn" title="Edit" data-id="${designation.id}"><i class="icon-note"></i></button>
                          <button class="btn btn-sm btn-danger js-sweetalert deleteDesigBtn" title="Delete" data-id="${designation.id}"><i class="icon-trash"></i></button>
                          </td>
                          </tr>`;

                      });



            $('#desig_table').html(tbody_add_desig);

            if(response["status"] == 1){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-bottom-right'; 
                toastr['success']('Created successfully! ');   
                            // toastr['success']('New Designation "'+new_design+'" is created successfully! ');
                        }
                        $('#add_desig_name').val("");
                        // $('#choose_desig_dept_name').val("");
                    },
                    error: function(jqXHR,error, errorThrown) {  
                       if(jqXHR.status&&jqXHR.status==400){
                        // alert(jqXHR.responseText); 
                    }else if(jqXHR.status&&jqXHR.status==422){
                        console.log(jqXHR.responseJSON.errors);
                        $.each(jqXHR.responseJSON.errors, function (key, item) 
                        {
                            $(".add_desig_name_error").text(item);
                        });
                    }else{
                        toastr.options.closeButton = true;
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.options.showDuration = 1000;
                        toastr['error']('Create Failed!  Something went wrong!');
                        // alert("Something went wrong");
                    }
                }
            })
})

})

$(".deleteDesigBtn").unbind('click');
$('#desig_table').on('click','.deleteDesigBtn',function () {
                // alert("Hi");
                // e.preventDefault();
                var deisg_delete_id = $(this).attr('data-id');
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
                        url:"{{route('designations.store')}}"+ '/' + deisg_delete_id,
                        cache: false,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            console.log(response)
                        // $('#addDesigModal').modal('hide')
                        var tbody_delete_desig;

                        $.each( response["designations"], function( key, designation ) {
                            var i = key
                            tbody_delete_desig += `
                            <tr>
                            <td>${++i}</td>
                            <td><h6 class="mb-0">${designation.designation_name}</h6>
                            </td>`;

                          // $.each( response["departments"], function( key, department ){
                          //   if (designation.department_id == department.id)
                          //       tbody_add_desig += `${department.department_name}`;

                          //   })
                          tbody_delete_desig += `<td class="text-center">
                          <button class="btn btn-sm btn-secondary editDesigBtn" title="Edit" data-id="${designation.id}"><i class="icon-note"></i></button>
                          <button class="btn btn-sm btn-danger js-sweetalert deleteDesigBtn" title="Delete" data-id="${designation.id}"><i class="icon-trash"></i></button>
                          </td>
                          </tr>`;

                      });



                        $('#desig_table').html(tbody_delete_desig);
                        if(response["status"] == 1){
                            toastr.options.closeButton = true;
                            toastr.options.positionClass = 'toast-bottom-right';    
                            toastr['success']('Deleted successfully! ');
                        }
                        // $('#add_desig_name').val("");
                        // $('#choose_desig_dept_name').val("");
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
        </script>
        @endsection