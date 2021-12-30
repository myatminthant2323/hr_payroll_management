@extends('backendtemplate')

@section('title', 'Holiday')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> Holidays</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>                            
                        <li class="breadcrumb-item active">Holidays</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Holidays List</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>                                            
                                        <th>Day</th>
                                        <th>Date</th>
                                        <th>Holiday name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-danger">
                                        <td>01</td>
                                        <td>Friday</td>
                                        <td>January 26, 2018</td>
                                        <td>Republic Day</td>
                                    </tr>
                                    <tr class="text-danger">
                                        <td>02</td>
                                        <td>Friday</td>
                                        <td>March 30, 2018</td>
                                        <td>Good Friday</td>
                                    </tr>
                                    <tr class="text-danger">
                                        <td>03</td>
                                        <td>Monday</td>
                                        <td>April 30, 2018</td>
                                        <td>Buddha Purnima</td>
                                    </tr>
                                    <tr class="text-danger">
                                        <td>04</td>
                                        <td>Saturday</td>
                                        <td>June 16, 2018</td>
                                        <td>Id-Ul-Fitr</td>
                                    </tr>
                                    <tr class="text-success">
                                        <td>05</td>
                                        <td>Wednesday</td>
                                        <td>August 15, 2018</td>
                                        <td>Independence Day</td>
                                    </tr>
                                    <tr>
                                        <td>06</td>
                                        <td>Wednesday</td>
                                        <td>August 22, 2018</td>
                                        <td>Id-Ul-Zuha (Bakrid)</td>
                                    </tr>
                                    <tr>
                                        <td>07</td>
                                        <td>Monday</td>
                                        <td>September 3, 2018</td>
                                        <td>Janmashtami</td>
                                    </tr>
                                    <tr>
                                        <td>08</td>
                                        <td>Tuesday</td>
                                        <td>October 2, 2018</td>
                                        <td>Gandhi Jayanti</td>
                                    </tr>
                                    <tr>
                                        <td>09</td>
                                        <td>Wednesday</td>
                                        <td>November 7, 2018</td>
                                        <td>Diwali / Deepavali</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Tuesday</td>
                                        <td>December 25, 2018</td>
                                        <td>Christmas Day</td>
                                    </tr>
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