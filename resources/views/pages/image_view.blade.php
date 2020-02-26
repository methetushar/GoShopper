<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image View</title>
    <style>
        .div {
            height: 650px;
            width: 922px;
            margin: 0 auto;
            
        }
        .div img {
        cursor: zoom-out;
        height: 100%;
        margin: 0 132px;
    }

    </style>
</head>
<body>
    <div class="div">
        @foreach($select_image as $image)
        <a href="{{url('/product_list')}}">
            <img src="../{{$image->product_image}}" alt="">
        </a>
        @endforeach
    </div>
</body>
</html>