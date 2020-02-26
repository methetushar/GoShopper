@extends('admin.dashboard_layout')

@section('dashboard_content')
    <div class="container mt-5">
        <div class="jumbotron ">
            <h2 class="text-capitalize">Upload image from your computer
                <hr>
            </h2>
            <div class="col-md-8 m-auto">
                <div class="card card-body" style="background: none;border: 1px dashed #444">
                    <h3 class="text-center my-5">Insert image for slide</h3>
                    <span class="text-blue text-center">
                        @if (session('success'))
                            {{session('success')}}
                        @endif
                    </span>
                    <div class="offset-md-4  my-5 px-5">
                        <form action="{{url('/insert_image')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="my-3"  style="font-size: small;line-height: 12px;"  >

                            <button  type="submit" class="btn btn-info">Upload file</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
