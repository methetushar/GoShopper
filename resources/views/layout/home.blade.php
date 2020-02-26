@include('pages.header')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <?php
                    $select = DB::table('slider')->get();
                    ?>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>GO</span>-Buy</h1>
                                <h2></h2>
                                <p>Welcome to your ultimate PayPal Credit review for 2019. If you've been looking for an interest-low business loan, you probably know your options are pretty</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontend/images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>
                        @foreach ($select as $image)
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>GO</span>-Buy</h1>
                                    <h2>ONLINE BUSINESS</h2>
                                    <p>Running an online business and updates to Shopify's ecommerce community.</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset($image->image_name)}}" class="girl img-responsive" alt="" />
                                    <img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <!--category-productsr-->
                    <div class="panel-group category-products" id="accordian">
                        <?php
                        $categorys = DB::table('category')->where('publish_status',1)->get();
                        ?>
                        <a href="{{url('/')}}" class="btn btn-info btn-block">All products</a>
                        @foreach($categorys as $single_category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{url('show_product_by_categoryId',[$single_category->id])}}">
                                            {{$single_category->name}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--/category-products -->



                    <!--brands_products-->
                    <div class="brands_products">
                        <h2>Brands</h2>
                        <?php
                        $brands = DB::table('brand')->where('publish_status',1)->get();
                        ?>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brands as $brand)
                                    <li><a href="#"> <span class="pull-right">({{$brand->quantity}})</span>{{$brand->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--/brands_products-->

                    <!--price-range-->
                    <div class="price-range">
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0"
                                   data-slider-max="600" data-slider-step="5"
                                   data-slider-value="[250,450]" id="sl2"><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9 padding-right">
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

                        <div class="col-sm-4" style="">
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

            </div><!--features_items-->

        </div>
    </div>
    </div>
</section>

@include('pages.footer')

