<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Go-Buy</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/js/jquery.min.js')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> goshop2417@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="facebook.com"><i class="fa fa-facebook text-primary"></i></a></li>
                            <li><a href="twitter.com"><i class="fa fa-twitter text-info"></i></a></li>
                            <li><a href="linkedin.com"><i class="fa fa-linkedin text-info"></i></a></li>
                            <li><a href="google.com"><i class="fa fa-google-plus text-danger"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}">
                            <b>Go</b>-<span style="font-size: 18px">Buy</span>
{{--                            <img src="{{asset('frontend/images/home/go.png')}}" alt="" />--}}
                            <i class="la la-houzz la-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-5">
                        <form action="">
                            <div class="search_box pull-right">
                                <div class="input-group">
                                    <input type="text" placeholder="Type keyword"/>
                                    <button class="btn btn-default">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                @if(Session::get('customer'))
                                    <a href="{{url('/bill_to_ui')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                @else
                                    <a href="{{url('/login_register_ui')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                @endif
                            </li>
                            <li>
                                <a href="{{url('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                            </li>
                            </li>
                            <li>
                                @if(Session::get('customer'))
                                    <a href="{{url('/user-panel')}}"><i class="fa fa-user"></i> Account</a>
                                @else
                                    <a href="{{url('/user-login')}}"><i class="fa fa-lock"></i> Login</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class=" pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}" class="active">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/shop')}}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                            <li><a class="nav-link" href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
