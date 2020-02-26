<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">
        <title>
            User || Dashboard
        </title>
        <!-- Favicon -->
        <link href="{{asset('dashboardCss/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{asset('dashboardCss/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
        <link href="{{asset('dashboardCss/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}"
            rel="stylesheet" />
        <!-- CSS Files -->
        <link href="{{asset('dashboardCss/assets/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
        <link href="{{asset('dashboardCss/assets/css/costom.css')}}" rel="stylesheet" />



        <style>
            .bg_margin {
                margin-top: 120px;
            }

            .btn-warning {
                color: #fff;
                background-color: #f71100;
                border-color: #fb6340;
                box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            }

            .btn {
                display: inline-block;
                font-weight: 600;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                user-select: none;
                border: 0px solid transparent;
                padding: 5px 42px;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: 0px;
            }

            .form-control {
                display: block;
                width: 100%;
                font-size: 13px;
                line-height: 1.5;
                background-color: #fff;
                background-clip: padding-box;
                border: 0px solid #cad1d7;
                border-radius: 0px;
                box-shadow: none;
                transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                color: black !important;
            }

            .icon_header i {
                position: relative;
                left: 443px;
                border-right: 1px solid #d4d4d4;
                margin-right: -1px;
                padding: 3px 13px;
                color: #3fff00;
            }

            .icon_header {
                background: #a7a7a7;
            }

            .input-group i {
                position: absolute;
                right: 6px;
                bottom: 10px;
                color: #0f3e6773;
            }
        strong {
            margin-left: 20px;
            padding: 5px;
            color: #fffdf9;
        }

        </style>
    </head>

    <body>
        <div class="container bg_margin">
            <div class="row">
                <div class="col-md-5 m-auto">
                    <div class="header">
                        <div class="p-4">
                            @if(session('incorrect'))
                                <p class="text-danger">
                                    {{session('incorrect')}}
                                </p>
                            @endif
                            @if(session('message'))
                                <p class="text-success">
                                    {{session('message')}}
                                </p>
                            @endif
                            <form action="{{url('/login')}}" method="post">
                                @csrf
                                <?php
                                    $username= DB::table('administration')->first();
                                    ?>
                                @if(!$username)
                                <div class="form-group">
                                    <div class="input-group">
                                    <input type="text"class="form-control
                                            form-control-sm"
                                            name="administrator_name"
                                            placeholder   =  "Enter Administator name"
                                                required>
                                        <i class="ni ni-single-02"></i>
                                    </div>
                                </div>
                                @endif


                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control
                                                form-control-sm" placeholder="Enter E-mail" name="administrator_email">
                                        <i class="ni ni-email-83"></i>

                                    </div>
                                    @if(session('email'))
                                        <p class="text-danger">
                                            {{session('email')}}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control
                                                form-control-sm" placeholder="Enter Password"
                                            name="administrator_password">
                                        <i class="ni ni-bulb-61"></i>

                                    </div>
                                    @if(session('password'))
                                        <p class="text-danger">
                                            {{session('password')}}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn
                                            btn-warning">Login</button>
                                </div>
                            </form>
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
        </script>
    </body>

</html>
