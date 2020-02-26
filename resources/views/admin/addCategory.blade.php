@extends('admin.dashboard_layout')

@section('dashboard_content')
<div class="container">
    <div class="col-md-9 m-auto">
        <div class="card card-header mt-5 bg-secondary">
            <h3 class="">Add Category </h3>
        </div>
        <div class="card card-body">

            <form action="{{url('/add_category')}}" method="post">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif

            @if(Session::has('message'))
                <p class="bg-success">Category Creation Success</p>
            @endif
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input name="name" type="text" class="form-control form-control-md" id="name"
                        placeholder="Category name">
                </div>
                <div class="form-group">
                    <label for="category_descrip">Category Description</label>
                    <input name="descrip" type="text" class="form-control form-control-md"
                        id="category_descrip" placeholder="Category description">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" value="1"  name="publish_status" id="check">
                    <label for="check">Publish Status</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
