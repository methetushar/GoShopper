@include('pages.header')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('payment/card/tree.gif')}}" alt="">
        </div>
        <div class="col-md-6 ">
            <div class="card card-body ">
                <h2 class="text-center">Choice your payment method</h2>
                <hr>
                <div class="payment_details border mt-5">
                    <form action="{{url('/payment-register')}}" method="post">
                        @csrf
                        <ul class="payment_method">
                            <li>
                                <input type="radio" name="payment" value="cash_on_delivery" id="cash_on_delivery">
                                <label for="cash_on_delivery">
                                    <img src="{{url('payment/card/cash_on_delivery.png')}}" alt="">
                                    <span>Cash on delivery</span>
                                </label>
                            </li>
                            <li>
                                <input type="radio" name="payment" value="bkash" id="bkash">
                                <label for="bkash">
                                    <img src="{{url('payment/card/bkash.jpg')}}" alt="">
                                    <span>Bkash</span>
                                </label>
                            </li>
                            <li>
                                <input type="radio" name="payment" value="online_payment" id="online_payment">
                                <label for="online_payment">
                                    <img src="{{url('payment/card/online-payment.jpg')}}" alt="">
                                    <span>Online Payment</span>
                                </label>
                            </li>
                        </ul>

                        <button class="btn btn-custom">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.footer')
