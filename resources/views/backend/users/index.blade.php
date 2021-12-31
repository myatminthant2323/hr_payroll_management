@extends('backendtemplate')

@section('title', 'User')

@section('content')



<div id="main-content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12">
					<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a>Users</h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>
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

		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="header">
						<h2>List</h2>
						<!-- <ul class="header-dropdown">
							<li><a href="{{route('users.create')}}" class="btn btn-theme">Add User</a></li>
						</ul> -->
					</div>
					<div class="body">
						<div class="table-responsive">
							<table class="table table-hover js-basic-example dataTable table-custom m-b-0">
								<thead>
									<tr>
										<th>#</th>                                   
										<th>Name</th>

										<th>Role</th>
										<th>Created Date</th>
										<!-- <th>Role</th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>
											@foreach ($user->roles()->pluck('name') as $role)
											@if ($role == 'admin')
												<img src="{{ asset('backendtemplate/employeeimg/avatar6.jpg')}}" class="rounded-circle width35" alt="">
											@else 
												@foreach ($employees as $employee)
													@if ($employee->user_id == $user->id)
													<a href="{{route('employees.show',$employee->id)}}">
														<img src="{{$employee->photo}}" class="rounded-circle width35" alt="">
													</a>
													@endif
												@endforeach
											@endif
											@endforeach
											
										</td>
										<td>
											<h6 class="mb-0">
												@foreach ($user->roles()->pluck('name') as $role)
												@if ($role == 'admin')
													{{$user->name}}
												@else
													@foreach ($employees as $employee)
														@if ($employee->user_id == $user->id)
															<a href="{{route('employees.show',$employee->id)}}" style="text-decoration: none; color: black;">
																{{$user->name}}
															</a>
														@endif
													@endforeach
												@endif
												@endforeach
												</h6>
											<span>{{$user->email}}</span>
										</td>
										<td><span
											@foreach ($user->roles()->pluck('name') as $role)
											@if ($role == 'admin')
											class="badge badge-danger"
											@elseif ($role == 'hr') class="badge badge-success"
											@else class="badge badge-warning"
											@endif
											@endforeach>{{$user->roles->pluck('name')[0]}}</span></td>
											<td>{{$user->created_at}}</td>
											<!-- <td>CEO and Founder</td> -->
											<td>
												<a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form method="post" action="{{route('users.destroy',$user->id)}}" class="d-inline-block">
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