<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="Login_v14/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Login_v14/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Login_v14/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v14/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login_v14/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    

<div class="limiter">

        <div class="container-login100" style="background-image: url(Login_v14/images/bg-04.jpg); ">

            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{ url('/login/checklogin')}}">
                @csrf


                    <span class="login100-form-title p-b-32">
                        Admin Login
                    </span>

                    <span class="txt1 p-b-11">
                        Username
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                        <input id="username" name="username" type="text" class="input100" required>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <span class="txt1 p-b-11">
                        Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input id="password" name="password" type="password" class="input100" required>
                        <span class="focus-input100"></span>
                    </div>
                    
                    

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn"  type="submit" title="Click Here to Sign In">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    
<!--===============================================================================================-->
    <script src="Login_v14/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v14/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v14/vendor/bootstrap/js/popper.js"></script>
    <script src="Login_v14/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v14/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v14/vendor/daterangepicker/moment.min.js"></script>
    <script src="Login_v14/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="Login_v14/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="Login_v14/js/main.js"></script>

</body>
</html>

