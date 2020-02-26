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

<section id="form">
    <div class="icon">
        <span ><b>Go</b>-Buy</span>
        <i class="la la-houzz la-2x"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="login-form">
                    <h2>Login to your account</h2>
                    <span style="color: red;">
                        @if(session('not-match'))
                            {{session('not-match')}}
                        @endif
                    </span>
                    <form action="{{url('/customer_login')}}" method="post">
                        @csrf
                        <input type="email" name="customer_email" placeholder="Email Address">
                        <span style="color: red;">
                            @if(session('email'))
                                {{session('email')}}
                            @endif
                        </span>
                        <input type="password" name="customer_password" placeholder="Password">
                        <span style="color: red;">
                            @if(session('password'))
                                {{session('password')}}
                            @endif
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">

                    <h2>New User Signup!</h2>
                    <span class="mb-3 text-danger">
                        @if (session('email_already_used'))
                            {{session('email_already_used')}}
                        @endif
                    </span>
                    <form action="{{url('/customer_register')}}" method="post">
                        @csrf
                        <input type="text" name="customer_name" placeholder="Full name">
                        <span style="color: red;">
                            @if(session('name'))
                                {{session('name')}}
                            @endif
                        </span>
                        <input type="email" name="customer_email" placeholder="Email Address">
                        <span style="color: red;">
                            @if(session('register_email'))
                                {{session('register_email')}}
                            @endif
                        </span>
                        <small>Please enter a validate email we are send order confirm to the email</small>
                        <input type="password" name="customer_password" placeholder="Password">
                        <span style="color: red;">
                            @if(session('register_password'))
                                {{session('register_password')}}
                            @endif
                        </span>
                        <input type="phone" name="customer_number" placeholder="+880">
                        <span style="color: red;">
                            @if(session('number'))
                                {{session('number')}}
                                @elseif (session('number_not_valid'))
                                    {{session('number_not_valid')}}
                            @endif
                        </span>
                        <button type="submit" class="btn btn-default">Sign up</button>
                    </form>
                </div>
        </div>
    </div>
</section>

{{--form wizard link--}}
<script src="{{asset('form_wizard/js/jquery.min.js')}}"></script>
<script src="{{asset('form_wizard/js/bootstrap.min.js')}}"></script>

<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>


</body>
</html>


<script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            // e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-submited');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='select'],input[type='url'],input[type='password'],input[type='email']"),
                isValid = true;

            $(".customer_info").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".customer_info").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>
