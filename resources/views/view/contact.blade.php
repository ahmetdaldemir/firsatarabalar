@extends('layouts.view')
@section('content')

    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                 <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Get A Quote</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <div class="section-head style-1">
                        <h6 class="sub-title">CONTACT US</h6>
                        <h2 class="title">GET IN TOUCH</h2>
                    </div>
                    <form class="dlab-form dzForm" method="POST" action="script/contact_smtp.php">
                        <div class="dzFormMsg"></div>
                        <input type="hidden" class="form-control" name="dzToDo" value="Contact">
                        <input type="hidden" class="form-control" name="reCaptchaEnable" value="0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                    </div>
                                    <input name="dzName" type="text" required="" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                    </div>
                                    <input name="dzOther[last_name]" type="text" class="form-control" required="" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-envelope"></i></span>
                                    </div>
                                    <input name="dzEmail" type="text" required="" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-phone"></i></span>
                                    </div>
                                    <input name="dzPhoneNumber" type="text" required="" class="form-control" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-file-alt"></i></span>
                                    </div>
                                    <input name="dzOther[project_title]" type="text" class="form-control" required="" placeholder="Project Title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-list"></i></span>
                                    </div>
                                    <div class="dropdown bootstrap-select form-control"><select name="dzOther[choose_service]" class="form-control">
                                            <option selected="">Choose Service</option>
                                            <option value="1">Web Development</option>
                                            <option value="2">Web Design</option>
                                            <option value="3">Strategy &amp; Research</option>
                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Choose Service"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Choose Service</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                </div>
                            </div>
                            <div class="col-sm-12 m-b20">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-sms"></i></span>
                                    </div>
                                    <textarea name="dzMessage" required="" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button name="submit" type="submit" value="Submit" class="btn btn-primary">Submit Now<i class="fa fa-angle-right m-l10"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-6 col-lg-5 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
                    <div class="row m-t30">
                        <div class="col-lg-12 col-md-12">
                            <div class="icon-bx-wraper style-9 m-md-b60">
                                <div class="icon-bx-sm radius bg-primary">
                                    <a href="javascript:void(0);" class="icon-cell">
                                        <i class="las la-phone-volume"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-title">Call Now</h4>
                                    <p>+91 874 7844 487</p>
                                    <p>+91 987 4784 578</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="icon-bx-wraper style-9 m-md-b60  m-sm-t30">
                                <div class="icon-bx-sm radius bg-primary">
                                    <a href="javascript:void(0);" class="icon-cell">
                                        <i class="las la-map-marker"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-title">Location</h4>
                                    <p>1247/Plot No. 39, 15th Phase, Colony, Kukatpally, Hyderabad</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="icon-bx-wraper style-9  m-md-t30">
                                <div class="icon-bx-sm radius bg-primary">
                                    <a href="javascript:void(0);" class="icon-cell">
                                        <i class="las la-envelope-open"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-title">Email Now</h4>
                                    <p>info@gmail.com</p>
                                    <p>Services@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection