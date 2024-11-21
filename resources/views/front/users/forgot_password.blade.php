@extends('front.layout.layout')
@section('content')
 <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="basic-login mb-50">
                            <h5>RESET YOUR PASSWORD</h5>
                            <p class="forgot-success"></p>
                            <form action="javascript:;" id="forgotForm" Method="post">@csrf
                                <label for="name">Email address  <span>*</span></label>
                                <input id="user-email" type="text" name="email" placeholder="Enter Username">
                                <div class="login-action mb-10 fix">
                                    <!--<span class="log-rem f-left">
                                       <input id="remember" type="checkbox">
                                       <label for="remember">Remember me</label>
                                    </span>-->
                                    <p class="forgot-email"></p>
                                    <span class="forgot-login f-right">
                                       <a href="{{ url('user/login')}}">BACK TO LOGIN</a>
                                    </span>
                                </div>
                                <button type="submit" class="tp-in-btn w-100">
                                    SEND
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endsection