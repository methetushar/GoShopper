<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Go-buy</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

    {{--    form wizard link--}}
    <link rel="stylesheet" href="{{asset('form_wizard/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('form_wizard/css/style.css')}}">


</head>

<body>
<div class="icon py-5">
    <span ><b>Go</b>-Buy</span>
    <i class="la la-houzz la-2x"></i>
</div>

<div class="container " style="padding-top:100px;">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Shopper Information</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Bill To</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Confirm</p>
            </div>
        </div>
    </div>

    <div class="container">
    <form role="form" action="{{url('/shopper_info')}}" method="post">
        @csrf
        <div class="row setup-content" id="step-1">
           <div class="col-md-5 ">
               <?php
                    if (Session::get('customer')){
                        $user_data =  Session::get('customer');

                        $get_data = DB::table('customer_register')->where('customer_email',$user_data)->get();

                    }

               ?>
               @foreach ($get_data as $data)
                    <div class="customer_info">
                        <input type="text"
                               value="{{$data->customer_name}}"
                               required class="customer_info"
                               placeholder="Full name"
                               name="shopper_name"
                        >
                    </div>
                   <div class="customer_info">
                       <input type="text"
                              required class="customer_info"
                              value="{{$data->customer_email}}"
                              placeholder="Email address"
                              name="shopper_email"
                       >
                   </div>
                   @endforeach
                   <div class="customer_info">
                       <input type="password"
                              name="shopper_password"
                              required class="customer_info"
                              placeholder="Password"
                              name="shopper_password"
                       >
                   </div>
                        <button class="btn btn-next nextBtn btn-lg pull-right" type="button" >Next</button>

                </div>
           </div>
        <div class="row setup-content" id="step-2">
            <div class="col-md-5 ">
                <div class="customer_info">
                    <input type="text"
                           required class="customer_info"
                           name="shopper_address"
                           placeholder="Address"
                    >
                </div>
                <div class="customer_info">
                    <input type="text"
                           name="receiver_name"
                           placeholder="Product receiver name"
                           required="required" class="customer_info"
                    >
                </div>
                <div class="customer_info">
                    <input type="text"
                           name="location"
                           placeholder="Received location"
                           required class="customer_info"
                    >
                </div>

                <div class="customer_info">
                    <select name="city" class="customer_info" type="text" required >
                        <option disabled selected>Select your city</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Comilla">Comilla</option>
                        <option value="Narayanganj">Narayanganj</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Bogra">Bogra</option>
                        <option value="Kushtia">Kushtia</option>
                        <option value="Jessore">Jessore</option>
                        <option value="Brahmanbaria">Brahmanbaria</option>
                        <option value="Dinajpur">Dinajpur</option>
                        <option value="Pabna">Pabna</option>
                        <option value="Nawabganj">Nawabganj</option>
                        <option value="Meherpur">Meherpur</option>
                        <option value="Satkhira">Satkhira</option>
                        <option value="Bagerhat">Bagerhat</option>
                    </select>
                </div>
                <div class="customer_info">
                    <input type="text"
                           name="zip_code"
                           placeholder="Zip / Postal code"
                           required class="customer_info"
                    >
                </div>
                <div class="customer_info">
                    <input type="text"
                           name="shopper_phone"
                           placeholder="Phone"
                           required class="customer_info"
                    >
                </div>
                <div class="customer_info">
                    <input type="text"
                           name="receiver_phone"
                           placeholder="Receiver Phone"
                           required class="customer_info"
                    >
                </div>

                    <button class="btn btn-next nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-md-5">
                <div class="customer_info" style="margin-left: 30px;">

                    <span><input type="checkbox" required name="check_confirm" class="customer_info"> I agree with shopper informations and  call me before sel product</span>
                    <p></p>
                    <button class="btn btn-next nextBtn btn-lg">Confirm</button>
                </div>
            </div>
        </div>
    </form>
    </div>

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













