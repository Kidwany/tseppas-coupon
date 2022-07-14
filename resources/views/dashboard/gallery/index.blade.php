@extends('dashboard.layouts.layouts')
@section('title', 'Gallery')
@section('customizedStyle')
    <!-- Light Gallery Plugin Css -->
    <link rel="stylesheet" href="{{assetPath("dashboard/assets/plugins/dropify/css/dropify.min.css")}}">
    <link rel="stylesheet" href="{{assetPath("dashboard/assets/plugins/light-gallery/css/lightgallery.css")}}">
@endsection

@section('customizedScript')
    <script src="{{assetPath("dashboard/assets/js/pages/medias/image-gallery.js")}}"></script>
    <script src="{{assetPath("dashboard/assets/plugins/dropify/js/dropify.min.js")}}"></script>
    <script src="{{assetPath("dashboard/assets/js/pages/forms/dropify.js")}}"></script>
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Gallery</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('gallery')}}">Gallery </a></li>
                        <li class="breadcrumb-item active">All Images </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
        @include("dashboard.layouts.messages")
        <!-- Vertical Layout -->
            <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload Images to gallery </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">Upload images</label>
                                        <div class="form-group">
                                            <input type="file" multiple id="dropify-event" name="image_path[]" class="form-control"
                                                   placeholder=" image" data-allowed-file-extensions="jpg png jpeg">
                                            @error("image_path") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <p>All pictures</p>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                @if(!empty($images))
                                    @foreach($images as $image)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-30">
                                            <a href="{{assetPath($image->image_path)}}">
                                                <img class="img-fluid img-thumbnail" style="height: 120px" src="{{assetPath($image->image_path)}}" alt=""> </a>
                                            <button data-toggle="modal" data-target="#delete{{$image->id}}" type="button" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> Delete </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($images))
        @foreach($images as $image)
            <div class="modal fade" id="delete{{$image->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Image</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> Are you sure you want to delete image? <strong> {{$image->name}} </strong></div>
                        <form id="deleteUser{{$image->id}}" style="display: none" action="{{route('gallery.destroy', $image->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteUser{{$image->id}}">Delete</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
