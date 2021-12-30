<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:40:22 GMT -->
<head>
    <title>:: Lucid HR :: Login</title>
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
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox" value="{{ old('remember') ? 'checked' : '' }}" name="remember" id="remember">
                                        <span>Remember me</span>
                                    </label>                                
                                </div>
                                <button type="submit" class="btn btn-theme btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    @if (Route::has('password.request'))
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                                    @endif
                                    <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>

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

<!-- Mirrored from www.wrraptheme.com/templates/lucid/hr/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 16:40:22 GMT -->
</html>

