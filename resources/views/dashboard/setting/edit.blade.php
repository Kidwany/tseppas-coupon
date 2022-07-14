@extends('dashboard.layouts.layouts')
@section('title', 'Setting')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>$(function () {
            // Basic instantiation:
            $('#car_color').colorpicker();

            // Example using an event, to change the color of the #demo div background:
            $('#car_color').on('colorpickerChange', function (event) {
                $('.input-group-addon').css('background-color', event.color.toString());
            });
        });
    </script>
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name")}} </a></li>
                        <li class="breadcrumb-item active"> Update Setting</li>

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
            {{--<form action="{{route("setting.update", 1)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Form Title </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6" id="service_provider">
                                        <label> Language</label>
                                        <select name="default_lang" class="form-control show-tick ms select2"
                                                data-placeholder="">
                                            @if($languages)
                                                @foreach($languages as $language)
                                                    <option value="{{$language->code}}"
                                                            {{$language->code == $setting->default_lang ? 'selected' : ''}}
                                                    >{{$language->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("default_lang") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="email_address">Status</label>
                                        <div class="form-group">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="status" id="published" class="with-gap"
                                                       value="1"
                                                {{$setting->status == 1 ? 'checked' : ''}}>
                                                <label for="published">Published</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" name="status" id="unpublished" class="with-gap"
                                                       value="0"
                                                    {{$setting->status == 0 ? 'checked' : ''}}>
                                                <label for="unpublished">Un published</label>
                                            </div>
                                            @error("status") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email_address"> Google Analytics </label>
                                        <div class="form-group">
                                            <textarea rows="4" name="google_analytics" class="form-control no-resize"
                                                      placeholder="Enter Google Analytics script">{{$setting->google_analytics}}</textarea>
                                        </div>
                                        @error("google_analytics") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email_address"> Pixel Code </label>
                                        <div class="form-group">
                                            <textarea rows="4" name="pixel_code" class="form-control no-resize"
                                                      placeholder="Enter Pixel Code script">{{$setting->pixel_code}}</textarea>
                                        </div>
                                        @error("pixel_code") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email_address"> Mixapanel </label>
                                        <div class="form-group">
                                            <textarea rows="4" name="mixapanel" class="form-control no-resize"
                                                      placeholder="Enter Pixel Code script">{{$setting->mixapanel}}</textarea>
                                        </div>
                                        @error("mixapanel") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>--}}
            @livewire('dashboard.setting.edit')
        </div>
    </div>
@endsection
