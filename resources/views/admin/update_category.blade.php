@extends('admin.dashboard_layout')

@section('dashboard_content')
<div class="container">
    <div class="col-md-9 m-auto">
        <div class="card card-body border border-primary mt-5">
            
            <form action="{{url('/update_category')}}" method="post">
            @csrf
                @foreach($edit_category_data as $data)
                <input name="id" type="text" value="{{$data->id}}" style="display: none;" class="form-control">

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="category_descrip">Category Description</label>
                    <input name="descrip" type="text" value="{{$data->description}}" class="form-control form-control-md"
                        id="category_descrip" >
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
