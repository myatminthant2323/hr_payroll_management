@extends('backendtemplate')

@section('title', 'Event')

@section('content')

<div id="main-content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12">
					<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Events</h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>
						<li class="breadcrumb-item active">Events</li>
					</ul>
				</div>            
				<div class="col-lg-6 col-md-4 col-sm-12 text-right">
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
				</div>
			</div>
		</div>

		<div class="row clearfix">
			<div class="col-lg-8">
				<div class="card">
					<div class="body">
						<div id="calendar"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="body">
						<button type="button" class="btn btn-theme btn-block" data-toggle="modal" data-target="#addevent">Add New Event</button>
					</div>
				</div>
				<div class="card">
					<div class="body">
						<div class="event-name row">
							<div class="col-2 text-center">
								<h4>11<span>Dec</span><span>2018</span></h4>
							</div>
							<div class="col-10">
								<h6>Conference</h6>
								<p>Mobile World Congress 2018</p>
								<address><i class="fa fa-map-marker"></i> 4 Goldfield Rd. Honolulu, HI 96815</address>
							</div>
						</div>                            
						<div class="event-name row">
							<div class="col-2 text-center">
								<h4>13<span>Dec</span><span>2018</span></h4>
							</div>
							<div class="col-10">
								<h6>Birthday</h6>
								<p>Today, guests are getting in on the action</p>
								<address><i class="fa fa-map-marker"></i> 4 Goldfield Rd. Honolulu, HI 96815</address>
							</div>
						</div>
						<hr>
						<div class="event-name row">
							<div class="col-2 text-center">
								<h4>09<span>Dec</span><span>2018</span></h4>
							</div>
							<div class="col-10">
								<h6>Repeating Event</h6>
								<p>Before there were tech conferences, there was Disrupt.</p>
								<address><i class="fa fa-map-marker"></i> 44 Shirley Ave. West Chicago, IL 60185</address>
							</div>
						</div>
						<hr>
						<div class="event-name row">
							<div class="col-2 text-center">
								<h4>16<span>Dec</span><span>2018</span></h4>
							</div>
							<div class="col-10">
								<h6>Repeating Event</h6>
								<p>It is a long established fact that a reader will be distracted</p>
								<address><i class="fa fa-map-marker"></i> 123 6th St. Melbourne, FL 32904</address>
							</div>
						</div>
						<div class="event-name row">
							<div class="col-2 text-center">
								<h4>28<span>Dec</span><span>2018</span></h4>
							</div>
							<div class="col-10">
								<h6>Google</h6>
								<p>Google Hardware and Pixel 2 Launch</p>
								<address><i class="fa fa-map-marker"></i> 514 S. Magnolia St. Orlando, FL 32806</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection