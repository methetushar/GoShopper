<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>

        .container {
            margin: 0 auto;
            padding: 20px;
            width: 64%;
            border:1px solid #555;
        }
        table {
            border-collapse: collapse;
        }
        .table thead th {
            vertical-align: bottom;
            border: 2px solid #dee2e6;
        }
        .table tbody td {
            vertical-align: bottom;
            border: 2px solid #dee2e6;
        }
        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        th {
            text-align: inherit;
        }
        .table-bordered {
            border: 1px solid #45ff02;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
        }
        .left_div {
            height: 67px;
            width: 62%;
            background: #f11962;
            float: left;
            color: aliceblue;
            text-align: left;
            padding-left: 20px;
        }

        @media (max-width: 1024px) {
            .left_div {
                height: 67px;
                width: 55%;
                background: #f11962;
                float: left;
                color: aliceblue;
                text-align: left;
                padding-left: 20px;
            }
            .right_div {
                background: #0c1e52;
                width: 32%;
                height: 67px;
                float: left;
                clip-path: polygon(10% 0,100% 0,100% 100%,0 100%);
                color: red;
                text-align: center;
            }
        }
        .right_div {
            background: #0c1e52;
            width: 32%;
            height: 67px;
            float: left;
            clip-path: polygon(10% 0,100% 0,100% 100%,0 100%);
            color: red;
            text-align: center;
        }
        strong {
            font-size: 25px;
            padding: 24px;
            color: red;
        }
        p {
            font-size: 18px;
            padding: 0px 20px;
            color: #0c1e52;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="">
            <div class="left_div">
                <h2>Thanks for shopping here</h2>
            </div>
            <div class="right_div">
                <h2>Go Shopper</h2>
            </div>
        </div>
        <div class="">
            @foreach ($customer_data as $data)
                <strong>Dear, {{$data->customer_name}}</strong>
                <p>You have ordered the product below from Go-shopper, <b>Your order has been confirm!</b></p>
            @endforeach
        </div>
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
            </thead>
            @foreach ($product_data as $padata)
            <tbody>
                <tr>
                    <td>
                        <p>{{$padata->product_name}}</p>
                    </td>
                    <td>{{$padata->product_quantity}}</td>
                    <td>{{$padata->product_price}}</td>
                </tr>
            </tbody>
           @endforeach
        </table>
        <div class="">
               @foreach ($product_data as $pdata)
                <h4>Product Received Location : {{$pdata->receiver_location}}</h4>
               @endforeach


        </div>
    </div>
</body>
</html>
