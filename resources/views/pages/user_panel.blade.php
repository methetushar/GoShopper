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

<body class="">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (Session::get('customer')){
                                $user_value = Session::get('customer');
                                $select_user_data = DB::table('customer_register')->where('customer_email', $user_value)->get();
                                foreach ($select_user_data as $user_data){
                                    $customer_id = $user_data->customer_id;

                                    $select_product = DB::table('customer_register')->where('customer_id',$customer_id)->get();

                                }

                            }
                            ?>
                            @foreach($select_product as $data)
                            <h3>Name: {{$data->customer_name}}</h3>
                            <li><b>Customer ID</b> : {{$data->customer_id}}</li>
                            <li><b>Mobile</b> : {{$data->customer_number}}</li>
                                @endforeach
                            <div class="my-3">
                                <a href="{{url('/customer_logout')}}" class="btn btn-default btn-sm "><i class="fa fa-unlock"></i> Logout</a>
                                <a href="{{url('/')}}" class="btn btn-default btn-sm"><i class="fa fa-home"></i> __Home__</a>
                            </div>
                        </div>
                        <div class="col-md-6 user_img">
                            <img src="{{asset('frontend/images/home/User.png')}}" alt="no image">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Order details</h4>

                        <table class="table table-bordered   text-center">

                            <thead >
                            <tr class="bg-default text-white">
                                <td>Product</td>
                                <td>Price</td>
                                <td>Size</td>
                                <td>Color</td>
                                <td>Quantity</td>
                                <td>Total amount</td>
                                <td>Delivery</td>
                                <td>Order</td>
                            </tr>
                            </thead>
                            <?php
                            if (Session::get('customer')){
                                $user = Session::get('customer');
                                $select_user = DB::table('customer_register')->where('customer_email', $user)->get();


                                foreach ($select_user as $user_data){
                                    $user_id = $user_data->customer_id;

                                    $select_product = DB::table('product_order')->where('customer_id',$user_id)->get();

                                }

                            }
                            ?>

                            <tbody>
                            @foreach($select_product as $data)

                                <tr class="tr">
                                    <td>
                                        <img src="{{$data->product_image}}" height="90px" width="80px" alt="">
                                        <p>{{$data->product_name}}</p>
                                    </td>
                                    <td>{{$data->product_price}} tk</td>
                                    <td>{{$data->product_size}}</td>
                                    <td>{{$data->product_color}}</td>
                                    <td>{{$data->product_quantity}}</td>
                                    <td>{{$data->product_total_price}} tk</td>
                                    <td >
                                        @if ($data->order_status == 0)
                                            <span class="btn btn-warning btn-sm">Processing <i class="li li-reload"></i></span>
                                        @elseif ($data->order_status == 1)
                                            <span class="btn btn-info btn-sm">Working <i class="li la-circle"></i></span>
                                        @else
                                            <span class="btn btn-success btn-sm">Success <i class="la la-check"></i></span>
                                        @endif
                                    </td>
                                    <td ><span>{{$data->created_at}}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

