@extends('backendtemplate')

@section('title', 'HR-Social')

@section('content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left btn-theme-link"></i></a> HR Social</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home btn-theme-link"></i></a></li>
                            <li class="breadcrumb-item active">HR Social</li>
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

            <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card facebook-widget">
                        <div class="icon"><i class="fa fa-facebook"></i></div>
                        <div class="content">
                            <div class="text">Like</div>
                            <div class="number">123</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card instagram-widget">
                        <div class="icon"><i class="fa fa-instagram"></i></div>
                        <div class="content">
                            <div class="text">Followers</div>
                            <div class="number">231</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card twitter-widget">
                        <div class="icon"><i class="fa fa-twitter"></i></div>
                        <div class="content">
                            <div class="text">Followers</div>
                            <div class="number">31</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card google-widget">
                        <div class="icon"><i class="fa fa-google"></i></div>
                        <div class="content">
                            <div class="text">Like</div>
                            <div class="number">254</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card linkedin-widget">
                        <div class="icon"><i class="fa fa-linkedin"></i></div>
                        <div class="content">
                            <div class="text">Followers</div>
                            <div class="number">2510</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card behance-widget">
                        <div class="icon"><i class="fa fa-behance"></i></div>
                        <div class="content">
                            <div class="text">Project</div>
                            <div class="number">121</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Social Statistics</h2>
                            <ul class="header-dropdown">
                                <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Weekly">W</a></li>
                                <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Monthly">M</a></li>
                                <li><a class="tab_btn active" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Yearly">Y</a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="Salary_Statistics" class="chartist"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Social Media</h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive social_media_table">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Media</th>
                                            <th>Name</th>
                                            <th>Like</th>                                                                                
                                            <th>Comments</th>
                                            <th>Share</th>
                                            <th>Members</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="social_icon linkedin"><i class="fa fa-linkedin"></i></span>
                                            </td>
                                            <td><span class="list-name">Linked In</span>
                                                <span class="text-muted">Florida, United States</span>
                                            </td>
                                            <td>19K</td>
                                            <td>14K</td>
                                            <td>10K</td>
                                            <td>
                                                <span class="badge badge-success">2341</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon twitter-table"><i class="fa fa-twitter"></i></span>
                                            </td>
                                            <td><span class="list-name">Twitter</span>
                                                <span class="text-muted">Arkansas, United States</span>
                                            </td>
                                            <td>7K</td>
                                            <td>11K</td>
                                            <td>21K</td>
                                            <td>
                                                <span class="badge badge-success">952</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon facebook"><i class="fa fa-facebook"></i></span>
                                            </td>
                                            <td><span class="list-name">Facebook</span>
                                                <span class="text-muted">Illunois, United States</span>
                                            </td>
                                            <td>15K</td>
                                            <td>18K</td>
                                            <td>8K</td>
                                            <td>
                                                <span class="badge badge-success">6127</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon google"><i class="fa fa-google-plus"></i></span>
                                            </td>
                                            <td><span class="list-name">Google Plus</span>
                                                <span class="text-muted">Arizona, United States</span>
                                            </td>
                                            <td>15K</td>
                                            <td>18K</td>
                                            <td>154</td>
                                            <td>
                                                <span class="badge badge-success">325</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="social_icon youtube"><i class="fa fa-youtube-play"></i></span>
                                            </td>
                                            <td><span class="list-name">YouTube</span>
                                                <span class="text-muted">Alaska, United States</span>
                                            </td>
                                            <td>15K</td>
                                            <td>18K</td>
                                            <td>200</td>
                                            <td>
                                                <span class="badge badge-success">160</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <div class="carousel slide twitter w_feed" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <i class="fa fa-twitter fa-2x"></i>
                                    <p>23th Feb</p>
                                    <h4>Now Get <span>Up to 70% Off</span><br>on buy</h4>
                                    <div class="m-t-20"><i>- post form ThemeMakker</i></div>
                                </div>
                                <div class="carousel-item">
                                    <i class="fa fa-twitter fa-2x"></i>
                                    <p>25th Jan</p>
                                    <h4>Now Get <span>50% Off</span><br>on buy</h4>
                                    <div class="m-t-20"><i>- post form WrapTheme</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="carousel slide facebook w_feed" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <i class="fa fa-facebook fa-2x"></i>
                                    <p>20th Jan</p>
                                    <h4>Now Get <span>50% Off</span><br>on buy</h4>
                                    <div class="m-t-20"><i>- post form Theme</i></div>
                                </div>
                                <div class="carousel-item">
                                    <i class="fa fa-facebook fa-2x"></i>
                                    <p>23th Feb</p>
                                    <h4>Now Get <span>Up to 70% Off</span><br>on buy</h4>
                                    <div class="m-t-20"><i>- post form Theme</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Facebook Recent Post</h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                            </div>
                            <div class="align-right">
                                <button class="btn btn-warning"><i class="icon-paper-clip text-light"></i></button>
                                <button class="btn btn-warning"><i class="icon-camera text-light"></i></button>
                                <button class="btn btn-primary">Post</button>
                            </div>
                        </div>
                        <div class="body">
                            <ul class="right_chat list-unstyled mb-0">
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Isabella <small class="float-right">15 Min ago</small></span>
                                                <span class="message">Contrary to popular belief, Lorem Ipsum is not simply random text</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="../assets/images/xs/avatar1.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Folisise Chosielie <small class="float-right">1 hours ago</small></span>
                                                <span class="message">There are many variations of passages of Lorem Ipsum available, but the majority</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media mb-0">
                                            <img class="media-object " src="../assets/images/xs/avatar3.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Alexander <small class="float-right">1 day ago</small></span>
                                                <span class="message">It is a long established fact that a reader will be distracted</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>                        
                            </ul>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Twitter Feed</h2>
                        </div>
                        <div class="body">
                            <form>
                                <div class="form-group">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Enter here for tweet..."></textarea>
                                </div>
                                <button class="btn btn-primary">Tweet</button>
                                <a href="javascript:void(0);" class="float-right">13K users active</a>
                            </form>
                            <hr>
                            <ul class="right_chat list-unstyled mb-0">
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">@Isabella <small class="float-right">1 hours ago</small></span>
                                                <span class="message">Contrary to popular belief, Lorem Ipsum is not simply random text</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="../assets/images/xs/avatar1.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">@Folisise Chosielie <small class="float-right">45 hours ago</small></span>
                                                <span class="message">There are many variations of passages of Lorem Ipsum available, but the majority</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media mb-0">
                                            <img class="media-object " src="../assets/images/xs/avatar3.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">@Alexander <small class="float-right">1 day ago</small></span>
                                                <span class="message">It is a long established fact that a reader will be distracted</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>                        
                            </ul>                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection