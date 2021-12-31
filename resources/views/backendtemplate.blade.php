@php 

session_start();
@endphp

<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:38:41 GMT -->
<head>
  <title>:: HR Payroll :: @yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- VENDOR CSS -->

  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/chartist/css/chartist.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/toastr/toastr.min.css')}}">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{ asset('backendtemplate/main/assets/css/main.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/main/assets/css/color_skins.css')}}">

  <!-- All Employee -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/sweetalert/dist/sweetalert.css')}}"/>
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/dropify/css/dropify.min.css')}}">

  <!-- End All Employee -->

  <!-- Event -->
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/fullcalendar/fullcalendar.min.css')}}">
  <!-- End Event -->

  <!-- Leave -->
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
  <!-- End Leave -->

  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/select2/select2.css')}}">

  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/multi-select/css/multi-select.css')}}">
  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

  <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">

  



  @yield('link')

  <style type="text/css">
    .dropdown-menu  > a:focus{
      background-color: #ffffff !important;
      color: black !important;
    }

    .dropdown-menu > form > a:focus{
      background-color: #ffffff !important;
      color: black !important;
    }
    .nav-tabs-theme>li>a {
      /*border-bottom: 2px solid #01b2c6 !important;*/
      background-color: transparent;
      color: grey;
    }
    /*.l-coral {
      background: linear-gradient(45deg, #c7e810, #f58787) !important;
      }*/
      .btn-theme{
        color: white;
      }

      .btn-theme:hover{
        color: white;
      }

      .btn-theme:focus{
        color: white;
      }

      .more_menu:after {
        content: '\2807';
        font-size: 20px;
      }

      .emp_info td, .emp_info th {
        font-size: 14px;
        padding: .75rem;
        vertical-align: top;
        border-top: 0px solid #dee2e6;
      }

      .emp_info td:first-child{
        font-weight: bold;
      }

      @-webkit-keyframes fadeInLeft {
        from {
          opacity:0;
          -webkit-transform: translatex(-10px);
          -moz-transform: translatex(-10px);
          -o-transform: translatex(-10px);
          transform: translatex(-10px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      @-moz-keyframes fadeInLeft {
        from {
          opacity:0;
          -webkit-transform: translatex(-10px);
          -moz-transform: translatex(-10px);
          -o-transform: translatex(-10px);
          transform: translatex(-10px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      @keyframes fadeInLeft {
        from {
          opacity:0;
          -webkit-transform: translatex(-100px);
          -moz-transform: translatex(-100px);
          -o-transform: translatex(-100px);
          transform: translatex(-100px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      .in-left {
        -webkit-animation-name: fadeInLeft;
        -moz-animation-name: fadeInLeft;
        -o-animation-name: fadeInLeft;
        animation-name: fadeInLeft;
        -webkit-animation-fill-mode: both;
        -moz-animation-fill-mode: both;
        -o-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-duration: 0.2s;
        -moz-animation-duration: 0.2s;
        -o-animation-duration: 0.2s;
        animation-duration: 0.2s;
        -webkit-animation-delay: 0.2s;
        -moz-animation-delay: 0.2s;
        -o-animation-duration:0.2s;
        animation-delay: 0.2s;
      }

      /*======================FadeInUp===========================*/
      @keyframes fadeInUp {
        from {
          transform: translate3d(0,40px,0)
        }

        to {
          transform: translate3d(0,0,0);
          opacity: 1
        }
      }

      @-webkit-keyframes fadeInUp {
        from {
          transform: translate3d(0,40px,0)
        }

        to {
          transform: translate3d(0,0,0);
          opacity: 1
        }
      }

      .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
        -webkit-animation-duration: 1s;
        -webkit-animation-fill-mode: both
      }

      .animatedFadeInUp {
        opacity: 0
      }

      .fadeInUp {
        opacity: 0;
        animation-name: fadeInUp;
        -webkit-animation-name: fadeInUp;
      }


      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .jumbotron {
        background-image: url("assets/img/banner-1200.png");
        background-size: cover;
        background-repeat: no-repeat;
      }

      .shadow {
       /*-moz-box-shadow:    inset 0 0 10px #000000;
       -webkit-box-shadow: inset 0 0 10px #000000;
       box-shadow:         inset 0 0 10px #000000;*/
       -webkit-box-shadow: -11px 9px 9px -6px rgba(0,0,0,0.75);
       -moz-box-shadow: -11px 9px 9px -6px rgba(0,0,0,0.75);
       box-shadow: -11px 9px 9px -6px rgba(0,0,0,0.75);
     }
   </style>


 </head>
 <body class="@if(\Session::has('class')) theme-{{\Session::get('class')}} ">@else theme-orange">
  @endif


  <!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('backendtemplate/main/assets/images/logo-icon.svg')}}" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>        
    </div>
  </div> -->
  <!-- Overlay For Sidebars -->

  <div id="wrapper">

    <nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
          <a href="{{ url('/') }}"><img src="{{ asset('backendtemplate/assets/images/logo.svg')}}" alt="Lucid Logo" class="img-responsive logo"></a>                
        </div>

        <div class="navbar-right">
          <form id="navbar-search" class="navbar-form search-form">
            <input value="" class="form-control" placeholder="Search here..." type="text">
            <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
          </form>               

          <div id="navbar-menu">
            <ul class="nav navbar-nav">                        
              <li><a href="{{ url('events') }}" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i class="icon-calendar"></i></a></li>
              
              <li><a href="{{ route('logout') }}" class="icon-menu"><i class="icon-login" onclick="event.preventDefault();
              document.getElementById('logout-form-home').submit();"></i></a></li>
              <form id="logout-form-home" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
      <div class="sidebar-scroll">
        <div class="user-account">
          @foreach (Auth::user()->roles()->get() as $role)
          @if ($role->name == 'admin')
          <img src="{{url('/backendtemplate/employeeimg/avatar6.jpg')}}" class="rounded-circle user-photo" alt="User Profile Picture" id="hr_photo">
          @else
          <img src="" class="rounded-circle user-photo" alt="User Profile Picture" id="hr_photo">
          @endif
          @endforeach
          
          <div class="dropdown">
            <span>Welcome,</span>
            <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>                    
            <ul class="dropdown-menu dropdown-menu-right account user-menu menu-icon animated flipInY">
              <!-- @foreach (Auth::user()->roles()->get() as $role)
              @if ($role->name == 'admin')
              <li><a href="{{route('employees.show',Auth::user())}}"><i class="icon-user btn-theme-link"></i>My Profile</a></li>
              @else
              <li><a href="{{route('employees.show',Auth::user())}}"><i class="icon-user btn-theme-link"></i>My Profile</a></li>
              @endif
              @endforeach -->
              
              <li><a href="app-inbox.html"><i class="icon-envelope-open btn-theme-link"></i>Messages</a></li>
              <li><a href="javascript:void(0);"><i class="icon-settings btn-theme-link"></i>Settings</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="icon-power btn-theme-link"></i>Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form></li>
            </ul>
          </div>
          <hr>
          <div class="row">
            <div class="col-4">
              <h6 id="dept">...</h6>
              <small>Departments</small>                        
            </div>
            <div class="col-4">
              <h6 id="emp">...</h6>
              <small>Employees</small>                        
            </div>
            <div class="col-4">                        
              <h6 id="tot_sal">...</h6>
              <small>Salary</small>
            </div>
          </div>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#hr_menu">HR</a></li>
          <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#project_menu">Project</a></li> -->
          <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li> -->                
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
          <div class="tab-pane animated fadeIn active" id="hr_menu">
            <nav class="sidebar-nav">
              <ul class="main-menu metismenu">
                <li><a href="{{ url('/') }}"><i class="icon-speedometer"></i><span>HR Dashboard</span></a></li>
                <!-- <li><a href="{{ url('holidays') }}"><i class="icon-list"></i>Holidays</a></li>
                <li><a href="{{ url('events') }}"><i class="icon-calendar"></i>Events</a></li>
                <li><a href="{{ url('hr-social') }}"><i class="icon-globe"></i>HR Social</a></li>
                <li><a href="{{ url('worldwide-centres') }}"><i class="icon-pointer"></i>WorldWide Centres</a></li> -->
                <li>
                  <a href="#Employees" class="has-arrow"><i class="icon-users"></i><span>Employees</span></a>
                  <ul>
                    <li><a href="{{ url('employees') }}">All Employees</a></li>
                    <li><a href="{{ url('leaves') }}">Leaves</a></li>
                    <!-- <li><a href="{{ url('attendances') }}">Attendance</a></li> -->
                    <li><a href="{{ url('departments') }}">Departments</a></li>
                    <li><a href="{{ url('designations') }}">Designations</a></li>
                    <li><a href="{{ url('overtimes') }}">Overtime</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Payroll" class="has-arrow"><i class="icon-credit-card"></i><span>Payroll</span></a>
                  <ul>
                    <!-- <li><a href="{{ url('payslips') }}">Payslip</a></li> -->
                    @if (Auth::user()->roles()->pluck('name')[0] !== "staff")
                    <li><a href="{{ url('salaries') }}">Employee Salary</a></li>
                    @endif
                    <li><a href="{{ url('payrolls') }}">Payment</a></li>                          
                  </ul>
                </li>
                @foreach (Auth::user()->roles()->get() as $role)
                @if ($role->name == 'admin')
                <li><a href="{{ url('users') }}"><i class="icon-user"></i>Users</a></li>
                @endif
                @endforeach
                
                <!-- <li>
                  <a href="#Report" class="has-arrow"><i class="icon-bar-chart"></i><span>Report</span></a>
                  <ul>
                    <li><a href="report-expense.html">Expense Report</a></li>
                    <li><a href="report-invoice.html">Invoice Report</a></li>                                    
                  </ul>
                </li>
                <li>
                  <a href="#Accounts" class="has-arrow"><i class="icon-briefcase"></i><span>Accounts</span></a>
                  <ul>
                    <li><a href="acc-payments.html">Payments</a></li>
                    <li><a href="acc-expenses.html">Expenses</a></li>
                    <li><a href="acc-invoices.html">Invoices</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>Authentication</span></a>
                  <ul>
                    <li><a href="page-login.html">Login</a></li>
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-lockscreen.html">Lockscreen</a></li>
                    <li><a href="page-forgot-password.html">Forgot Password</a></li>
                    <li><a href="page-404.html">Page 404</a></li>
                    <li><a href="page-403.html">Page 403</a></li>
                    <li><a href="page-500.html">Page 500</a></li>
                    <li><a href="page-503.html">Page 503</a></li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
          <!-- <div class="tab-pane animated fadeIn" id="project_menu">
            <nav class="sidebar-nav">
              <ul class="main-menu metismenu">
                <li><a href="index2.html"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                <li><a href="app-inbox.html"><i class="icon-envelope"></i>Inbox App</a></li>
                <li><a href="app-chat.html"><i class="icon-bubbles"></i>Chat App</a></li>
                <li>
                  <a href="#Projects" class="has-arrow"><i class="icon-list"></i><span>Projects</span></a>
                  <ul>
                    <li><a href="project-add.html">Add Projects</a></li>
                    <li><a href="project-list.html">Projects List</a></li>
                    <li><a href="project-grid.html">Projects Grid</a></li>
                    <li><a href="project-detail.html">Projects Detail</a></li>                                    
                  </ul>
                </li>
                <li>
                  <a href="#Clients" class="has-arrow"><i class="icon-user"></i><span>Clients</span></a>
                  <ul>
                    <li><a href="client-add.html">Add Clients</a></li>
                    <li><a href="client-list.html">Clients List</a></li>
                    <li><a href="client-detail.html">Clients Detail</a></li>
                  </ul>
                </li>
                <li><a href="project-team.html"><i class="icon-users"></i>Team</a></li>
                <li><a href="app-taskboard.html"><i class="icon-tag"></i>Taskboard</a></li>
                <li><a href="app-tickets.html"><i class="icon-screen-tablet"></i>Tickets</a></li>
              </ul>                        
            </nav>                    
          </div> -->
          <div class="tab-pane animated fadeIn" id="sub_menu">
            <nav class="sidebar-nav">
              <ul class="main-menu metismenu">
                <li>
                  <a href="#Blog" class="has-arrow"><i class="icon-globe"></i> <span>Blog</span></a>
                  <ul>                                    
                    <li><a href="blog-dashboard.html">Dashboard</a></li>
                    <li><a href="blog-post.html">New Post</a></li>
                    <li><a href="blog-list.html">Blog List</a></li>
                    <li><a href="blog-details.html">Blog Detail</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#FileManager" class="has-arrow"><i class="icon-folder"></i> <span>File Manager</span></a>
                  <ul>                                    
                    <li><a href="file-dashboard.html">Dashboard</a></li>
                    <li><a href="file-documents.html">Documents</a></li>
                    <li><a href="file-media.html">Media</a></li>
                    <li><a href="file-images.html">Images</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Widgets" class="has-arrow"><i class="icon-puzzle"></i><span>Widgets</span></a>
                  <ul>
                    <li><a href="widgets-statistics.html">Statistics Widgets</a></li>
                    <li><a href="widgets-data.html">Data Widgets</a></li>
                    <li><a href="widgets-chart.html">Chart Widgets</a></li>
                    <li><a href="widgets-weather.html">Weather Widgets</a></li>
                    <li><a href="widgets-social.html">Social Widgets</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Extra Pages</span></a>
                  <ul>
                    <li><a href="page-blank.html">Blank Page</a> </li>
                    <li><a href="page-profile2.html">Profile</a></li>
                    <li><a href="page-gallery.html">Image Gallery <span class="badge badge-default float-right">v1</span></a> </li>
                    <li><a href="page-gallery2.html">Image Gallery <span class="badge badge-warning float-right">v2</span></a> </li>
                    <li><a href="page-timeline.html">Timeline</a></li>
                    <li><a href="page-timeline-h.html">Horizontal Timeline</a></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                    <li><a href="page-invoices.html">Invoices</a></li>
                    <li><a href="page-invoices2.html">Invoices <span class="badge badge-warning float-right">v2</span></a></li>
                    <li><a href="page-search-results.html">Search Results</a></li>
                    <li><a href="page-helper-class.html">Helper Classes</a></li>
                    <li><a href="page-maintenance.html">Maintenance</a></li>
                    <li><a href="page-testimonials.html">Testimonials</a></li>
                    <li><a href="page-faq.html">FAQs</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i> <span>UI Elements</span></a>
                  <ul>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-tabs.html">Tabs</a></li>
                    <li><a href="ui-buttons.html">Buttons</a></li>
                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                    <li><a href="ui-icons.html">Icons</a></li>
                    <li><a href="ui-notifications.html">Notifications</a></li>
                    <li><a href="ui-colors.html">Colors</a></li>
                    <li><a href="ui-dialogs.html">Dialogs</a></li>                                    
                    <li><a href="ui-list-group.html">List Group</a></li>
                    <li><a href="ui-media-object.html">Media Object</a></li>
                    <li><a href="ui-modals.html">Modals</a></li>
                    <li><a href="ui-nestable.html">Nestable</a></li>
                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                    <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                    <li><a href="ui-treeview.html">Treeview</a></li>
                  </ul>
                </li>                            
                <li>
                  <a href="#forms" class="has-arrow"><i class="icon-pencil"></i> <span>Forms</span></a>
                  <ul>
                    <li><a href="forms-validation.html">Form Validation</a></li>
                    <li><a href="forms-advanced.html">Advanced Elements</a></li>
                    <li><a href="forms-basic.html">Basic Elements</a></li>
                    <li><a href="forms-wizard.html">Form Wizard</a></li>                                    
                    <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>                                    
                    <li><a href="forms-cropping.html">Image Cropping</a></li>
                    <li><a href="forms-summernote.html">Summernote</a></li>
                    <li><a href="forms-editors.html">CKEditor</a></li>
                    <li><a href="forms-markdown.html">Markdown</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Tables" class="has-arrow"><i class="icon-tag"></i> <span>Tables</span></a>
                  <ul>
                    <li><a href="table-basic.html">Tables Example<span class="badge badge-info float-right">New</span></a> </li>
                    <li><a href="table-normal.html">Normal Tables</a> </li>
                    <li><a href="table-jquery-datatable.html">Jquery Datatables</a> </li>
                    <li><a href="table-editable.html">Editable Tables</a> </li>
                    <li><a href="table-color.html">Tables Color</a> </li>
                    <li><a href="table-filter.html">Table Filter <span class="badge badge-info float-right">New</span></a> </li>
                    <li><a href="table-dragger.html">Table dragger <span class="badge badge-info float-right">New</span></a> </li>
                  </ul>
                </li>
                <li>
                  <a href="#charts" class="has-arrow"><i class="icon-bar-chart"></i> <span>Charts</span></a>
                  <ul>
                    <li><a href="chart-morris.html">Morris</a> </li>
                    <li><a href="chart-flot.html">Flot</a> </li>
                    <li><a href="chart-chartjs.html">ChartJS</a> </li>                                    
                    <li><a href="chart-jquery-knob.html">Jquery Knob</a> </li>                                        
                    <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                    <li><a href="chart-peity.html">Peity</a></li>
                    <li><a href="chart-c3.html">C3 Charts</a></li>
                    <li><a href="chart-gauges.html">Gauges</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Maps" class="has-arrow"><i class="icon-map"></i> <span>Maps</span></a>
                  <ul>
                    <li><a href="map-google.html">Google Map</a></li>
                    <li><a href="map-yandex.html">Yandex Map</a></li>
                    <li><a href="map-jvectormap.html">jVector Map</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          <div class="tab-pane animated fadeIn" id="setting">
            <div class="p-l-15 p-r-15"  id="skin">
              <h6>Choose Skin</h6>
              <ul class="choose-skin list-unstyled">
                <li data-theme="purple">
                  <div class="purple"></div>
                  <span class="purple">Purple</span>
                </li>                   
                <li data-theme="blue">
                  <div class="blue"></div>
                  <span class="blue">Blue</span>
                </li>
                <li data-theme="cyan">
                  <div class="cyan"></div>
                  <span class="cyan">Cyan</span>
                </li>
                <li data-theme="green">
                  <div class="green"></div>
                  <span class="green">Green</span>
                </li>
                <li data-theme="orange">
                  <div class="orange"></div>
                  <span class="orange">Orange</span>
                </li>
                <li data-theme="blush">
                  <div class="blush"></div>
                  <span class="blush">Blush</span>
                </li>
              </ul>
              <hr>
              <h6>General Settings</h6>
              <ul class="setting-list list-unstyled">
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox">
                    <span>Report Panel Usag</span>
                  </label>
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox">
                    <span>Email Redirect</span>
                  </label>
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" checked>
                    <span>Notifications</span>
                  </label>                      
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" checked>
                    <span>Auto Updates</span>
                  </label>
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox">
                    <span>Offline</span>
                  </label>
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" checked>
                    <span>Location Permission</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>             
        </div>          
      </div>
    </div>

    @yield('content') 

    @if (session('status'))
    <input type="hidden" name="status" class="status" value="{{session('status')}}">
    @endif


    <!-------------------- Modals   ----------------------->

    <!-- Department -->
    
    <!-- End Department -->


    <!-- Employee -->
    
    <!-- End Employee -->

    <!-- Event -->
    <div class="modal animated fade" id="addevent" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="title" id="defaultModalLabel">Add Event</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="form-line">
                <input type="number" class="form-control" placeholder="Event Date">
              </div>
            </div>
            <div class="form-group">
              <div class="form-line">
                <input type="text" class="form-control" placeholder="Event Title">
              </div>
            </div>
            <div class="form-group">
              <div class="form-line">
                <textarea class="form-control no-resize" rows="4" placeholder="Event Description..."></textarea>
              </div>
            </div>       
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Event -->

    <!-- Leave -->

    <!-- <div class="modal fade" id="Leave_Request" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Leave Request</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <select class="form-control mb-3 show-tick">
                                <option>Select Leave Type</option>
                                <option>Casual Leave (12)</option>
                                <option>Medical Leave</option>
                                <option>Maternity Leave</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="From *">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="To *">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea rows="6" class="form-control no-resize" placeholder="Leave Reason *"></textarea>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
      </div> -->

      <!-- End Leave -->

      <!-- Ajax -->
      <div class="modal fade" id="ajaxDeptModel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
              <form id="productForm" name="productForm" class="form-horizontal">
               <input type="hidden" name="product_id" id="product_id">
               <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Details</label>
                <div class="col-sm-12">
                  <textarea id="detail" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
               </button>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>



   <!------------------- End Modals  ---------------------->

 </div>

 <!-- Javascript -->
 <script src="{{ asset('backendtemplate/main/assets/bundles/libscripts.bundle.js')}}"></script>
 <script src="{{ asset('backendtemplate/main/assets/bundles/vendorscripts.bundle.js')}}"></script>

 <script src="{{ asset('backendtemplate/assets/vendor/toastr/toastr.js')}}"></script>
 <script src="{{ asset('backendtemplate/main/assets/bundles/chartist.bundle.js')}}"></script>
 <script src="{{ asset('backendtemplate/main/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->

 <script src="{{ asset('backendtemplate/main/assets/bundles/mainscripts.bundle.js')}}"></script>
 <script src="{{ asset('backendtemplate/main/assets/js/index.js')}}"></script>
</body>

<!-- All Employee -->
<script src="{{ asset('backendtemplate/main/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{ asset('backendtemplate/main/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{ asset('backendtemplate/main/assets/js/pages/ui/dialogs.js')}}"></script>

<script src="{{ asset('backendtemplate/assets/vendor/dropify/js/dropify.min.js')}}"></script>
<script src="{{ asset('backendtemplate/main/assets/js/pages/forms/dropify.js')}}"></script>
<!-- End All Employee -->

<!-- Event -->
<script src="{{ asset('backendtemplate/main/assets/bundles/fullcalendarscripts.bundle.js')}}"></script><!--/ calender javascripts --> 
<script src="{{ asset('backendtemplate/assets/vendor/fullcalendar/fullcalendar.js')}}"></script><!--/ calender javascripts -->
<script src="{{ asset('backendtemplate/main/assets/js/pages/calendar.js')}}"></script>
<!-- End Event -->

<!-- Leave -->

<script src="{{ asset('backendtemplate/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script><!-- bootstrap datepicker Plugin Js --> 


<!-- End Leave -->

<script src="{{ asset('backendtemplate/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/select2/select2.min.js')}}"></script> <!-- Select2 Js -->




<script src="{{ asset('backendtemplate/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js --> 
<script src="{{ asset('backendtemplate/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{ asset('backendtemplate/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<script src="{{ asset('backendtemplate/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

<script src="{{ asset('backendtemplate/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js --> 

<script src="{{ asset('backendtemplate/main/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

<script src="{{ asset('backendtemplate/main/assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{ asset('backendtemplate/main/assets/js/pages/maps/jvectormap.js')}}"></script>

<script type="text/javascript" src="{{ asset('backendtemplate/assets/vendor/printThis/printThis.js')}}"></script>


<script type="text/javascript">

  $( document ).ready(function() {
    var auth_emp_id;
    // Auth::user()->roles()->get()
    var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
    if(AuthUser !== null){
      auth_emp_id = {{ Auth::user()->id }};
      console.log(auth_emp_id);
    }
    getEmployeePhoto(auth_emp_id);
    getInfo();

    

  });

  function shortenLargeNumber(num, digits) {
    var units = ['k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y'],
    decimal;

    for(var i=units.length-1; i>=0; i--) {
      decimal = Math.pow(1000, i+1);

      if(num <= -decimal || num >= decimal) {
        return +(num / decimal).toFixed(digits) + units[i];
      }
    }

    return num;
  }

  function getInfo() {
    // console.log("employee ",id)
    $.ajax({
     type:'GET',
     url:'/getinfo',
     data:'_token = <?php echo csrf_token() ?>',
     success:function(response) {
      console.log(response);
      if(response["emp_count"] != null){
        var emp_count = response["emp_count"];
        var dep_count = response["dep_count"];
        var tot_sal = response["tot_sal"];
        $("#dept").text(dep_count);
        $("#emp").text(emp_count);
        $("#tot_sal").text(shortenLargeNumber(tot_sal,1)+"+");
      }else{
        $("#dept").text("0");
        $("#emp").text("0");
        $("#tot_sal").text("0");
      }
    }
  });
  }

  function getEmployeePhoto(id) {
    console.log("employee ",id)
    $.ajax({
     type:'GET',
     url:'/getemployeephoto' + '/' + id,
     data:'_token = <?php echo csrf_token() ?>',
     success:function(response) {
      console.log(response);
      if(response["employee_photo"] != null){
        console.log(response["employee_photo"]);
        var photo = response["employee_photo"];
        $("#hr_photo").attr("src","http://localhost:8000/"+photo);
      }else{
        $("#hr_photo").attr("src", "");
      }
    }
  });
  }



  $('.choose-skin').on("click", function(event){
    let selected_class = event.target.className;
    if(event.target.className === "purple" || event.target.className === "cyan" || event.target.className === "blue" || event.target.className === "green" || event.target.className === "orange" || event.target.className === "blush")

      $( "body" ).removeClass( ).addClass( "theme-"+event.target.className );
    window.localStorage.setItem( 'class', event.target.className );
    $.ajax({
      type:'GET',
      url:'/setsession' + '/' + event.target.className,
      data:'_token = <?php echo csrf_token() ?>',
      success:function(response) { 
          // console.log(response.session_data);
          window.sessionStorage.setItem( 'class', response.session_data );
        }
      });   

  })



  
  $('.send-pdf').on("click", function () {
      // alert("Hi");
      var payroll_id = $(this).attr('data-id');
      send(payroll_id);
    });
  

  

  $('.print').on("click", function () {
    var payroll_id = $(this).attr('data-id');
    var user = "{!! auth()->user()->roles()->pluck('name')[0] !!}";
    if(user !== "staff"){
      paid(payroll_id);
    }
    $('.to_print').printThis({
      debug: true,
      importCSS: true,
      importStyle: false,     
      printContainer: true,
      loadCSS: "",                
      pageTitle: "",
      removeInline: false,
    });
  });



  // $( document ).ready(function() {
  //   $( "body" ).removeClass();
  //   if(window.localStorage.getItem( 'class') !== null){

  //     var theme = window.localStorage.getItem( 'class');
  //           $("body").removeClass();
  //           // $("body").addClass("theme-".window.localStorage.getItem( 'class'));
  //           $( "body" ).removeClass().addClass( "theme-"+theme );
  //           // $("body").removeClass();
  //           // $("body").addClass("theme-"+window.localStorage.getItem( 'class'));
  //         }else{
  //           $("body").addClass("theme-orange");
  //         }
  //       });
</script>

@yield('script')


<!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:39:38 GMT -->
</html>