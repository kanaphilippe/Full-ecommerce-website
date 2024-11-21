<footer>
    
        <div class="fotter-area d-ddark-bg">
            <div class="footer__top pt-60 pb-10">
                <div class="container custom-conatiner">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-8">
                            <div class="footer__widget">
                                <div class="footer__widget-title mb-20">
                                    <h4>Download App</h4>
                                </div>
                                <div class="footer__widget-content">
                                    <p class="footer-text mb-25">DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                                    <div class="apps-store mb-20">
                                        <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                        <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                                    </div>
                                    <div class="social-icon social-icon-2">
                                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                        <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget footer-col-2">
                                <div class="footer__widget-title">
                                    <h4>My Account</h4>
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__link footer__link-2">
                                        <ul>
                                            @if (Auth::check())
                                            <li>
                                                <!--<a href="contact.html">Product Support</a>-->
                                                <a href="{{ url('user/account')}}">Account</a>
                                            </li>
                                            <li>
                                                <!--<a href="checkout.html">Checkout</a>-->
                                                <a href="{{ url('user/logout')}}">Signout</a>
                                            </li>
                                            <li>
                                                <!--<a href="checkout.html">Checkout</a>-->
                                                <a href="{{ url('user/orders')}}">My Orders</a>
                                            </li>
                                            @else
                                            <li>
                                                <!--<a href="cart.html">Shopping Cart</a>-->
                                                <a href="{{ url('user/register')}}">Signup</a>
                                            </li>
                                            <li>
                                                <!--<a href="wishlist.html">Wishlist</a>-->
                                                <a href="{{ url('user/login')}}">Signin</a>
                                            </li>
                                            <li>
                                                <!--<a href="wishlist.html">Wishlist</a>-->
                                                <a href="{{ url('user/update-password')}}">Update Password</a>
                                            </li>
                                            <!--<li>
                                                <a href="faq.html">Terms &amp; Conditions &amp;</a>
                                            </li>
                                            <li>
                                                <a href="faq.html">Redeem Voucher</a>
                                            </li>-->
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget footer-col-2">
                                <div class="footer__widget-title">
                                    <h4>Customer Care</h4>
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__link footer__link-2">
                                        <ul>
                                            <li><a href="faq.html">New Customers</a></li>
                                            <li><a href="faq.html">How to use Account</a></li>
                                            <li><a href="faq.html">Placing an Order</a></li>
                                            <li><a href="faq.html">Payment Methods</a></li>
                                            <li><a href="faq.html">Delivery &amp; Dispatch</a></li>
                                            <li><a href="faq.html">Problems with Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget footer-col-2">
                                <div class="footer__widget-title">
                                    <h4>Customer Service</h4>
                                </div>
                                <div class="footer__widget-content">
                                    <div class="footer__link footer__link-2">
                                        <ul>
                                            <li><a href="faq.html">Help Center</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="faq.html">Report Abuse</a></li>
                                            <li><a href="faq.html">Submit a Dispute</a></li>
                                            <li><a href="faq.html">Policies &amp; Rules</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6">
                            <div class="footer__widget">
                                <div class="footer__widget-title mb-20">
                                    <h4>Sign Up To Newsletter</h4>
                                </div>
                                <div class="footer__widget-content">
                                    <p class="footer-text mb-25">Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
                                    <div class="footer__newsletter-form">
                                        <form action="/product/add-subscriber-email" Method="POST">@csrf
                                            <input class="ft-newsl b-radius" type="text" name="subscriber_email" id="subscriber_email" placeholder="Enter your email ..." required="">
                                            <button class="ft-newsl-btn" type="button" onclick="addSubscriber()">subscribe</button>
                                        </form>
                                        </div>
                                    <p class="provide-text mt-20">By providing your email address, you agree to our <br> <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a> .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom-2">
                <div class="container custom-conatiner">
                    <div class="footer__bottom-content footer__bottom-content-2 pt-50 pb-50">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="footer__links footer__links-d text-center mb-25">
                                    <p>
                                        <a href="about.html">About Us</a>
                                        <a href="contact.html">Delivery & Return</a>
                                        <a href="faq.html">Privacy Policy</a>
                                        <a href="faq.html">Help</a>
                                        <a href="contact.html">Order Tracking</a>
                                        <a href="contact.html">Contact Us</a>
                                        <a href="faq.html">FAQs </a>
                                    </p>
                                </div>
                                <div class="payment-image text-center mb-25">
                                    <a href="#"><img src="assets/img/payment/payment.png" alt=""></a>
                                </div>
                                <div class="copy-right-area copy-right-area-2 text-center">
                                    <p>Copyright © <span>DukaMarket.</span> All Rights Reserved. Powered by <a href="#"><span class="main-color">Theme_Pure.</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function addSubscriber() {
            var subscriber_email = $("#subscriber_email").val();
            //alert(subscriber_email);
            var mailFormat = /\S+@\S+\.\S+/;
            if (subscriber_email.match(mailFormat)) {
            } else {
                alert("Invalid Email Address!");
            return false;
            }
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type: 'post',
            url: 'add-subscriber-email',
            data: {subscriber_email: subscriber_email },
            success: function (resp) {
                    if (resp == 'exists') {
                alert("Your Email alredy exists for Newsletter Subscription!");
                    } else if (resp == "saved") {
                alert("Your Email has been successfully added for Newsletter Subscription!");
                    }
                }, error: function () {
                alert("Error");
                }
            });
        }
        </script>
    </footer>

    