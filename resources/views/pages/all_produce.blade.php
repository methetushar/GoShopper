@include('pages.header');
<div class="container">
<div class="col-sm-12 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <?php
        $product_data = DB::table('product')->where(['publication_status'=> 1])->get();

        foreach ($product_data as $data){
//                echo $data->brand_id;
//                $brand = DB::table('brand')->where()->get();
        }



        ?>
        @foreach($product_data as $product)

            <div class="col-sm-3" style="">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo">
                            <a href="{{url('/view_product_id',[$product->id])}}" class="btn btn-default add-to-cart">
                                <img
                                    src="{{$product->product_image}}"
                                    alt=""
                                />
                            </a>
                            <div class="pandh">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h6>{{$product->product_name}}</h6>
                                        <h4><b>Tk {{$product->product_price}}</b></h4>
                                    </div>
                                    {{--                                                    <div class="col-md-4">--}}
                                    {{--                                                        <a href="" class="text-danger"><i class="la la-heart"></i></a>--}}
                                    {{--                                                        <a href="" class="text-success"><i class="la la-share"></i></a>--}}
                                    {{--                                                    </div>--}}
                                </div>
                                <img src="{{asset('frontend/images/product-details/rating.png')}}" alt=""><small> (3)</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>
</div>
@include('pages.footer');
