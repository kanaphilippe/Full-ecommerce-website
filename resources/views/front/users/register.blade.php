@extends('front.layout.layout')
@section('content')
<div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-banner-content text-center">
                    <h4 class="breadcrumb-title">My account</h4>
                    <div class="breadcrumb-two">
                        <nav>
                            <nav class="breadcrumb-trail breadcrumbs">
                                <ul class="breadcrumb-menu">
                                    <li class="breadcrumb-trail">
                                    <a href="index.html"><span>Home</span></a>
                                    </li>
                                    <li class="trail-item">
                                    <span>My account</span>
                                    </li>
                                </ul>
                            </nav> 
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account-area-start -->
<div class="account-area mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!--<div class="basic-login mb-50">
                    <h5>Login</h5>
                    <form action="#">
                        <label for="name">Username or email address  <span>*</span></label>
                        <input id="name" type="text" placeholder="Enter Username">
                        <label for="pass">Password <span>*</span></label>
                        <input id="pass" type="password" placeholder="Enter password...">
                        <div class="login-action mb-10 fix">
                            <span class="log-rem f-left">
                                <input id="remember" type="checkbox">
                                <label for="remember">Remember me</label>
                            </span>
                            <span class="forgot-login f-right">
                                <a href="#">Lost your password?</a>
                            </span>
                        </div>
                        <a href="login.html" class="tp-in-btn w-100">log in</a>
                    </form>
                </div>-->
            </div>
            <div class="col-lg-6">
                <div class="basic-login">
                    <h5>Register</h5>
                    <p id="register-success"></p>
                    <form id="registerForm" action="javascript:;" method="post">
                        <label for="username">Username  <span>*</span></label>
                        <input id="username" type="text" name="name" placeholder="Enter Username">
                        <p id="register-name"></p>
                        <label for="email-id">Email Address <span>*</span></label>
                        <input id="email-id" name="email" type="email" placeholder="Enter Your Email Address...">
                        <p id="register-email"></p>
                        <label for="mobile-id">Mobile <span>*</span></label>
                        <input id="mobile-id" name="mobile" type="text" placeholder="Enter Your Phone Number...">
                        <p id="register-mobile"></p>
                        <label for="userpass">Password <span>*</span></label>
                        <input id="userpass" name="password" type="password" placeholder="Enter password...">
                        <p id="register-password"></p>
                        <div class="login-action mb-10 fix">
                            <p>Do You Alredy An Count ? <a href="#">Login Now</a>.</p>
                        </div>
                        <button type="submit" class="tp-in-btn w-100">
                        Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account-area-end -->
@endsection