@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Satış Yönetimi</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Satış Yönetim Sayfası</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);padding-top: 20px">
        <div class="container">
            <div class="row">
                <!-- div class="col-xl-3 col-lg-3 m-b30">
                    //include('account.leftmenu')
                </div -->
                <div class="col-xl-12 col-lg-12 m-b30">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2">
                                    <img src="{{asset('new_view/img/male.jpeg')}}" style="max-width: 100%" />
                                    <h5 style="text-align: center;">{{auth()->guard('customer')->user()->firstname}} {{auth()->guard('customer')->user()->lastname}}</h5>
                                    <h5 style="text-align: center;">{{auth()->guard('customer')->user()->phone}}</h5>
                                    <h6 style="text-align: center;">{{auth()->guard('customer')->user()->email}}</h6>
                                </div>
                                <div class="col-xl-8 col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-8">
                                            <h5>Araç Bilgileri</h5>
                                            <h6>{{$customer_car->car->brand->name}} / {{$customer_car->car->model}} / {{$customer_car->caryear}} / {{\App\Enums\FullType::FullType[$customer_car->fuel]}} / {{\App\Enums\Transmission::Transmission[$customer_car->gear]}}</h6>
                                            <h6>{{$customer_car->car->name}} / {{$customer_car->car->horse}} HP / {{$customer_car->car->engine}} Motor</h6>
                                        </div>
                                        <div class="col-xl-12 col-lg-8" style="text-align: center">
                                            <img src="{{asset('new_view/img/exchange.png')}}" style="width:125px" />
                                        </div>
                                        <div class="divider"></div>
                                        <div class="col-xl-12 col-lg-8" style="text-align: center">
                                            <h5>Notlar</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <img src="{{asset('new_view/img/male.jpeg')}}" style="max-width: 100%" />
                                    <h5 style="text-align: center;">{{auth()->guard('customer')->user()->firstname}} {{auth()->guard('customer')->user()->lastname}}</h5>
                                    <h5 style="text-align: center;">{{auth()->guard('customer')->user()->phone}}</h5>
                                    <h6 style="text-align: center;">{{auth()->guard('customer')->user()->email}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .divider{    width: 100%;
                border-bottom: 1px solid #ccc;
                height: 72px;}
        </style>
<!--
        <div class="container">
            <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;    z-index: 9999;">
                <div class="col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading top-bar">
                            <div class="col-md-8 col-xs-8">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
                            </div>
                            <div class="col-md-4 col-xs-4" style="text-align: right;">
                                <a href="#"><span id="minim_chat_window" class="fa fa-minus icon_minim"></span></a>
                                <a href="#"><span class="fa fa-remove icon_close" data-id="chat_window_1"></span></a>
                            </div>
                        </div>
                        <div class="panel-body msg_container_base">
                            <div class="row msg_container base_sent">
                                <div class="col-md-10 col-xs-10">
                                    <div class="messages msg_sent">
                                        <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                </div>
                            </div>
                            <div class="row msg_container base_receive">
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="messages msg_receive">
                                        <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                </div>
                            </div>
                            <div class="row msg_container base_receive">
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <div class="messages msg_receive">
                                        <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                </div>
                            </div>
                            <div class="row msg_container base_sent">
                                <div class="col-xs-10 col-md-10">
                                    <div class="messages msg_sent">
                                        <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                </div>
                            </div>
                            <div class="row msg_container base_receive">
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <div class="messages msg_receive">
                                        <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                </div>
                            </div>
                            <div class="row msg_container base_sent">
                                <div class="col-md-10 col-xs-10 ">
                                    <div class="messages msg_sent">
                                        <p>that mongodb thing looks good, huh?
                                            tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                                <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-group dropup">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-cog"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
                </ul>
            </div>
        </div>
        <style>
            .icon-bx-wraper.style-7 .icon-content .dlab-title {
                margin-bottom: 15px;
                width: 350px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            .col-md-2, .col-md-10{
                padding:0;
            }
            .panel{
                margin-bottom: 0px;
            }
            .chat-window{
                bottom:0;
                position:fixed;
                float:right;
                margin-left:10px;
            }
            .chat-window > div > .panel{
                border-radius: 5px 5px 0 0;
            }
            .icon_minim{
                padding:2px 10px;
            }
            .msg_container_base{
                background: #e5e5e5;
                margin: 0;
                padding: 0 10px 10px;
                max-height:300px;
                overflow-x:hidden;
            }
            .top-bar {
                background: #666;
                color: white;
                padding: 10px;
                position: relative;
                overflow: hidden;
            }
            .msg_receive{
                padding-left:0;
                margin-left:0;
            }
            .msg_sent{
                padding-bottom:20px !important;
                margin-right:0;
            }
            .messages {
                background: white;
                padding: 10px;
                border-radius: 2px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                max-width:100%;
            }
            .messages > p {
                font-size: 13px;
                margin: 0 0 0.2rem 0;
            }
            .messages > time {
                font-size: 11px;
                color: #ccc;
            }
            .msg_container {
                padding: 10px;
                overflow: hidden;
                display: flex;
            }
            img {
                display: block;
                width: 100%;
            }
            .avatar {
                position: relative;
            }
            .base_receive > .avatar:after {
                content: "";
                position: absolute;
                top: 0;
                right: 0;
                width: 0;
                height: 0;
                border: 5px solid #FFF;
                border-left-color: rgba(0, 0, 0, 0);
                border-bottom-color: rgba(0, 0, 0, 0);
            }

            .base_sent {
                justify-content: flex-end;
                align-items: flex-end;
            }
            .base_sent > .avatar:after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 0;
                height: 0;
                border: 5px solid white;
                border-right-color: transparent;
                border-top-color: transparent;
                box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
            }

            .msg_sent > time{
                float: right;
            }



            .msg_container_base::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
            }

            .msg_container_base::-webkit-scrollbar
            {
                width: 12px;
                background-color: #F5F5F5;
            }

            .msg_container_base::-webkit-scrollbar-thumb
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                background-color: #555;
            }

            .btn-group.dropup{
                position:fixed;
                left:0px;
                bottom:0;
            }
        </style>

        <script>
            $(document).on('click', '.panel-heading span.icon_minim', function (e) {
                var $this = $(this);
                if (!$this.hasClass('panel-collapsed')) {
                    $this.parents('.panel').find('.panel-body').slideUp();
                    $this.addClass('panel-collapsed');
                    $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
                } else {
                    $this.parents('.panel').find('.panel-body').slideDown();
                    $this.removeClass('panel-collapsed');
                    $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
                }
            });
            $(document).on('focus', '.panel-footer input.chat_input', function (e) {
                var $this = $(this);
                if ($('#minim_chat_window').hasClass('panel-collapsed')) {
                    $this.parents('.panel').find('.panel-body').slideDown();
                    $('#minim_chat_window').removeClass('panel-collapsed');
                    $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
                }
            });
            $(document).on('click', '#new_chat', function (e) {
                var size = $( ".chat-window:last-child" ).css("margin-left");
                size_total = parseInt(size) + 400;
                alert(size_total);
                var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
                clone.css("margin-left", size_total);
            });
            $(document).on('click', '.icon_close', function (e) {
                //$(this).parent().parent().parent().parent().remove();
                $( "#chat_window_1" ).remove();
            });

        </script>
        -->
@endsection

@section('before-after-js'),,@endsection
