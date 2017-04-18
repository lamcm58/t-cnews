<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{ asset('favicon_ie9.ico') }}">

<title>Đăng nhập</title>

<!-- Bootstrap -->
<link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- NProgress -->
<link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
<!-- Animate.css -->
<link href="{{ asset('admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{ asset('admin/build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
        id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
            @if(session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            @if(session('err'))
                <div class="alert alert-warning" role="alert">{{ session('err') }}</div>
            @endif
                <section class="login_content">
                    <form action="{{ route('login') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h1>Đăng nhập</h1>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"/>
                            @if($errors->first('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            @if($errors->first('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">
                                Chưa có tài khoản? <a href="{{ route('register') }}" class="to_register"> Đăng ký ngay </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>
                                    <i class="fa fa-firefox"></i> t-cnews.cowell
                                </h1>
                                <p>©2017 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">
  $('.alert').delay(3000).slideUp();
</script>
</html>
