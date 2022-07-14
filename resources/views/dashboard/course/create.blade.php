@extends('dashboard.layouts.layouts')
@section('title', 'Course')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>$(function () {

            /*$(function () {
                //CKEditor
                /!*CKEDITOR.replace('ckeditor1');
                CKEDITOR.replace('ckeditor2');
                CKEDITOR.replace('ckeditor3');
                CKEDITOR.replace('ckeditor4');
                CKEDITOR.replace('ckeditor5');
                CKEDITOR.replace('ckeditor6');*!/
                CKEDITOR.replace('ckeditor')
                CKEDITOR.config.height = 30;

            });*/
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
                    <h2>New Course</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name_ar")}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('course')}}">Course </a></li>
                        <li class="breadcrumb-item active"> New Course</li>

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
            @livewire('dashboard.course.create-course')
        </div>
    </div>
@endsection
