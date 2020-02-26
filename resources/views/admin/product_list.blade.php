@extends('admin.dashboard_layout')
@section('dashboard_content')
<div class="container">
    <div class="p-2 mb-4" style="background: rgba(239, 239, 239, 0.48)">
        <span><i class="fa fa-home"></i> Home \ Table</span>
    </div>
    <div class="px-1" style="background: rgba(239, 239, 239, 0.48)">
        <div class="">
            <i class="fa fa-project-diagram p-3" style="border-right: 1px solid
                white;"></i>
            <span>Products </span>
        </div>
        <div class="card card-body" style="width:100%; display:block">
            <form action="">
                <div class="input-group">
                    <input type="text" name="" id="" class="form-control
                        form-control-sm col-md-4" placeholder="Search">
                    <button class="btn btn"><i class="fa fa-rocket"
                            style="position: relative;bottom: 3px;right: 1px;"></i></button>
                </div>
            </form>
            <table class="table table-bordered" style="background: rgba(236,
                236, 236, 0.36)">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col"> ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Brand ID</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach($allProduct as $product)
                <tbody>
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <th scope="row">{{$product->product_name}}</th>
                        <th scope="row">{{$product->category_id}}</th>
                        <th scope="row">{{$product->brand_id}}</th>
                        <th scope="row">{{$product->product_price}}</th>
                        <th scope="row">
                            <a href="{{url('/view_image',[$product->id])}}"
                                style="cursor:zoom-in">
                                <img src="{{$product->product_image}}" alt=""
                                height="60px" width="50px">
                            </a>
                        </th>
                        @if($product->publication_status == 1)
                        <th scope="row"><span class="text-green">Active</span></th>
                        @else
                        <th scope="row"><span class="text-danger">Unactive</span></th>
                        @endif

                        <td>
                            @if($product->publication_status == 1)
                            <a href="{{url('/active_product',[$product->id])}}"
                                class=""><span class="badge badge-success"><i
                                        class="fa fa-thumbs-up fa-2x"></i></span></a>
                            @else
                            <a href="{{url('/unactive_product',[$product->id])}}"
                                class=""><span class="badge badge-danger"><i
                                        class="fa fa-thumbs-down fa-2x"></i></span></a>
                            @endif
                            <a href="{{url('/edit_product',[$product->id])}}"
                                class=""><span class="badge badge-warning"><i
                                        class="fa fa-edit text-dark fa-2x"></i></span></a>
                            <a href="{{url('/delete_product',[$product->id])}}"
                                onclick="return deleletconfig()" class=""><span
                                    class="badge badge-danger"><i class="fa
                                        fa-trash fa-2x"></i></span></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

        </div>
    </div>
</div>


@endsection

<script>
    function deleletconfig(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       alert ("record deleted")
    }else{
        alert("Record Not Deleted")
    }
    return del;
    }
</script>