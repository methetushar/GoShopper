@extends('admin.dashboard_layout')

@section('dashboard_content')
<div class="container">
    <div class="col-md-9 m-auto">
        <div class="card card-body border border-primary mt-5">
            
            <form action="{{url('/update')}}" method="post">
            @csrf
                @foreach($edit_data as $data)
                <input name="id" type="text" value="{{$data->id}}" style="display: none;" class="form-control">

                <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="Brand_descrip">Brand Description</label>
                    <input name="descrip" type="text" value="{{$data->description}}" class="form-control form-control-md"
                        id="Brand_descrip" >
                </div>
                <div class="form-group">
                    <div class="row">
                    <label for="quantity" class="col-md-2 mt-2 text-left">Quantity</label>
                    <input name="quantity" type="number" value="{{$data->quantity}}" class="form-control col-md-4"
                        id="quantity">
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
