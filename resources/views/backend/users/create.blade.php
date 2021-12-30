@extends('backendtemplate')

@section('title', 'Employee')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item btn-theme-link"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <!-- <li class="breadcrumb-item">Users</li> -->
                        <li class="breadcrumb-item active">Users</li>
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
        <div class="container-fluid shadow-lg">
            <div class="row clearfix">
                <!-- <h3 class="text-center">Add Employees</h3> -->
                <div class="col-sm-10 mx-auto" style="margin-top: 10px; margin-bottom: 50px; ">
                    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12 my-4">
                                <h3 class="d-inline">Add User</h3>
                                <span class="float-right"><a href="{{route('users.index')}}" class="btn"><i class="icon-arrow-left btn-theme-link"></i></a></span>
                            </div>
                            <div class="col-md-12">
                                <select class="select form-control mb-3 show-tick emp_name" name="emp_name" id="emp_name">
                                    <option selected="selected">Select Employee ...</option>
                                    @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->username}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" required autocomplete="username" id="user_name" readonly="readonly">
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" required autocomplete="email" id="user_email" readonly="readonly">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="col-form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password <span class="text-danger">*</span></label>   
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
                                </div>
                            </div>
                            
                        </div>
                        <input type="submit" class="btn btn-theme" style="color: white;" name="btnAddUser" value="Add">
                        
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $("select.emp_name").change(function(){
            $("#user_name").val("");
            $("#user_email").val("");
            var selectedEmployeeID = $("select.emp_name option:selected").val();
            getEmployeeDetail(selectedEmployeeID);
        });
    })

    function getEmployeeDetail(id) {
        console.log("employee ",id)
        $.ajax({
         type:'GET',
         url:'/getemployee' + '/' + id,
         data:'_token = <?php echo csrf_token() ?>',
         success:function(response) {
            console.log(response);
            if(response["employee"] != null){
                console.log(response);
                var name = response["employee"].username;
                var email = response["employee"].email;
                $("#user_name").val(name);
                $("#user_email").val(email);
            }else{
                $("#user_name").val("");
                $("#user_email").val("");
            }
        }
    });
    }
</script>
@endsection