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
                            <h2 data-wow-duration="1.2s" data-wow-delay="1s" class="wow fadeInUp">AİLENE EN UYGUN ARACI
                                SANİYELER İÇİNDE BUL</h2>
                            <p data-wow-duration="1.4s" data-wow-delay="1.5s" class="wow fadeInUp m-b30">Morbi sed lacus
                                nec risus finibus feugiat et fermentum nibh. Pellentesque vitae ante at elit fringilla
                                ac at purus.</p>
                            <a data-wow-duration="1.6s" data-wow-delay="2s" class="wow fadeInUp btn btn-primary"
                               href="about-us-2.html">ARAÇ AL<i class="fa fa-angle-right m-l10"></i></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="dz-media move-box wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.8s">
                            <img class="move-1" src="{{asset('view/images/main-slider/slider1/pic5.png')}}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="content-inner-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp"  style="background-image: url('{{asset('view/images/pexels-photo-707046.jpeg')}}')">
                    <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                        <div class="icon-content">
                            <h4 class="dlab-title">Aracını En İyi Fiyata Hemen Sat</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp"   style="background-image: url('{{asset('view/images/pexels-photo-707046.jpeg')}}')">
                    <div class="icon-bx-wraper style-1 box-hover active text-center m-b30">

                        <div class="icon-content">
                            <h4 class="dlab-title">EN İYİ FİYATA HEMEN ARAÇ AL</h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 wow fadeInUp"  style="background-image: url('{{asset('view/images/pexels-photo-707046.jpeg')}}')">
                    <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                        <div class="icon-content">
                            <h4 class="dlab-title">ARADIĞIM ARAÇ GELİNCE HABER VER</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects -->
    <section class="content-inner-1">
        <div class="container-fluid">
            <div class="section-head style-1 text-center mb-3">
                <h3 class="title">ARAÇLAR</h3>
            </div>
            <div class="site-filters style-1 clearfix center mb-5">
                <ul class="filters" data-bs-toggle="buttons">
                    <li data-filter=".web_design" class="btn">
                        <input type="radio">
                        <a href="javascript:void(0);">Satışta Olanlar</a>
                    </li>
                    <li data-filter=".web_development" class="btn">
                        <input type="radio">
                        <a href="javascript:void(0);">Satılan Araçlar</a>
                    </li>
                    <li data-filter=".branding" class="btn">
                        <input type="radio">
                        <a href="javascript:void(0);">Gelecek Araçlar</a>
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="clearfix">
                    <ul id="masonry" class="row lightgallery">
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 web_design wow fadeInUp"
                            data-wow-duration="2s"
                            data-wow-delay="0.2s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic1.jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic1.jpg')}}"
                                          data-src="{{asset('view/images/projects/pic1.jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Web Development</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 mobile_app wow fadeInUp"
                            data-wow-duration="2s" data-wow-delay="0.8s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic5.jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic5.jpg')}}"
                                          data-src="{{asset('view/images/projects/pic5.jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Strategy & Research</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 branding wow fadeInUp"
                            data-wow-duration="2s" data-wow-delay="0.6s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic2.jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic2.jpg')}}"
                                          data-src="{{asset('view/images/projects/pic2.jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Web Solution</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 web_development wow fadeInUp"
                            data-wow-duration="2s" data-wow-delay="1.2s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic6.jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic6.jpg')}}"
                                          data-src="{{asset('view/images/projects/pic6.jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Testing & Lunching</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 web_development wow fadeInUp"
                            data-wow-duration="2s" data-wow-delay="0.4s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic7.jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic7.jpg')}}"
                                          data-src="{{asset('view/images/projects/pic7.jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Idea & Analysis</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 seo wow fadeInUp" data-wow-duration="2s"
                            data-wow-delay="1.0s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic8.jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic8.jpg')}}"
                                          data-src="{{asset('view/images/projects/pic8.jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Online Support</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 web_development wow fadeInUp"
                            data-wow-duration="2s" data-wow-delay="1.2s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic3..jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic3..jpg')}}"
                                          data-src="{{asset('view/images/projects/pic3..jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">Growth Tracking</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="card-container col-lg-3 col-md-6 col-sm-6 seo wow fadeInUp" data-wow-duration="2s"
                            data-wow-delay="1.0s">
                            <div class="dlab-box dlab-overlay-box style-1 m-b30">
                                <div class="dlab-media dlab-img-overlay1 primary">
                                    <img src="{{asset('view/images/projects/pic4..jpg')}}" alt="">
                                    <span data-exthumbimage="images/projects/pic4..jpg')}}"
                                          data-src="{{asset('view/images/projects/pic4..jpg')}}" class="lightimg"
                                          title="Design">
										<i class="la la-plus"></i>
									</span>
                                </div>
                                <div class="dlab-info">
                                    <h4 class="title"><a href="services-details-2.html">SEO Marketing</a></h4>
                                    <ul class="tags-list">
                                        <li><a href="#">Brand</a></li>
                                        <li><a href="#">Website</a></li>
                                    </ul>
                                    <a href="services-details-2.html" class="btn btn-light icon-btn"><i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section style="background-image: url({{asset('view/images/background/bg1.png')}}); background-size:100%;">
        <div class="content-inner-2">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h2 class="title">Nasıl Çalışır</h2>
                    <h6 class="sub-title">Buraya Yazı Gelecek</h6>
                </div>

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-5 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
                            <div class="dlab-media cf-r-img d-lg-block d-none">
                                <img src="{{asset('view/images/main-slider/slider1/pic1.png')}}" class="move-2"
                                     style="    width: 66%;" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="section-wraper-one">
                                <div class="icon-bx-wraper style-2 left m-b30">
                                    <div class="icon-bx-md radius bg-white text-red">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <i class="flaticon-idea"></i>
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">Aracını Ekle</h4>
                                        <p>Sisteme aracınız ile ilgili gerekli bilgileri doldurdurunuz</p>
                                    </div>
                                </div>
                                <div class="icon-bx-wraper style-2 left m-b30">
                                    <div class="icon-bx-md radius bg-white text-yellow">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <i class="flaticon-line-graph"></i>
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">Değerleme Sonucunu Onayla</h4>
                                        <p>Mauris eleifend ipsum dolor, sit amet elementum tortor mattis interdum.
                                            Praesent ut lobortis purus.</p>
                                    </div>
                                </div>
                                <div class="icon-bx-wraper style-2 left m-b30">
                                    <div class="icon-bx-md radius bg-white text-green">
                                        <a href="javascript:void(0);" class="icon-cell">
                                            <i class="flaticon-rocket"></i>
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dlab-title">24 Saat İçerisinde Satalım</h4>
                                        <p>Mauris eleifend ipsum dolor, sit amet elementum tortor mattis interdum.
                                            Praesent ut lobortis purus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <section>
        <div class="content-inner-2">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h6 class="sub-title">Aracını satmayımı düşünüyorsun <br> Sizin için daha hızlı ve kolayca araç
                        değerleme hizmeti sunuyoruz. </h6>
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
                                <h4 class="dlab-title">Güvenilir</h4>
                                <p>Fusce sit amet dui vitae urna tristique imperdiet. Donec eget sapien euismod,
                                    faucibus nibh non, consequat elit. </p>
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
                                <h4 class="dlab-title">Değerinde Değerleme</h4>
                                <p>Fusce sit amet dui vitae urna tristique imperdiet. Donec eget sapien euismod,
                                    faucibus nibh non, consequat elit. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 wow fadeInUp" data-wow-duration="2s"
                         data-wow-delay="0.6s">
                        <div class="icon-bx-wraper style-1 box-hover text-center m-b30">
                            <div class="icon-bx-md radius bg-green shadow-green">
                                <a href="javascript:void(0);" class="icon-cell">
                                    <i class="flaticon-pie-charts"></i>
                                </a>
                            </div>
                            <div class="icon-content">
                                <h4 class="dlab-title">Parasının Karşılığı</h4>
                                <p>Fusce sit amet dui vitae urna tristique imperdiet. Donec eget sapien euismod,
                                    faucibus nibh non, consequat elit. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team -->
    <section class="content-inner-1 bgl-primary">
        <div class="container">
            <div class="section-head style-1 text-center">
                <h3 class="title">Aradığın Araca Saniyeler içinde ulaş</h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row align-items-center about-wraper-2">
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper right m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-idea"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Idea &amp; Analysis</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper right m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-vector"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Designing</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper right m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-vector"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">SEO Marketing</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow zoomIn d-lg-block d-none" data-wow-duration="2s"
                                 data-wow-delay="0.2s"
                                 style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: zoomIn;">
                                <div class="dz-media text-center m-b30 scale1">
                                    <img src="images/about/img7.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper left m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-coding"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Development</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper left m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-rocket"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Lunching</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s"
                                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.4s; animation-name: fadeInUp;">
                                        <div class="icon-bx-wraper left m-b10 icon-up style-8 m-md-b30">
                                            <div class="icon-bx-sm m-b20">
                                                <a href="javascript:void(0);" class="icon-cell"><i
                                                            class="flaticon-rocket"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h4 class="dlab-tilte text-capitalize">Research</h4>
                                                <p>Praesent tincidunt congue est ut hendrerit ellentesque eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <div class="col-lg-12">
                    <div class="testimonials-carousel1 owl-carousel owl-theme owl-btn-2 owl-btn-white owl-btn-shadow owl-btn-center">
                        <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="testimonial-1">
                                <div class="testimonial-text">
                                    <p>Cras porttitor orci vel ex convallis congue. Aliquam et pharetra urna.</p>
                                </div>
                                <div class="testimonial-detail">
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
                                    <p>Cras porttitor orci vel ex convallis congue. Aliquam et pharetra urna.</p>
                                </div>
                                <div class="testimonial-detail">
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
                                    <p>Cras porttitor orci vel ex convallis congue. Aliquam et pharetra urna.</p>
                                </div>
                                <div class="testimonial-detail">
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
    <section class="content-inner-2"
             style="background-image: url({{asset('view/images/background/bg1.png')}}); background-size:100%; background-position:center; background-repeat:no-repeat;">
        <div class="container">
            <div class="section-head style-1 text-center">
                <h3 class="sub-title">BLOG</h3>
             </div>
            <div class="blog-carousel1 owl-carousel owl-theme owl-btn-1 owl-btn-center-lr owl-dots-none owl-btn-primary">
                <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="dlab-blog style-1 bg-white">
                        <div class="dlab-media">
                            <a href="blog-details-2.html"><img src="{{asset('view/images/blog/blog-grid-1/pic1..jpg')}}"
                                                               alt=""></a>
                        </div>
                        <div class="dlab-info">
                            <h5 class="dlab-title">
                                <a href="blog-details-2.html">Praesent ut lobortis purus hasellus accumsan.</a>
                            </h5>
                            <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed
                                fermentum pulvinar.</p>
                            <div class="dlab-meta meta-bottom">
                                <ul>
                                    <li class="post-date"><i class="flaticon-clock m-r10"></i>7 March, 2020</li>
                                    <li class="post-comment"><a href="javascript:void(0);"><i
                                                    class="flaticon-speech-bubble"></i><span>15</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                    <div class="dlab-blog style-1 bg-white">
                        <div class="dlab-media">
                            <a href="blog-details-2.html"><img src="{{asset('view/images/blog/blog-grid-1/pic2..jpg')}}"
                                                               alt=""></a>
                        </div>
                        <div class="dlab-info">
                            <h5 class="dlab-title">
                                <a href="blog-details-2.html">Donec feugiat mollis nisi in dignissim. Morbi lectus.</a>
                            </h5>
                            <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed
                                fermentum pulvinar.</p>
                            <div class="dlab-meta meta-bottom">
                                <ul>
                                    <li class="post-date"><i class="flaticon-clock m-r10"></i>7 March, 2020</li>
                                    <li class="post-comment"><a href="javascript:void(0);"><i
                                                    class="flaticon-speech-bubble"></i><span>15</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                    <div class="dlab-blog style-1 bg-white">
                        <div class="dlab-media">
                            <a href="blog-details-2.html"><img src="{{asset('view/images/blog/blog-grid-1/pic3..jpg')}}"
                                                               alt=""></a>
                        </div>
                        <div class="dlab-info">
                            <h5 class="dlab-title">
                                <a href="blog-details-2.html">Quisque sem tortor, convallis in arcu finibus.</a>
                            </h5>
                            <p class="m-b0">Pellentesque vel nibh gravida erat interdum lacinia vel in lectus. Sed
                                fermentum pulvinar.</p>
                            <div class="dlab-meta meta-bottom">
                                <ul>
                                    <li class="post-date"><i class="flaticon-clock m-r10"></i>7 March, 2020</li>
                                    <li class="post-comment"><a href="javascript:void(0);"><i
                                                    class="flaticon-speech-bubble"></i><span>15</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="overlay-secondary-middle bg-img-fix"
             style="background-image: url({{asset('view/images/background/bg5.jpg')}}); background-size: cover;">
        <div class="container">
            <div class="row action-box style-1  align-items-center">

            </div>
        </div>
    </section>
@endsection