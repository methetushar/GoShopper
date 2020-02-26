@extends('admin.dashboard_layout')

@section('dashboard_content')
    <div class="container mt-2 text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header bg-default py-1 text-light">
                            <h4 class="text-white "><i class="la la-user"></i> | Customer details</h4>
                        </div>
                        <div class="card card-body bg-white">
                            <table class="table table">
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Customer name</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                @foreach($shopper_details as $data)
                                <tbody>
                                    <tr>
                                        <td>{{$data->customer_id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                </tbody>
                                 @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- shipping details -->
                    <div class="col-md-6">
                        <div class="card-header bg-default py-1 text-light">
                            <h4 class="text-white "><i class="la la-shopping-cart"></i> | Shipping details</h4>
                        </div>
                        <div class="card card-body bg-white  ">
                            <table class="table table">
                                <thead>
                                <tr>
                                    <th>Receiver Name</th>
                                    <th>Received Location</th>
                                    <th>Receiver Mobile</th>
                                </tr>
                                </thead>
                                @foreach($shopper_details as $data)
                                <tbody>
                                <tr>
                                    <td>{{$data->product_receiver_name}}</td>
                                    <td>{{$data->product_received_location}}</td>
                                    <td>{{$data->product_receiver_phone}}</td>
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card-header bg-default py-1 text-light">
                            <h4 class="text-white "><i class="la la-shopping-cart"></i> <i class="la la-outdent"></i> | Product Primary details</h4>
                        </div>
                        <div class="card card-body bg-white">
                            <table class="table table text-center ">
                                <thead>
                                <tr>
                                    <th width="3%">Product Id</th>
                                    <th>Product name</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Total amount </th>
                                </tr>
                                </thead>
                                @foreach($product_details as $data)
                                <tbody>
                                <tr>
                                    <td>{{$data->product_id}}</td>
                                    <td>{{$data->product_name}}</td>
                                    <td>{{$data->product_price}}</td>
                                    <td>{{$data->product_quantity}}</td>
                                    <td>{{$data->product_total_price}}</td>
                                </tr>
                                </tbody>
                                 @endforeach
                            </table>
                        </div>

                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card-header bg-default py-1 text-light">
                            <h4 class="text-white "><i class="la la-shopping-cart"></i> <i class="la la-outdent"></i> | Product Secondary details</h4>
                        </div>
                        <div class="card card-body bg-white">
                            <table class="table table text-center ">
                                <thead>
                                <tr>
                                    <th >Product</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                @foreach($product_details as $data)
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/{{$data->product_image}}" height="50px" width="50px" alt="">
                                        </td>
                                        <td>{{$data->product_size}}</td>
                                        <td>{{$data->product_color}}</td>
                                        <td>
                                            @if ($data->order_status == 0)
                                                <a href="{{url('/pending',[$data->id])}}" >
                                                    <button class="btn btn-info btn-sm pending_btn" data-toggle="tooltip" data-placement="top" title="Pending">
                                                        <i class="fa fa-spinner"></i>
                                                    </button>
                                                </a>
                                            @elseif ($data->order_status == 1)
                                                <a href="{{url('/working',[$data->id])}}" >
                                                    <button class="btn btn-warning btn-sm pending_btn"data-toggle="tooltip" data-placement="top" title="Working">
                                                        <i class="fa fa-life-ring"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <a href="">
                                                    <button class="btn btn-success btn-sm pending_btn" data-toggle="tooltip" data-placement="top" title="Delivered Success">
                                                        <i class="fa fa-check-circle"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
