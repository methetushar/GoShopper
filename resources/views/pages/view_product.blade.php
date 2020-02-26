@extends('main_layout')
@section('content')
    <div class="container">
    <div class="col-sm-12 ">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                @foreach($select_from_product as $single_product)
                <div class="view-product">
                    <img src="{{asset($single_product->product_image)}}" alt="">
                </div>
                    <div class="col-md-4">
                        <a href="" data-toggle="modal" data-target="#exampleModal">
                            <img src="{{asset($single_product->product_image)}}" width="50px"  style="cursor:zoom-in" alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" data-toggle="modal" data-target="#exampleModal">
                            <img src="{{asset($single_product->product_image)}}" width="50px"  style="cursor:zoom-in" alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" data-toggle="modal" data-target="#exampleModal">
                            <img src="{{asset($single_product->product_image)}}" width="50px"  style="cursor:zoom-in" alt="">
                        </a>
                    </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{$single_product->product_name}}</h2>
                    <table class="">
                        <tr class="product_info">
                            <th>
                                <li><b>Price </b></li>
                            </th>
                            <td>:</td>
                            <td>{{$single_product->product_price}} Tk</td>
                        </tr>
                        <tr>
                            <th>
                                <li><b>Product id </b></li>
                            </th>
                            <td>:</td>
                            <td>{{$single_product->id}}</td>
                        </tr>
                        <tr>
                            <th>
                                <li><b>Status </b></li>
                            </th>
                            <td>:</td>
                            <td>@if($single_product->publication_status == 1)
                                    In Stock
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <li><b>Condition</b></li>
                            </th>
                            <td>:</td>
                            <td>New</td>
                        </tr>
                        <tr>
                            <th>
                                <li><b>Brand </b></li>
                            </th>
                            <td>:</td>
                            <td>{{$single_product->brand_id}}</td>
                        </tr>
                    </table>
                    <br>
                    <p>
                        <a href="#view_more" class="">View More info</a>
                    </p>
                    <small>Rating:</small> <img src="{{asset('frontend/images/product-details/rating.png')}}" alt=""><br><br>
                    <form action="{{url('/show_add_cart')}}" id="form_id" name="quantity_form" method="post">
                        @csrf
                        <span class="custom_btn"> - </span>
                        <input type="hidden" value="{{$single_product->id}}" name="product_id">
                        <input type="text"
                               value="1"
                               class="input_style"
                               name="quantity"
                               id="input_quantity"
                        >
                        <span class="custom_btn"> + </span>
                        <button type="submit" class="btn btn-order ">
                            <i class="fa fa-shopping-cart"></i> Order  Now
                        </button>

                        <div class="other_item">
                            <span><i class="fa fa-share"></i></span>
                            <span><i class="fa fa-heart-o"></i></span>
                            <span><i class="fa fa-print"></i></span>
                        </div>
                    </form>


                </div><!--/product-information-->
                <div class="share">
                    <strong>SHARE -></strong>
                    <li class="facebook">
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="linkedin">
                        <a href=""><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li class="twitter">
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="google">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </li>

                </div>
            </div>

        </div><!--/product-details-->

        <div class="col-md-8" id="view_more">
            <div class="col-md-12 header">
                <h4>Details of Product</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: right;background: #d6d6d6"><b>Product Details  </b></th>
                        <td>{{$single_product->product_short_descrip}}</td>
                    </tr>
                    <tr>
                        <th style="text-align: right;background: #d6d6d6"><b>Product Color  </b></th>
                        <td>{{$single_product->product_color}}</td>
                    </tr>
                    <tr>
                        <th style="text-align: right;background: #d6d6d6"><b>Product Description  </b></th>
                        <td>{{$single_product->product_long_descrip}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-4">
            <div class="col-md-12 header">
                <h4>Related Product</h4>
            </div>
            <div class="col-md-12">
            <a href="">
                <div class="col-md-4">
                    <img src="{{asset($single_product->product_image)}}" width="50px"  style="cursor:zoom-in" alt="">
                </div>
                <div class="col-md-8">
                    <p>{{$single_product->product_name}}</p>
                    <span>{{$single_product->product_price}}</span>
                </div>
            </a>
            </div>
            <div class="col-md-12">
            <a href="">
                <div class="col-md-4">
                    <img src="{{asset($single_product->product_image)}}" width="50px"  style="cursor:zoom-in" alt="">
                </div>
                <div class="col-md-8">
                    <p>{{$single_product->product_name}}</p>
                    <span>{{$single_product->product_price}}</span>
                </div>
            </a>
            </div>
             <div class="col-md-12">
            <a href="">
                <div class="col-md-4">
                    <img src="{{asset($single_product->product_image)}}" width="50px"   style="cursor:zoom-in" alt="">
                </div>
                <div class="col-md-8">
                    <p>{{$single_product->product_name}}</p>
                    <span>{{$single_product->product_price}}</span>
                </div>
            </a>
             </div>
        </div>
        <br><br>
        @endforeach



    </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center">
                    @foreach($select_from_product as $single_product)
                        <img src="{{asset($single_product->product_image)}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop

<script type="text/javascript">
    $(document).ready(function(){
        $("#plus").click(function(){
            $("#text").text("Hello world!");
        });
    })

</script>
