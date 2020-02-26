@extends('admin.dashboard_layout')
@section('dashboard_content')
<div class="container">
    <div class="py-5">
        <h2 class="text-center text-primary">All Brand here</h4>
    </div>
    <div class="card card-body">
        <table class="table table-border">
            <thead>
                <tr class="bg-success text-white">
                    <th scope="col">Brand ID</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Discription</th>
                    <th scope="col">Brand Quantity</th>
                    <th scope="col">Publish Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($allbrand as $brand)
            <tbody>
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <th scope="row">{{$brand->name}}</th>
                    <th scope="row">{{$brand->description}}</th>
                    <th scope="row">{{$brand->quantity}}</th>
                    @if($brand->publish_status == 1)
                        <th scope="row"><span class="text-green">Active</span></th>
                    @else
                        <th scope="row"><span class="text-danger">Unactive</span></th>
                    @endif

                    <td>
                    @if($brand->publish_status == 1)                        
                        <a href="{{url('/activeBrand',[$brand->id])}}" class=""><span class="badge badge-success"><i class="fa fa-thumbs-up fa-2x"></i></span></a>
                    @else 
                        <a href="{{url('/unactiveBrand',[$brand->id])}}" class=""><span class="badge badge-danger"><i class="fa fa-thumbs-down  fa-2x"></i></span></a>
                    @endif
                        <a href="{{url('/edit',[$brand->id])}}" class=""><span class="badge badge-warning"><i class="fa fa-edit text-dark fa-2x"></i></span></a>
                        <a  href="{{url('/delete_brand',[$brand->id])}}" onclick="return deleteConfirm()" class=""><span class="badge badge-danger"><i class="fa fa-trash fa-2x"></i></span></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>


@endsection

<script>
    function deleteConfirm(){
        var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       alert ("record deleted")
    }else{
        alert("Record Not Deleted")
    }
        return del;
    }
    
</script>