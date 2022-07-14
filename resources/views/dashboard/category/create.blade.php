@extends('dashboard.layouts.layouts')
@section('title', 'New Category')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>$(function () {

            $(function () {
                //CKEditor
                CKEDITOR.replace('ckeditor');
                CKEDITOR.config.height = 300;

            });
            // Basic instantiation:
            $('#car_color').colorpicker();

            // Example using an event, to change the color of the #demo div background:
            $('#car_color').on('colorpickerChange', function (event) {
                $('.input-group-addon').css('background-color', event.color.toString());
            });
        });

        $(document).ready(function () {
            if ($('#sub').is(':checked'))
            {
                //alert("kidoo")
                $('#service_provider').show();
            }
            $('#sub').on('change', function ()
            {
                if ($('#sub').is(':checked'))
                {
                    //alert("kidoo")
                    $('#service_provider').fadeIn(500);
                }
            })

        });
    </script>
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> New Category</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name")}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('category')}}">Category </a></li>
                        <li class="breadcrumb-item active"> New Category</li>

                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
        @include("dashboard.layouts.messages")
        <!-- Vertical Layout -->
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>New Category (En) </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Name</label>
                                        <div class="form-group">
                                            <input type="text" name="name_en" value="{{old('name_en')}}" id="email_address"
                                                   class="form-control" placeholder="Enter Name">
                                            @error("name_en") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-3">
                                        <label for="email_address">Image</label>
                                        <div class="form-group">
                                            <input type="file" name="image_path" id="email_address" class="form-control"
                                                   placeholder=" image">
                                            @error("image_path") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label for="email_address">Category Type</label>
                                        <div class="form-group">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="is_main" id="main" class="with-gap"
                                                       value="1" {{request('parent_category') ? '' : 'checked'}}>
                                                <label for="main">Main Category</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" name="is_main" id="sub" class="with-gap"
                                                       value="0" {{request('parent_category') ? 'checked' : ''}}>
                                                <label for="sub">Sub Category</label>
                                            </div>
                                            @error("is_main") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6" id="service_provider" style="display: {{request('parent_category') ? 'block' : 'none'}}">
                                        <label>Parent Category</label>
                                        <select name="category_id" class="form-control show-tick ms select2"
                                                data-placeholder="-- Choose Main Category --">
                                            <option value="">-- Choose Main Category --</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{request('parent_category') == $category->id || old('parent_category') == $category->id ? 'selected' : ''}}>{{$category->category_en->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("category_id") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label for="email_address">Active</label>
                                        <div class="checkbox">
                                            <input checked id="is_active" name="is_active" type="checkbox" value="1">
                                            <label for="is_active">
                                                Assign as active category
                                            </label>
                                            @error("is_active") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>New Category (Ar) </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name_ar" value="{{old('name_ar')}}" id="email_address"
                                                   class="form-control" placeholder="Enter Name">
                                            @error("name_ar") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('category')])
            </form>
        </div>
    </div>
@endsection
