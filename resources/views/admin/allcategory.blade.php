@extends('admin.dashboard_layout')
@section('dashboard_content')
<div class="container">
    <div class="card card-body overflow-auto">
        <table class="table table-border">
            <thead>
            <div class="bg-info  text-white shadow-lg p-2  bg-blue rounded" style="background: linear-gradient(45deg, #040f61, transparent);">

                <a class="nav-link text-white " href="{{url('/addCategory')}}">
                    <i class="fa fa-plus-circle  text-white ml-auto shadow-lg"></i>
                </a>
            </div>
                <tr class="bg-info text-white">
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Discription</th>
                    <th scope="col">Publish Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($data as $category)
            <tbody>
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <th scope="row">{{$category->name}}</th>
                    <th scope="row">{{$category->description}}</th>
                    @if($category->publish_status == 1)
                        <th scope="row"><span class="text-green">Active</span></th>
                    @else
                        <th scope="row"><span class="text-danger">Unactive</span></th>
                    @endif

                    <td>
                    @if($category->publish_status == 1)
                        <a href="{{url('/active',[$category->id])}}" class=""><span class="badge badge-success"><i class="fa fa-thumbs-up fa-2x"></i></span></a>
                    @else
                        <a href="{{url('/unactive',[$category->id])}}" class=""><span class="badge badge-danger"><i class="fa fa-thumbs-down  fa-2x"></i></span></a>
                    @endif
                        <a href="{{url('/edit_category',[$category->id])}}" class=""><span class="badge badge-warning"><i class="fa fa-edit text-dark fa-2x"></i></span></a>
                        <a  href="{{url('/delete',[$category->id])}}" onclick="return deleteConfirm()"  class=""><span class="badge badge-danger"><i class="fa fa-trash fa-2x"></i></span></a>
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
