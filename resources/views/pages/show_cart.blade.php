@extends('main_layout')

@section('content')
    <div class="container">
    <section class="col-md-12" id="cart_items">
        <div class="">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>

            <?php
                $cart_data = Cart::content();
//                echo '<pre>';
//                print_r($cart_data);
//                echo '<pre>';
            ?>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td width="17%" class="image">Product</td>
                        <td class="name">Name</td>
                        <td class="quantity">Quantity</td>
                        <td class="price">Price</td>
                        <td class="total">Total</td>
                        <td class="action">Action</td>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($cart_data as $data)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{$data->options->image}}"  height="100px" width="100px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$data->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$data->price}} Tk</p>
                        </td>
                        <td class="cart_quantity " >
                            <div class="cart_quantity_button">
                                <form action="{{url('/update_quantity')}}" method="post">
                                    @csrf
                                    <input class="cart_quantity_input"
                                           type="text" name="quantity"
                                           value="{{$data->qty}}"
                                           autocomplete="off"
                                           size="2"
                                           id="incript"

                                    >
                                    <input type="hidden" name="rowId" value="{{$data->rowId}}">

                                    <button class="btn btn-info btn-sm mb-3" > <i class="fa fa-refresh"></i></button>
                                </form>

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$data->total}} Tk</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/remove_cart',[$data->rowId])}}">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </section>



<section class="col-md-12" id="do_action">
    <div class="">

        <div class="row">
            <div class="col-sm-12">
                <div class="total_area">

                    <ul>

                        <li>Cart Sub Total <span>{{Cart::subtotal()}} Tk</span></li>
                        <li>Eco Tax <span>{{Cart::tax()}} Tk</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{Cart::total()}} Tk</span></li>


                    </ul>
                    @if(Session::get('customer'))
                        <a class="btn btn-custom " href="{{url('/bill_to_ui')}}">Buy Now</a>
                    @else
                        <a class="btn btn-custom " href="{{url('/login_register_ui')}}">Buy Now</a>
                    @endif
                    <a class="btn  update" href="{{url('/')}}">Continue shopping</a>

                </div>
            </div>
        </div>
    </div>
</section>
    </div>
@stop

