@extends('front.layout.layout')
@section('content')

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__logo mb-40">
                <a href="index.html">
                <img src="assets/img/logo/logo-white.png" alt="logo">
                </a>
            </div>
            <div class="offcanvas__search mb-25">
                <form action="#">
                    <input type="text" placeholder="What are you searching for?">
                    <button type="submit" ><i class="far fa-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu fix"></div>
            <div class="offcanvas__action">

            </div>
        </div>
        </div>
    </div>
    <!-- offcanvas area end -->      
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Contact Us</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Home</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Contact Us</span>
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

        <!-- news-detalis-area-start -->
        <div class="news-detalis-area mt-120 mb-70">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-8">
                    <div class="news-detalis-content mb-50">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#F4364C; color: white;">
                                    <strong>Error:</strong>
                                    @foreach($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>-->
                                </div>
                            @endif
                        <div class="post-comment-form mt-20">
                           
                           <h4 class="post-comment-form-title mb-40">Enter Your Enquiry</h4>
                           <form action="{{ url('contact') }}" Method="post">@csrf
                                <div class="input-field">
                                   <i class="fal fa-user"></i>
                                   <input type="text" name="name" placeholder="Type your name...." value="{{ old('name')}}">
                               </div>
                               <div class="input-field">
                                   <i class="fal fa-envelope"></i>
                                   <input type="text" name="email" placeholder="Type your email...." value="{{ old('email')}}">
                               </div>
                               <div class="input-field">
                                   <i class="fal fa-book"></i>
                                   <input type="text" name="subject" placeholder="Type your Subject...." value="{{ old('subject')}}">
                               </div>
                               <div class="input-field">
                                   <i class="fal fa-pencil-alt"></i>
                                   <textarea id="comment" name="message" placeholder="Type your Message...." >{{ old('message')}}</textarea>
                               </div>
                               <button type="submit" class="post-comment shutter-btn"><i class="fal fa-comments"></i>Send Your Querry</button>
                           </form>
                       </div>
                     </div>         
                  </div>
               </div>
            </div>
         </div>
         <!-- news-detalis-area-end  -->

        <!-- cta-area-start -->
        <!-- cta-area-end -->

    </main>

@endsection