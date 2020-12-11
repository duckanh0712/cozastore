<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | COZA Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-b-10">
            <form action="" method="post" class="login100-form validate-form">
                @csrf
					<span class="login100-form-title p-b-20">
						COZA Store Register
					</span>
                <div class="wrap-input100 validate-input m-b-20" data-validate = "Enter Name">
                    <input class="input100" type="text" name="name">
                    <span class="focus-input100" data-placeholder="Name"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20" data-validate = "Enter email">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter password">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter password">
                    <input class="input100" type="password" name="confirmPassword">
                    <span class="focus-input100" data-placeholder="Confirm Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Sign up
                    </button>
                </div>
                <ul class="login-more p-t-50">
                    <li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

                        <a href="#" class="txt2">
                            Username / Password?
                        </a>
                    </li>

                    <li>
							<span class="txt1">
								You have an account?
							</span>

                        <a href="{{route('admin.login')}}" class="txt2">
                            Sign in
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/bootstrap/js/popper.js"></script>
<script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/daterangepicker/moment.min.js"></script>
<script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/login/js/main.js"></script>

</body>
</html>
