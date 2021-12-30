@extends('backendtemplate')

@section('title', 'Salary')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Payslip</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Payroll</li>
                        <li class="breadcrumb-item active">Payslip</li>
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
            <div class="col-lg-12 col-md-12">
                <div class="card invoice1">                        
                    <div class="body">
                        <div class="invoice-top clearfix">
                            <div class="logo">
                                <img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/logo-blak.svg" alt="user" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Lucid Infoweb LLC.</h6>
                                <p>8117 Roosevelt St.<br>New Rochelle, NY 10801</p>
                            </div>
                            <div class="title">
                                <h4>Invoice #1069</h4>
                                <p>Salary Month: Jun, 2018</p>
                            </div>
                        </div>
                        <hr>
                        <div class="invoice-mid clearfix">      
                            <div class="clientlogo">
                                <img src="../assets/images/sm/avatar2.jpg" alt="user" class="rounded-circle img-fluid">
                            </div>
                            <div class="info">
                                <h6>Francisco Vasquez</h6>
                                <p>Web Designer<br>Employee ID: LA-0258</p>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-success">
                                            <tr>
                                                <th>#</th>
                                                <th>Earnings</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Basic Salary</td>
                                                <td>$1,500</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>House Rent Allowance (H.R.A.)</td>
                                                <td>$50</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Bonus</td>
                                                <td>$150</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Conveyance</td>
                                                <td>$80</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Other Allowance</td>
                                                <td>$80</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><strong>Total Earnings</strong></td>
                                                <td><strong>$1,860</strong></td>
                                            </tr>
                                        </tbody>                                            
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-danger">
                                            <tr>
                                                <th>#</th>
                                                <th>Deductions</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tax Deducted at Source (T.D.S.)</td>
                                                <td>$10</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ESI</td>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Provident Fund</td>
                                                <td>$150</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>C/Bank Loan</td>
                                                <td>$120</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Other Deductions</td>
                                                <td>$8</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><strong>Total Deductions</strong></td>
                                                <td><strong>$288</strong></td>
                                            </tr>
                                        </tbody>                                            
                                    </table>
                                </div>
                            </div>
                        </div>                            
                        <hr>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <h5>Note</h5>
                                <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p class="m-b-0"><b>Total Earnings:</b> $1,860</p>
                                <p class="m-b-0"><b>Total Deductions:</b> $288</p>
                                <h5 class="m-b-0 m-t-10">Net Salary $1572.00</h5>
                            </div>                                    
                            <div class="hidden-print col-md-12 text-right">
                                <hr>
                                <button class="btn btn-outline-secondary"><i class="icon-printer"></i></button>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection