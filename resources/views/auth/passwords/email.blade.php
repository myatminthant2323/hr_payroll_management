<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:41:45 GMT -->
<head>
    <title>:: Lucid HR :: Forgot Password</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4x Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backendtemplate/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backendtemplate/main/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('backendtemplate/main/assets/css/color_skins.css')}}">
    <style type="text/css">
        .btn-theme{
          color: white;
      }

      .btn-theme:hover{
          color: white;
      }

      .btn-theme:focus{
          color: white;
      }
  </style>
</head>

<body class="theme-orange">
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/logo-white.svg" alt="Lucid">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Recover my password</p>
                        </div>
                        <div class="body">
                            <p>Please enter your email address below to receive instructions for resetting password.</p>
                            <form class="form-auth-small" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="form-group">                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn btn-theme btn-lg btn-block">RESET PASSWORD</button>
                                <div class="bottom">
                                    <span class="helper-text">Know your password? <a href="{{route('login')}}">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

<!-- <script src="http://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        $("body").removeClass();
        if(window.localStorage.getItem( 'class') !== null){
            // $("body").removeClass();
            // $("body").addClass("theme-".window.localStorage.getItem( 'class'));
            $("body").removeClass();
            $("body").addClass("theme-"+window.localStorage.getItem( 'class'));
        }else{
            $("body").addClass("theme-orange");
        }
    });
</script> -->

<!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:41:45 GMT -->
</html>

