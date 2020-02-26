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

<div class="container my-5">
    <div class="row">
        <div class="col-md-9 m-auto ">
            <div class="jumbotron">
                <div class="col-md-8 m-auto">
                    <h2>Thanks </h2>
                    <h3>Your payment has been successful ! <i class="fa fa-smile text-warning"></i></h3>
                    <small>We will contact to you! as soon as possible!</small><br>
                    <a href="{{url('/user-panel')}}" class="btn btn-default">__Back__</a>
                </div>
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

