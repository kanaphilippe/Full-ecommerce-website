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
                <div class="basic-login mb-50">
                    <h5>Login</h5>
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success:</strong> {{ Session::get('success_message') }}
                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>-->
                        </div>
                    @endif
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error:</strong> {{ Session::get('error_message') }}
                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>-->
                        </div>
                    @endif
                    <p id="login-error"></p>
                    <form action="javascript:;" id="loginForm" method="post">@csrf
                        <label for="name">email address  <span>*</span></label>
                        <input id="name" type="text" name="email" placeholder="Enter Email" value="<?php if(isset($_COOKIE['user-email'])){
                            echo $_COOKIE['user-email'];
                        }?>">
                        <p class="login-email"></p>
                        <label for="pass">Password <span>*</span></label>
                        <input id="pass" type="password" name="password" placeholder="Enter password..." value="<?php if(isset($_COOKIE['user-password'])){
                            echo $_COOKIE['user-password'];
                        }?>">
                        <p class="login-password"></p>
                        <div class="login-action mb-10 fix">
                            <span class="log-rem f-left">
                                <input id="remember-me" type="checkbox" name="remember-me" @if (isset($_COOKIE["user-email"])) checked="" @endif>
                                <label for="remember-me">Remember me</label>
                            </span>
                            <span class="forgot-login f-right">
                                <a href="{{ url('user/forgot-password') }}">Lost your password?</a>
                            </span>
                        </div>
                        <!--<a href="login.html" class="tp-in-btn w-100">log in</a>-->
                        <button type="submit" class="tp-in-btn w-100">
                        Login</button>
                    </form>
                </div>
            </div>
            <!--<div class="col-lg-6">
                <div class="basic-login">
                    <h5>Register</h5>
                    <form action="#">
                        <label for="username">Username or email address  <span>*</span></label>
                        <input id="username" type="text" placeholder="Enter Username">
                        <label for="email-id">Email Address <span>*</span></label>
                        <input id="email-id" type="text" placeholder="Email address...">
                        <label for="userpass">Password <span>*</span></label>
                        <input id="userpass" type="password" placeholder="Enter password...">
                        <div class="login-action mb-10 fix">
                            <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                        </div>
                        <a href="login.html" class="tp-in-btn w-100">Register</a>
                    </form>
                </div>
            </div>-->
        </div>
    </div>
</div>
<!-- account-area-end -->
@endsection