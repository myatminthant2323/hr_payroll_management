@extends('backendtemplate')

@section('title', 'HR-Social')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Our Centres</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Our Centres</li>
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row text-center">
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="body xl-turquoise">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>354</h5>
                                        <span>America</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="body xl-khaki">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>258</h5>
                                        <span>Australia</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="body xl-parpl">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>85</h5>
                                        <span>Canada</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="body xl-salmon">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>120</h5>
                                        <span>India</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="body xl-blue">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>152</h5>
                                        <span>UK</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="body xl-slategray">
                                        <i class="fa fa-map-marker"></i>
                                        <h5>44</h5>
                                        <span>Other</span>
                                    </div>
                                </div>                      
                            </div>
                            <div id="world-map-markers" class="jvector-map mt-5" style="height: 400px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection