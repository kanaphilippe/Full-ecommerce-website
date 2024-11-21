@extends('front.layout.layout')
@section('content')
 <main>
        <!-- page-banner-area-start -->
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
        <!-- page-banner-area-end -->

        <!-- account-area-start -->
        <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="basic-login">
                            <h5>Update Password</h5>
                            <p id="password-success"></p>
                            <p id="password-error"></p>
                            <form id="passwordForm" action="javascript:;" method="post">@csrf
                                <label for="current-password">Current Password <span>*</span></label>
                                <input id="current-password" name="current_password" type="password" placeholder="Enter Current password...">
                                <p id="password-current_password"></p>
                                <label for="new-password">New Password <span>*</span></label>
                                <input id="new-password" type="password" name="new_password" placeholder="Enter New password...">
                                <p id="password-new_password"></p>
                                <label for="confirm-password">Confirm Password <span>*</span></label>
                                <input id="confirm-password" name="confirm_password" type="password" placeholder="Confirm password...">
                                <p id="password-confirm_password"></p>
                               
                                <div class="order-button-payment mt-20">
                            <button type="submit" class="tp-btn-h1">Save Password</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account-area-end -->

        <!-- cta-area-start -->
        
        <!-- cta-area-end -->

    </main>
@endsection