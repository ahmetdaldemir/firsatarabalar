@extends('layouts.view')
@section('content')
    <div class="banner-one" style="background-image: url({{asset('view/images/main-slider/slider1/pic2.png')}});">
    <div class="container">
        <div class="banner-inner">
            <div class="img1"><img src="{{asset('view/images/main-slider/slider1/pic3.png')}}" alt=""></div>
            <div class="img2"><img src="{{asset('view/images/main-slider/slider1/pic4.png')}}" alt=""></div>
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="banner-content">
                        <h6 data-wow-duration="1s" data-wow-delay="0.5s" class="wow fadeInUp sub-title">WE CREATE IDEAS</h6>
                        <h1 data-wow-duration="1.2s" data-wow-delay="1s" class="wow fadeInUp">HOW WE CAN HELP YOUR <span class="text-primary">BUSINESS</span></h1>
                        <p  data-wow-duration="1.4s" data-wow-delay="1.5s" class="wow fadeInUp m-b30">Morbi sed lacus nec risus finibus feugiat et fermentum nibh. Pellentesque vitae ante at elit fringilla ac at purus.</p>
                        <a  data-wow-duration="1.6s" data-wow-delay="2s" class="wow fadeInUp btn btn-primary" href="about-us-2.html" >Learn More<i class="fa fa-angle-right m-l10"></i></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="dz-media move-box wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.8s" >
                        <img class="move-1" src="{{asset('view/images/main-slider/slider1/pic5.png')}}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section style="background-image: url({{asset('view/images/background/bg1.png')}}); background-size:100%;">
    <!-- Clients Logo -->
    <div class="content-inner-2">
        <div class="container">
            <div class="clients-carousel owl-none owl-carousel">
                <div class="item">
                    <div class="clients-logo">
                        <img class="logo-main" src="{{asset('view/images/logo/logo-purple1.png')}}" alt="">
                        <img class="logo-hover" src="{{asset('view/images/logo/logo-light1.png')}}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="clients-logo">
                        <img class="logo-main" src="{{asset('view/images/logo/logo-purple2.png')}}" alt="">
                        <img class="logo-hover" src="{{asset('view/images/logo/logo-light2.png')}}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="clients-logo">
                        <img class="logo-main" src="{{asset('view/images/logo/logo-purple3.png')}}" alt="">
                        <img class="logo-hover" src="{{asset('view/images/logo/logo-light3.png')}}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="clients-logo">
                        <img class="logo-main" src="{{asset('view/images/logo/logo-purple4.png')}}" alt="">
                        <img class="logo-hover" src="{{asset('view/images/logo/logo-light4.png')}}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="clients-logo">
                        <img class="logo-main" src="{{asset('view/images/logo/logo-purple5.png')}}" alt="">
                        <img class="logo-hover" src="{{asset('view/images/logo/logo-light5.png')}}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="clients-logo">
                        <img class="logo-main" src="{{asset('view/images/logo/logo-purple6.png')}}" alt="">
                        <img class="logo-hover" src="{{asset('view/images/logo/logo-light6.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service -->
    <div class="content-inner-2">
        <div class="container">
            <div class="section-head style-1 text-center">
                <h6 class="sub-title">SERVICES</h6>
                <h2 class="title">PROVIDE AWESOME SERVICE</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                        <div class="icon-bx-md radius bg-yellow shadow-yellow">
                            <a href="javascript:void(0);" class="icon-cell">
                                <i class="flaticon-office"></i>
                            </a>
                        </div>
                        <div class="icon-content">
                            <h4 class="dlab-title">Strategy & Research</h4>
                            <p>Fusce sit amet dui vitae urna tristique imperdiet. Donec eget sapien euismod, faucibus nibh non, consequat elit. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                    <div class="icon-bx-wraper style-1 box-hover active text-center m-b30">
                        <div class="icon-bx-md radius bg-red shadow-red">
                            <a href="javascript:void(0);" class="icon-cell">
                                <i class="flaticon-website"></i>
                            </a>
                        </div>
                        <div class="icon-content">
                            <h4 class="dlab-title">Web Development</h4>
                            <p>Fusce sit amet dui vitae urna tristique imperdiet. Donec eget sapien euismod, faucibus nibh non, consequat elit. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                    <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                        <div class="icon-bx-md radius bg-green shadow-green">
                            <a href="javascript:void(0);" class="icon-cell">
                                <i class="flaticon-pie-charts"></i>
                            </a>
                        </div>
                        <div class="icon-content">
                            <h4 class="dlab-title">Web Solution</h4>
                            <p>Fusce sit amet dui vitae urna tristique imperdiet. Donec eget sapien euismod, faucibus nibh non, consequat elit. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us -->
<section class="content-inner" style="background-image: url({{asset('view/images/background/bg19.png')}}); background-size:100%;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="dz-media">
                    <img src="{{asset('view/images/about/img4.png')}}" class="move-1" alt="">
                </div>
            </div>
            <div class="col-md-6 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="section-head style-1 mb-4">
                    <h6 class="sub-title">ABOUT US</h6>
                    <h2 class="title">HOW  WE CAN HELP YOUR BUSINESS GOAL</h2>
                </div>
                <p class="m-b20">Integer pretium molestie nisl, non blandit lectus suscipit in. Vivamus tellus diam, iaculis eget nulla sit amet, tincidunt consectetur sem. Suspendisse laoreet, quam sed faucibus feugiat, tortor velit suscipit orci, sed consectetur ante eros id urna. Mauris luctus nulla ut pharetra tempor.</p>
                <img src="{{asset('view/images/sign.png')}}" alt="">
                <h4 class="m-b30">CEO Jhone Doe</h4>
                <a href="about-us-2.html" class="btn btn-primary">Learn More<i class="fa fa-angle-right m-l10 scale2"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Counter -->
<section class="counter-wraper bg-white half-bg">
    <div class="container">
        <div class="row counter-inner">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="icon-bx-wraper style-4 text-center m-b30">
                    <div class="icon-bx-sm radius bg-green m-b20">
                        <a href="javascript:void(0);" class="icon-cell">
                            <i class="flaticon-smile"></i>
                        </a>
                    </div>
                    <div class="icon-content">
                        <span class="title">Satisfied Clients</span>
                        <h2 class="counter-title m-b0 text-primary"><span class="counter">18</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="icon-bx-wraper style-4 text-center m-b30">
                    <div class="icon-bx-sm radius bg-yellow m-b20">
                        <a href="javascript:void(0);" class="icon-cell">
                            <i class="flaticon-line-graph"></i>
                        </a>
                    </div>
                    <div class="icon-content">
                        <span class="title">Project Completed</span>
                        <h2 class="counter-title m-b0 text-primary"><span class="counter">20</span>Ml</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                <div class="icon-bx-wraper style-4 text-center m-b30">
                    <div class="icon-bx-sm radius bg-blue m-b20">
                        <a href="javascript:void(0);" class="icon-cell">
                            <i class="flaticon-startup"></i>
                        </a>
                    </div>
                    <div class="icon-content">
                        <span class="title">Project Lunched</span>
                        <h2 class="counter-title m-b0 text-primary"><span class="counter">30</span>Ml</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                <div class="icon-bx-wraper style-4 text-center m-b30">
                    <div class="icon-bx-sm radius bg-red m-b20">
                        <a href="javascript:void(0);" class="icon-cell">
                            <i class="flaticon-confetti"></i>
                        </a>
                    </div>
                    <div class="icon-content">
                        <span class="title">Years Completed</span>
                        <h2 class="counter-title m-b0 text-primary"><span class="counter">50</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fetures -->
<section class="content-inner-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-7 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="section-head style-1">
                    <h6 class="sub-title">FETURES</h6>
                    <h2 class="title">OUR WORK FLOW</h2>
                </div>
                <div class="section-wraper-one">
                    <div class="icon-bx-wraper style-2 left m-b30">
                        <div class="icon-bx-md radius bg-white text-red">
                            <a href="javascript:void(0);" class="icon-cell">
                                <i class="flaticon-idea"></i>
                            </a>
                        </div>
                        <div class="icon-content">
                            <h4 class="dlab-title">Idea & Analysis Gathering</h4>
                            <p>Mauris eleifend ipsum dolor, sit amet elementum tortor mattis interdum. Praesent ut lobortis purus.</p>
                        </div>
                    </div>
                    <div class="icon-bx-wraper style-2 left m-b30">
                        <div class="icon-bx-md radius bg-white text-yellow">
                            <a href="javascript:void(0);" class="icon-cell">
                                <i class="flaticon-line-graph"></i>
                            </a>
                        </div>
                        <div class="icon-content">
                            <h4 class="dlab-title">Designing & Developing</h4>
                            <p>Mauris eleifend ipsum dolor, sit amet elementum tortor mattis interdum. Praesent ut lobortis purus.</p>
                        </div>
                    </div>
                    <div class="icon-bx-wraper style-2 left m-b30">
                        <div class="icon-bx-md radius bg-white text-green">
                            <a href="javascript:void(0);" class="icon-cell">
                                <i class="flaticon-rocket"></i>
                            </a>
                        </div>
                        <div class="icon-content">
                            <h4 class="dlab-title">Testing & Lunching</h4>
                            <p>Mauris eleifend ipsum dolor, sit amet elementum tortor mattis interdum. Praesent ut lobortis purus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 wow fadeInRight  " data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="dlab-media cf-r-img d-lg-block d-none">
                    <img src="{{asset('view/images/about/pic1.png')}}" class="move-2" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects -->
<section class="content-inner-1">
    <div class="container-fluid">
        <div class="section-head style-1 text-center mb-3">
            <h6 class="sub-title">PROJECTS</h6>
            <h2 class="title">OUR PORTFOLIO</h2>
        </div>
        <div class="site-filters style-1 clearfix center mb-5">
            <ul class="filters" data-bs-toggle="buttons">
                <li class="btn active">
                    <input type="radio">
                    <a href="javascript:void(0);">All</a>
                </li>
                <li data-filter=".web_design" class="btn">
                    <input type="radio">
                    <a href="javascript:void(0);">Web Design</a>
                </li>
                <li data-filter=".web_development" class="btn">
                    <input type="radio">
                    <a href="javascript:void(0);">Web Development</a>
                </li>
                <li data-filter=".branding" class="btn">
                    <input type="radio">
                    <a href="javascript:void(0);">Branding</a>
                </li>
                <li data-filter=".mobile_app" class="btn">
                    <input type="radio">
                    <a href="javascript:void(0);">Mobile App</a>
                </li>
                <li data-filter=".seo" class="btn">
                    <input type="radio">
                    <a href="javascript:void(0);">SEO</a>
                </li>
            </ul>
        </div>
        <div class="clearfix">
            <ul id="masonry"  class="row lightgallery">
                <li class="card-container col-lg-3 col-md-6 col-sm-6 web_design wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic1.jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic1.jpg')}}" data-src="{{asset('view/images/projects/pic1.jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Web Development</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 mobile_app wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic5.jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic5.jpg')}}" data-src="{{asset('view/images/projects/pic5.jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Strategy & Research</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 branding wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic2.jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic2.jpg')}}" data-src="{{asset('view/images/projects/pic2.jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Web Solution</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 web_development wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.2s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic6.jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic6.jpg')}}" data-src="{{asset('view/images/projects/pic6.jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Testing & Lunching</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 web_development wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic7.jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic7.jpg')}}" data-src="{{asset('view/images/projects/pic7.jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Idea & Analysis</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 seo wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.0s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic8.jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic8.jpg')}}" data-src="{{asset('view/images/projects/pic8.jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Online Support</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 web_development wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.2s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic3..jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic3..jpg')}}" data-src="{{asset('view/images/projects/pic3..jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">Growth Tracking</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="card-container col-lg-3 col-md-6 col-sm-6 seo wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.0s">
                    <div class="dlab-box dlab-overlay-box style-1 m-b30">
                        <div class="dlab-media dlab-img-overlay1 primary">
                            <img src="{{asset('view/images/projects/pic4..jpg')}}" alt="">
                            <span data-exthumbimage="images/projects/pic4..jpg')}}" data-src="{{asset('view/images/projects/pic4..jpg')}}" class="lightimg" title="Design">
										<i class="la la-plus"></i>
									</span>
                        </div>
                        <div class="dlab-info">
                            <h4 class="title"><a href="services-details-2.html">SEO Marketing</a></h4>
                            <ul class="tags-list">
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                            <a href="services-details-2.html" class="btn btn-light icon-btn"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="content-inner-3 bg-primary" style="background-image: url({{asset('view/images/background/bg13.png')}}); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-5 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="dlab-media m-b30">
                    <img src="{{asset('view/images/about/img9.png')}}" class="move-2" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="section-head style-1 text-white">
                    <h6 class="sub-title text-white">NEWSLETTER</h6>
                    <h2 class="title m-b15">SUBSCRIBE TO OUR NEWSLETTER</h2>
                    <p>Curabitur eleifend nibh sit amet ex posuere, vel malesuada turpis pretium. Quisque et tincidunt risus, a tempor massa. Cras tempor egestas libero, eu laoreet enim pharetra non.</p>
                </div>
                <div class="dlab-subscribe style-2 max-w500">
                    <form class="dzSubscribe" action="script/mailchamp.php.html" method="post">
                        <div class="dzSubscribeMsg"></div>
                        <div class="form-group">
                            <div class="input-group">
                                <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Email Address">
                                <div class="input-group-addon">
                                    <button name="submit" value="Submit" type="submit" class="btn btn-primary">Subscribe Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="content-inner-1 bgl-primary">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title">TEAM</h6>
            <h2 class="title">OUR BEST EXPERTISE</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team-carousel1 owl owl-carousel owl-none owl-theme owl-dots-primary-full">
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic1..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Alina Jia</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic2..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Suresh Doe</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic3..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Domina Li</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic4..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Alina Jia</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic5..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Suresh Doe</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic6..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Domina Li</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.7s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic1..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Alina Jia</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic2..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Suresh Doe</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.9s">
                        <div class="dlab-team style-1 m-b20">
                            <div class="dlab-media">
                                <a href="javascript:void(0);"><img src="{{asset('view/images/team/pic3..jpg')}}" alt=""></a>
                            </div>
                            <div class="dlab-content">
                                <div class="clearfix">
                                    <h4 class="dlab-name"><a href="javascript:void(0);">Domina Li</a></h4>
                                    <span class="dlab-position">Senior Designer</span>
                                </div>
                                <ul class="dlab-social-icon primary-light">
                                    <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                                    <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Table -->
<section class="content-inner" style="background-image: url({{asset('view/images/background/bg20.png); background-repeat: no-repeat; background-size: 100%; background-position:center;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title">PRICING</h6>
            <h2 class="title">CHOOSE PLAN</h2>
        </div>
        <div class="row pricingtable-wraper-1">
            <div class="col-lg-4 col-md-6">
                <div class="pricingtable-wrapper style-1 m-b30 m-md-b0">
                    <div class="pricingtable-inner">
                        <div class="pricingtable-title">
                            <h3 class="title">Basic Plan</h3>
                        </div>
                        <div class="pricingtable-price">
                            <h2 class="pricingtable-bx">$99<small>/Month</small></h2>
                        </div>
                        <p class="text">Aliquam dui lacus, lobortis quis sapien non.</p>
                        <ul class="pricingtable-features">
                            <li>Graphic Design </li>
                            <li>Web Design</li>
                            <li>UI/UX</li>
                            <li>HTML/CSS</li>
                            <li>SEO Marketing</li>
                            <li>Business Analysis</li>
                        </ul>
                        <div class="pricingtable-footer">
                            <a href="pricing-table-2.html" class="btn btn-primary rounded-md">Start Now <i class="fa fa-angle-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-6">
                <div class="pricingtable-wrapper style-1 active center m-b30">
                    <div class="pricingtable-inner">
                        <div class="pricingtable-title">
                            <h3 class="title">Standart Plan</h3>
                        </div>
                        <div class="pricingtable-price">
                            <h2 class="pricingtable-bx">$199<small>/Month</small></h2>
                        </div>
                        <p class="text">Aliquam dui lacus, lobortis quis sapien non.</p>
                        <ul class="pricingtable-features">
                            <li>Graphic Design </li>
                            <li>Web Design</li>
                            <li>UI/UX</li>
                            <li>HTML/CSS</li>
                            <li>SEO Marketing</li>
                            <li>Business Analysis</li>
                        </ul>
                        <div class="pricingtable-footer">
                            <a href="pricing-table-2.html" class="btn btn-primary rounded-md">Start Now <i class="fa fa-angle-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-12">
                <div class="pricingtable-wrapper style-1 m-b30 ">
                    <div class="pricingtable-inner">
                        <div class="pricingtable-title">
                            <h3 class="title">Premium Plan</h3>
                        </div>
                        <div class="pricingtable-price">
                            <h2 class="pricingtable-bx">$149<small>/Month</small></h2>
                        </div>
                        <p class="text">Aliquam dui lacus, lobortis quis sapien non.</p>
                        <ul class="pricingtable-features">
                            <li>Graphic Design </li>
                            <li>Web Design</li>
                            <li>UI/UX</li>
                            <li>HTML/CSS</li>
                            <li>SEO Marketing</li>
                            <li>Business Analysis</li>
                        </ul>
                        <div class="pricingtable-footer">
                            <a href="pricing-table-2.html" class="btn btn-primary rounded-md">Start Now <i class="fa fa-angle-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="content-inner bgl-primary">
    <div class="container">
        <div class="row testimonials-wraper-1 align-items-center">
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.8s">
                <div class="section-head style-1">
                    <h6 class="sub-title">TESTMONIAL</h6>
                    <h2 class="title m-b10">WHAT OUR CLIENTS SAY’S</h2>
                    <p>Nunc vel ligula ut erat scelerisque vehicula sit amet porttitor magna. Donec malesuada quis diam quis pellentesque.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonials-carousel1 owl-carousel owl-theme owl-btn-2 owl-btn-white owl-btn-shadow owl-btn-center">
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="testimonial-1">
                            <div class="testimonial-text">
                                <p>Cras porttitor orci vel ex convallis congue. Aliquam et pharetra urna. Quisque auctor purus in nunc posuere, vitae condimentum odio mattis. Nulla hendrerit tellus tellus, sed pharetra dui vulputate sed.</p>
                            </div>
                            <div class="testimonial-detail">
                                <div class="testimonial-pic">
                                    <img src="images/testimonials/pic3..jpg')}}" alt="">
                                </div>
                                <div class="clearfix">
                                    <strong class="testimonial-name">Eity Akhter</strong>
                                    <span class="testimonial-position">CEO & Founder </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="testimonial-1">
                            <div class="testimonial-text">
                                <p>Cras porttitor orci vel ex convallis congue. Aliquam et pharetra urna. Quisque auctor purus in nunc posuere, vitae condimentum odio mattis. Nulla hendrerit tellus tellus, sed pharetra dui vulputate sed.</p>
                            </div>
                            <div class="testimonial-detail">
                                <div class="testimonial-pic">
                                    <img src="images/testimonials/pic3..jpg')}}" alt="">
                                </div>
                                <div class="clearfix">
                                    <strong class="testimonial-name">Lora Price</strong>
                                    <span class="testimonial-position">CEO & Founder </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="testimonial-1">
                            <div class="testimonial-text">
                                <p>Cras porttitor orci vel ex convallis congue. Aliquam et pharetra urna. Quisque auctor purus in nunc posuere, vitae condimentum odio mattis. Nulla hendrerit tellus tellus, sed pharetra dui vulputate sed.</p>
                            </div>
                            <div class="testimonial-detail">
                                <div class="testimonial-pic">
                                    <img src="images/testimonials/pic3..jpg')}}" alt="">
                                </div>
                                <div class="clearfix">
                                    <strong class="testimonial-name">Cak Dikin</strong>
                                    <span class="testimonial-position">CEO & Founder </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="content-inner-2" style="background-image: url({{asset('view/images/background/bg1.png')}}); background-size:100%; background-position:center; background-repeat:no-repeat;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title">BLOG</h6>
            <h2 class="title">LATEST BLOG & NEWS</h2>
        </div>
        <div class="blog-carousel1 owl-carousel owl-theme owl-btn-1 owl-btn-center-lr owl-dots-none owl-btn-primary">
            <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="dlab-blog style-1 bg-white">
                    <div class="dlab-media">
                        <a href="blog-details-2.html"><img src="{{asset('view/images/blog/blog-grid-1/pic1..jpg')}}" alt=""></a>
                    </div>
                    <div class="dlab-info">
                        <h5 class="dlab-title">
                            <a href="blog-details-2.html">Praesent ut lobortis purus hasellus accumsan.</a>
                        </h5>
                        <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed fermentum  pulvinar.</p>
                        <div class="dlab-meta meta-bottom">
                            <ul>
                                <li class="post-date"><i class="flaticon-clock m-r10"></i>7 March, 2020</li>
                                <li class="post-comment"><a href="javascript:void(0);"><i class="flaticon-speech-bubble"></i><span>15</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="dlab-blog style-1 bg-white">
                    <div class="dlab-media">
                        <a href="blog-details-2.html"><img src="{{asset('view/images/blog/blog-grid-1/pic2..jpg')}}" alt=""></a>
                    </div>
                    <div class="dlab-info">
                        <h5 class="dlab-title">
                            <a href="blog-details-2.html">Donec feugiat mollis nisi in dignissim. Morbi lectus.</a>
                        </h5>
                        <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed fermentum  pulvinar.</p>
                        <div class="dlab-meta meta-bottom">
                            <ul>
                                <li class="post-date"><i class="flaticon-clock m-r10"></i>7 March, 2020</li>
                                <li class="post-comment"><a href="javascript:void(0);"><i class="flaticon-speech-bubble"></i><span>15</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                <div class="dlab-blog style-1 bg-white">
                    <div class="dlab-media">
                        <a href="blog-details-2.html"><img src="{{asset('view/images/blog/blog-grid-1/pic3..jpg')}}" alt=""></a>
                    </div>
                    <div class="dlab-info">
                        <h5 class="dlab-title">
                            <a href="blog-details-2.html">Quisque sem tortor, convallis in arcu finibus.</a>
                        </h5>
                        <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed fermentum  pulvinar.</p>
                        <div class="dlab-meta meta-bottom">
                            <ul>
                                <li class="post-date"><i class="flaticon-clock m-r10"></i>7 March, 2020</li>
                                <li class="post-comment"><a href="javascript:void(0);"><i class="flaticon-speech-bubble"></i><span>15</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get A Quote -->
<section class="content-inner" style="background-image: url({{asset('view/images/background/bg19.png')}}); background-size:100%; background-position:center; background-repeat:no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-7 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="section-head style-1">
                    <h6 class="sub-title">CONTACT US</h6>
                    <h2 class="title">GET IN TOUCH</h2>
                </div>
                <form class="dlab-form dzForm" method="POST" action="view/script/contact_smtp.php">
                    <div class="dzFormMsg"></div>
                    <input type="hidden" class="form-control" name="dzToDo" value="Contact" >
                    <input type="hidden" class="form-control" name="reCaptchaEnable" value="0" >
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-user"></i></span>
                                </div>
                                <input name="dzName" type="text" required class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-user"></i></span>
                                </div>
                                <input name="dzOther[last_name]" type="text" class="form-control" required placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-envelope"></i></span>
                                </div>
                                <input name="dzEmail" type="text" required class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-phone"></i></span>
                                </div>
                                <input name="dzPhoneNumber" type="text" required class="form-control" placeholder="Phone No.">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-file-alt"></i></span>
                                </div>
                                <input name="dzOther[project_title]" type="text" class="form-control" required placeholder="Project Title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-list"></i></span>
                                </div>
                                <select name="dzOther[choose_service]" class="form-control">
                                    <option selected>Choose Service</option>
                                    <option value="1">Web Development</option>
                                    <option value="2">Web Design</option>
                                    <option value="3">Strategy & Research</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 m-b20">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="la la-sms"></i></span>
                                </div>
                                <textarea name="dzMessage" required class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button name="submit" type="submit" value="Submit" class="btn btn-primary">Submit Now<i class="fa fa-angle-right m-l10"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-5 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="dlab-media cf-r-img">
                    <img src="{{asset('view/images/about/pic2.png')}}" class="move-1" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlay-secondary-middle bg-img-fix" style="background-image: url({{asset('view/images/background/bg5.jpg')}}); background-size: cover;">
    <div class="container">
        <div class="row action-box style-1  align-items-center">
            <div class="col-xl-9 col-lg-8 col-md-8 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                <h2 class="title text-white my-2">YOU WANT TO SHOWCASE YOUR WEBSITE</h2>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 text-end wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                <a href="contact-us-2.html" class="btn btn-primary">Join Now <i class="fa fa-angle-right m-l10"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection