@extends('front.layout.layout')
@section('content')
 <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="basic-login mb-50">
                            <h5>RESET YOUR PASSWORD</h5>
                            <p class="reset-success"></p>
                            <form action="javascript:;" id="resetPwdForm" Method="post">@csrf
                                <input type="hidden" name="code" value="{{ $code }}">
                                <label for="reset-password">New Password  <span>*</span></label>
                                <input id="reset-password" type="password" name="password" placeholder="Enter Your New Password">
                                <div class="login-action mb-10 fix">
                                    <!--<span class="log-rem f-left">
                                       <input id="remember" type="checkbox">
                                       <label for="remember">Remember me</label>
                                    </span>-->
                                    <p class="reset-password"></p>
                                    <span class="forgot-login f-right">
                                       <a href="#">BACK TO LOGIN</a>
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