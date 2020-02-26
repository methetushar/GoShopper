@extends('admin.dashboard_layout')

@section('dashboard_content')
<div class="container">
    <div class="col-md-11 m-auto">
        <div class="card card-header  bg-secondary border border-primary">
            <h3 class="">Add Product </h3>
        </div>
        <div class="card card-body border border-primary">

            <form action="{{url('/update_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
                @endforeach
                @endif

                @if(Session::has('message'))
                <p class="bg-success"></p>
                @endif

                @foreach($edit_data as $data)

               
                <div class="form-group">
                    <input type="text" value="{{$data->id}}" name="id" style="display:none">
                    <label for="name">Product Name</label>
                    <input name="name" type="text" value="{{$data->product_name}}" class="form-control 
                        form-control-md" id="name" placeholder="Product name">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Product Category</label>
                            <?php
                                $category_data = DB::table('category')->get();
                                
                            ?>
                            <select name="category" id="category" class="form-control">
                                @foreach($category_data as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                <option selected disabled>Select Product Category</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="brand">Product Brand</label>
                            <?php
                                $brand_data = DB::table('brand')->get();
                                
                            ?>
                            <select name="brand" id="brand" class="form-control">
                            @foreach($brand_data as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                                <option selected disabled>Select Product Brand</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="long_descrip">Long Description</label>
                                <input type="text" name="long_descrip" value="{{$data->product_long_descrip}}" id="long_descrip" class="form-control" placeholder="Long description">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="short_descrip">Short Description</label>
                            <input type="text" name="short_descrip" id="short_descrip" value="{{$data->product_short_descrip}}" class="form-control" placeholder="Short description">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input name="price" type="text" value="{{$data->product_price}}" class="form-control
                                form-control-md" id="price" placeholder="Product price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color">Product Color</label>
                            <input name="color" type="text" value="{{$data->product_color}}" class="form-control
                                form-control-md" id="color" placeholder="Product Color">
                        </div>
                    </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="size">Product Size</label>
                        <input name="size" type="text" value="{{$data->product_size}}" class="form-control
                            form-control-md" id="size" placeholder="Product size">
                    </div>
                </div>
            </div>








                
                

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <span>Product image</span><br>
                            <input name="image" type="file" class="form-control
                                        form-control-md" id="image"  placeholder="Product image" style="display:none; ">
                            <label for="image"><img src="{{asset('frontend/image.png')}}" alt="" height="60px" width="60px"></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity" class="">Quantity</label>
                            <input name="quantity" type="number"  class="form-control" id="quantity"
                                placeholder="Product quantity">
                        </div>
                    </div>
                
                <div class="col-md-4 pt-5">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" value="1" name="publish_status" id="check">
                        <label for="check">Publish Status</label>
                    </div>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
</div>
</div>

@endsection