@extends('backendtemplate')

@section('title', 'DASHBOARD')

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee Salary</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Payroll</li>
                            <li class="breadcrumb-item active">Employee Salary</li>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Phone</th>
                                            <th>Join Date</th>
                                            <th>Role</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="width45">
                                                <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle width35" alt="">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Susie Willis</h6>
                                                <span>sussie-w@gmail.com</span>
                                            </td>
                                            <td><span>LA-0216</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>28 Jun, 2015</td>
                                            <td>Web Developer</td>
                                            <td>$589</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#edit_salary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar3.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span>debra@gmail.com</span>
                                            </td>
                                            <td><span>LA-0218</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>21 July, 2015</td>
                                            <td>Web Developer</td>
                                            <td>$589</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar4.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Francisco Vasquez</h6>
                                                <span>francis-v@gmail.com</span>
                                            </td>
                                            <td><span>LA-0222</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>18 Jan, 2016</td>
                                            <td>Team Leader</td>
                                            <td>$589</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar5.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Jane Hunt</h6>
                                                <span>jane-hunt@gmail.com</span>
                                            </td>
                                            <td><span>LA-0232</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>08 Mar, 2016</td>
                                            <td>Android Developer</td>
                                            <td>$589</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar6.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Darryl Day</h6>
                                                <span>darryl.day@gmail.com</span>
                                            </td>
                                            <td><span>LA-0233</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>13 Nov, 2016</td>
                                            <td>IOS Developer</td>
                                            <td>$700</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar1.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Marshall Nichols</h6>
                                                <span>marshall-n@gmail.com</span>
                                            </td>
                                            <td><span>LA-0215</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>24 Jun, 2015</td>
                                            <td>Web Designer</td>
                                            <td>$700</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar2.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Susie Willis</h6>
                                                <span>sussie-w@gmail.com</span>
                                            </td>
                                            <td><span>LA-0216</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>28 Jun, 2015</td>
                                            <td>Web Developer</td>
                                            <td>$650</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar3.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span>debra@gmail.com</span>
                                            </td>
                                            <td><span>LA-0218</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>21 July, 2015</td>
                                            <td>Web Developer</td>
                                            <td>$700</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar4.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Francisco Vasquez</h6>
                                                <span>francis-v@gmail.com</span>
                                            </td>
                                            <td><span>LA-0222</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>18 Jan, 2016</td>
                                            <td>Team Leader</td>
                                            <td>$750</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar5.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Jane Hunt</h6>
                                                <span>jane-hunt@gmail.com</span>
                                            </td>
                                            <td><span>LA-0232</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>08 Mar, 2016</td>
                                            <td>Android Developer</td>
                                            <td>$700</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar6.jpg" class="rounded-circle width35" alt=""></td>
                                            <td>
                                                <h6 class="mb-0">Darryl Day</h6>
                                                <span>darryl.day@gmail.com</span>
                                            </td>
                                            <td><span>LA-0233</span></td>
                                            <td><span>+ 264-625-2583</span></td>
                                            <td>13 Nov, 2016</td>
                                            <td>IOS Developer</td>
                                            <td>$750</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="send salary slip"><i class="fa fa-envelope-o"></i> Slip</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
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

    <!-- Add Salary Modal -->
    <div id="add_salary" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Staff Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Select Staff</label>
                                    <select class="select"> 
                                        <option>John Doe</option>
                                        <option>Richard Miles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <label>Net Salary</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <h4 class="text-primary">Earnings</h4>
                                <div class="form-group">
                                    <label>Basic</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>DA(40%)</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>HRA(15%)</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Conveyance</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Allowance</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Medical  Allowance</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="add-more">
                                    <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                            <div class="col-sm-6">  
                                <h4 class="text-primary">Deductions</h4>
                                <div class="form-group">
                                    <label>TDS</label>
                                    <input class="form-control" type="text">
                                </div> 
                                <div class="form-group">
                                    <label>ESI</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>PF</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Leave</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Prof. Tax</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Labour Welfare</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="add-more">
                                    <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Salary Modal -->
    
    <!-- Edit Salary Modal -->
    <div id="edit_salary" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Staff Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Select Staff</label>
                                    <select class="select"> 
                                        <option>John Doe</option>
                                        <option>Richard Miles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6"> 
                                <label>Net Salary</label>
                                <input class="form-control" type="text" value="$4000">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-6"> 
                                <h4 class="text-primary">Earnings</h4>
                                <div class="form-group">
                                    <label>Basic</label>
                                    <input class="form-control" type="text" value="$6500">
                                </div>
                                <div class="form-group">
                                    <label>DA(40%)</label>
                                    <input class="form-control" type="text" value="$2000">
                                </div>
                                <div class="form-group">
                                    <label>HRA(15%)</label>
                                    <input class="form-control" type="text" value="$700">
                                </div>
                                <div class="form-group">
                                    <label>Conveyance</label>
                                    <input class="form-control" type="text" value="$70">
                                </div>
                                <div class="form-group">
                                    <label>Allowance</label>
                                    <input class="form-control" type="text" value="$30">
                                </div>
                                <div class="form-group">
                                    <label>Medical  Allowance</label>
                                    <input class="form-control" type="text" value="$20">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text">
                                </div>  
                            </div>
                            <div class="col-sm-6">  
                                <h4 class="text-primary">Deductions</h4>
                                <div class="form-group">
                                    <label>TDS</label>
                                    <input class="form-control" type="text" value="$300">
                                </div> 
                                <div class="form-group">
                                    <label>ESI</label>
                                    <input class="form-control" type="text" value="$20">
                                </div>
                                <div class="form-group">
                                    <label>PF</label>
                                    <input class="form-control" type="text" value="$20">
                                </div>
                                <div class="form-group">
                                    <label>Leave</label>
                                    <input class="form-control" type="text" value="$250">
                                </div>
                                <div class="form-group">
                                    <label>Prof. Tax</label>
                                    <input class="form-control" type="text" value="$110">
                                </div>
                                <div class="form-group">
                                    <label>Labour Welfare</label>
                                    <input class="form-control" type="text" value="$10">
                                </div>
                                <div class="form-group">
                                    <label>Fund</label>
                                    <input class="form-control" type="text" value="$40">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input class="form-control" type="text" value="$15">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Salary Modal -->
    
    <!-- Delete Salary Modal -->
    <div class="modal custom-modal fade" id="delete_salary" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Salary</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Salary Modal -->   

@endsection



