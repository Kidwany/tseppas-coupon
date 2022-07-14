@extends('dashboard.layouts.layouts')
@section('title', 'Sliders')
@section('customizedStyle')
    <link rel="stylesheet" href="{{assetPath("dashboard/assets/plugins/dropify/css/dropify.min.css")}}">
@endsection

@section('customizedScript')

        <script src="{{assetPath("dashboard/assets/plugins/dropify/js/dropify.min.js")}}"></script>


        <script src="{{assetPath("dashboard/assets/js/pages/forms/dropify.js")}}"></script>

    <script>

        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
            CKEDITOR.replace('ckeditor3');
            CKEDITOR.replace('ckeditor4');
            CKEDITOR.replace('ckeditor5');
            CKEDITOR.replace('ckeditor6');
            CKEDITOR.replace('ckeditor')
            CKEDITOR.config.height = 30;

        });

        $("#oneSp").on("click", function ()
        {
            $("#service_provider").show(750);
        })

        $("#ss").on("click", function ()
        {
            $("#service_provider").hide(750);
        })

    </script>
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sliders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name_en')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('slider')}}">Sliders </a></li>
                        <li class="breadcrumb-item active"> Edit Slider  </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @include('dashboard.layouts.messages')
            <!-- Vertical Layout -->
                <form action="{{route('slider.update', $slider->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong> Slider (En) </strong></h2>
                                </div>
                                <div class="body">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> Title in english </label>
                                            <div class="form-group">
                                                <input type="text" name="title_en" value="{{$slider->slider_en->title}}" id="email_address" class="form-control" placeholder="Enter Slider Title In English" required>
                                                @error("title_en") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address">Sub Title in english </label>
                                            <div class="form-group">
                                                <input type="text" name="sub_title_en" value="{{$slider->slider_en->title}}" id="email_address" class="form-control" placeholder="Enter Slider Sub Title In English" required>
                                                @error("sub_title_en") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> Description in english </label>
                                            <div class="form-group">
                                                <textarea name="description_en" id="ckeditor1" placeholder="Enter Slider Description In English" required class="form-control">{{$slider->slider_en->description}}</textarea>
                                                @error("description_en") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>--}}

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address">Button in english </label>
                                            <div class="form-group">
                                                <input type="text" name="button_en" value="{{$slider->slider_en->button}}" id="email_address" class="form-control" placeholder="Enter Slider Button In English" required>
                                                @error("button_en") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        {{--<div class="col-lg-12 col-md-6">
                                            <label for="email_address">Active</label>
                                            <div class="checkbox">
                                                <input id="Active" name="is_active" type="checkbox" value="1" {{$slider->is_active == 1 ? "checked" : ""}}>
                                                <label for="Active">
                                                    Check if Slider is Active
                                                </label>
                                                @error("is_active") <span
                                                    class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>--}}




                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> Slider Image </label>
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control dropify" data-default-file="{{assetPath($slider->image_path)}}">
                                                @error("image") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>--}}

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> Slider Background Image </label>
                                            <div class="form-group">
                                                <input type="file" name="bg_image"class="form-control dropify" data-default-file="{{assetPath($slider->bg_image_path)}}">
                                                @error("bg_image") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> Slider Video </label>
                                            <div class="form-group">
                                                <input type="url" name="video" value="{{$slider->video_path}}" id="email_address" class="form-control" placeholder="Enter Slider Video URL" required>
                                                @error("video") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>--}}

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> Slider URL </label>
                                            <div class="form-group">
                                                <input type="text" name="url" value="{{$slider->url}}" id="email_address" class="form-control" placeholder="Enter Slider URL" required>
                                                @error("url") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong> Slider (Ar) </strong></h2>
                                </div>
                                <div class="body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> العنوان بالعربية </label>
                                            <div class="form-group">
                                                <input type="text" name="title_ar" value="{{$slider->slider_ar->title}}" id="email_address" class="form-control" placeholder="ادخل عنوان السلايدر باللغة العربية" required>
                                                @error("title_ar") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> العنوان الفرعي بالعربية </label>
                                            <div class="form-group">
                                                <input type="text" name="sub_title_ar" value="{{$slider->slider_ar->sub_title}}" id="email_address" class="form-control" placeholder="ادخل عنوان السلايدر الفرعي باللغة العربية" required>
                                                @error("sub_title_ar") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        {{--<div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> الوصف بالعربية </label>
                                            <div class="form-group">
                                                --}}{{--<input type="text" name="description_en" value="{{$slider->slider_en->description}}" id="email_address" class="form-control" placeholder="ادخل اسم السلايدر بالإنجليزية" required>--}}{{--
                                                <textarea name="description_ar" id="ckeditor2" placeholder="ادخل وصف السلايدر بالعربية" required class="form-control">{{$slider->slider_ar->description}}</textarea>
                                                @error("description_ar") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>--}}

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="email_address"> الزر بالعربية </label>
                                            <div class="form-group">
                                                <input type="text" name="button_ar" value="{{$slider->slider_ar->button}}" id="email_address" class="form-control" placeholder="ادخل الزر باللغة العربية" required>
                                                @error("button_ar") <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('slider')])
                </form>
        </div>
    </div>

@endsection
