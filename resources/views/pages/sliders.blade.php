@extends('admin.dashboard_layout')

@section('dashboard_content')
    <div class="container">
        <div class="card card-body">
            <div class="bg-info  text-white shadow-lg p-2  bg-blue rounded" style="background: linear-gradient(45deg, #040f61, transparent);">

                <a  class="nav-link pl-5 text-white" href="{{url ('/show_slide')}}">
                    <i class="ni ni-cloud-upload-96 text-white"></i> Add Slider image

                </a>
            </div>

            <table class="table table-border">
                <thead>
                    <tr>
                        <th>Image ID</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($select_slider_image as $image)

                <tr>
                    <td>{{$image->id}}</td>
                    <td>
                        <img src="{{$image->image_name}}" alt="" height="70" width="60">
                    </td>
                    <td>
                        <a href="{{url('delete',[$image->id])}}">
                            <span class="badge badge-danger" onclick="return deleteConfirm();"><i class="fa fa-trash fa-2x"></i></span>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@stop

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
