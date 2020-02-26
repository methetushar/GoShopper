
@extends('admin.dashboard_layout')

@section('dashboard_content')
    <div class="container-fluid">
        <div class="row">
                <table class="table table-bordered text-center">
                    <thead class="bg-default text-white">
                        <tr>
                            <td width="3%">Customer Id</td>
                            <td width="3%">Shipping Id </td>
                            <td width="3%">Payment Id</td>
                            <td width="3%">Total amount</td>
                            <td width="3%">Ordered</td>
                            <td width="3%"></td>
                        </tr>
                    </thead>
                    <?php
                        $select_table = DB::table('order_info')->get();
                    ?>
                    <tbody>
                        @foreach($select_table as  $data)
                        <tr class="text-center text-capitalize">
                            <td>{{$data->customer_id}}</td>
                            <td>{{$data->shipping_id}}</td>
                            <td>{{$data->payment_id}} </td>
                            <td>{{$data->total_amount}}</td>
                            <td>{{$data->created_at}}</td>


                            <td class="text-center">
                                <a href="{{url('view-order-page',[$data->customer_id])}}" class="btn btn-warning btn-sm"><i class="fa fa-folder-open"></i></a>
{{--                                @if ($data->order_status == 0)--}}
{{--                                    <a href="{{url('/pending',[$data->id])}}" class="btn btn-warning btn-sm pending_btn"> Pending</a><br><br>--}}
{{--                                @elseif ($data->order_status == 1)--}}
{{--                                    <a href="{{url('/working',[$data->id])}}" class="btn btn-info btn-sm pending_btn">Working</a><br><br>--}}
{{--                                @else--}}
{{--                                    <a href="" class="btn btn-success btn-sm disabled pending_btn">Success</a><br><br>--}}
{{--                                @endif--}}
                                <a href="" class="btn btn-default btn-sm draft_btn">Save to Draft</a>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop
