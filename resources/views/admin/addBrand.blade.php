@extends('admin.dashboard_layout')

@section('dashboard_content')
<div class="container">
    <div class="col-md-9 m-auto">
        <div class="card card-header mt-5 bg-secondary border border-primary">
            <h3 class="">Add Brand </h3>
        </div>
        <div class="card card-body border border-primary">

            <form action="{{url('/add_brabd')}}" method="post">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif

            @if(Session::has('message'))
                <p class="bg-success">Brand Creation Success</p>
            @endif
                <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input name="name" type="text" class="form-control form-control-md" id="name"
                        placeholder="Brand name">
                </div>
                <div class="form-group">
                    <label for="Brand_descrip">Brand Description</label>
                    <input name="descrip" type="text" class="form-control form-control-md"
                        id="Brand_descrip" placeholder="Brand description">
                </div>
                <div class="form-group">
                    <div class="row">
                    <label for="quantity" class="col-md-2 mt-2 text-left">Quantity</label>
                    <input name="quantity" type="number" class="form-control col-md-4"
                        id="quantity" placeholder="Brand quantity">
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" value="1"  name="publish_status" id="check">
                    <label for="check">Publish Status</label>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
