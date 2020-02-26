<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        User || Dashboard
    </title>
    <!-- Favicon -->
    <link href="{{asset('dashboardCss/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('dashboardCss/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboardCss/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{asset('dashboardCss/assets/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
    <link href="{{asset('dashboardCss/assets/css/costom.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend/css/line-awesome.min.css')}}">
</head>
<body>
   <div class="container">
       <div class="row">
               <div class="col-md-12 py-4">
                   <h2>Thanks dear customer</h2>
                   <h4>You have order some product from our website. now follow the instruction and complete the steps to confirm payment </h4>
               </div>

           <div class="col-md-2 step">
               <span>Step 1</span>
               <div class="body_step1">
                   <h2>*247#</h2>
               </div>
               <small>Dial *247# on your bKash activated mobile phone</small>
           </div>
           <div class="col-md-1 arrow">
               <img src="{{asset('frontend/images/home/bkash.png')}}">
           </div>
           <div class="col-md-2 step">
               <span>Step 2</span>
               <div class="body_step2">
                   <h5>1.Send Money</h5>
                   <h5>2.Buy Airtime</h5>
                   <h4>3.Payment</h4>
                   <h5>4.Cash out</h5>
                   <h5>5.My bKash</h5>
                   <h5>5.Helpline</h5>
                   <span>3</span>
               </div>
               <small>Dial *247# on your bKash activated mobile phone</small>
           </div>
           <div class="col-md-1 arrow">
               <img src="{{asset('frontend/images/home/bkash.png')}}">
           </div>
           <div class="col-md-2 step">
               <span>Step 3</span>
               <div class="body_step3">
                   <h2>Enter Merchant bkash Account No:</h2>
                   <span>01700000000</span>
               </div>
               <small>Give Our bkash Number 01700000000</small>
           </div>
           <div class="col-md-1 arrow">
               <img src="{{asset('frontend/images/home/bkash.png')}}">
           </div>
           <div class="col-md-2 step">
               <span>Step 4</span>
               <div class="body_step4">
                   <h2>Enter Amount</h2>
                   <span>##### tk</span>
               </div>
               <small>Enter Amount</small>
           </div>
           <div class="col-md-1 arrow">
               <img src="{{asset('frontend/images/home/bkash.png')}}">
           </div>
           <div class="col-md-2 step">
               <span>Step 5</span>
               <div class="body_step5">
                   <h2>Enter Counter No: 1</h2>
                   <span>1</span>
               </div>
               <small>Press '1' to proceed</small>
           </div>
           <div class="col-md-1 arrow">
               <img src="{{asset('frontend/images/home/bkash.png')}}">
           </div>
           <div class="col-md-2 step">
               <span>Step 6</span>
               <div class="body_step6">
                   <h5>Payment</h5>
                   <h5>To: <b>0170000000</b></h5>
                   <h5>Amount: <b>##### tk</b></h5>
                   <h5>Center: <b>1</b></h5>
                   <h5>Enter PIN to confirm</h5>
                   <span>xxxxxx</span>
               </div>
               <small>Enter your bkash account PIN to confirm payment</small>
           </div>
           <div class="col-md-1 arrow">
               <img src="{{asset('frontend/images/home/bkash.png')}}">
           </div>
           <div class="col-md-5 step mt-4">
               <div class="body text-warning">
                   <h2 class="text-danger">Thanks for shopping here!</h2>
                   <small>We will contact to you! as soon as possible!</small><br>
                   <a href="{{url('/user-panel')}}" class="btn btn-danger">__Back__</a>
               </div>
           </div>
       </div>
   </div>


<!--   Core   -->
<script src="{{asset('dashboardCss/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('dashboardCss/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!--   Optional JS   -->
<script src="{{asset('dashboardCss/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('dashboardCss/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
<!--   Argon JS   -->
<script src="{{asset('dashboardCss/assets/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
    TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
</body>

</html>
