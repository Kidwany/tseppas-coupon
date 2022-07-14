@extends('dashboard.layouts.layouts')
@section('title', 'Contact Info')
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
            $('#car_color').on('colorpickerChange', function(event) {
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
                    <h2> Update</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i class="zmdi zmdi-home"></i> {{config("app.name")}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('contact/edit')}}">Contact Info </a></li>
                        <li class="breadcrumb-item active">  Update </li>

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
            <form action="{{adminUrl("contact/update")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong> Contact Info (En) </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Email </label>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{$contact->email}}" id="email_address" class="form-control" placeholder="Enter Email">
                                            @error("email") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Phone </label>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{$contact->phone}}" id="email_address" class="form-control" placeholder="Enter Phone">
                                            @error("phone") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Address </label>
                                        <div class="form-group">
                                            <input type="text" name="address_en" value="{{$contact->address_en}}" id="email_address" class="form-control" placeholder="Enter Address">
                                            @error("address_en") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Location on Map </label>
                                        <div class="form-group">
                                            <input type="text" name="location" value="{{$contact->location}}" id="email_address" class="form-control" placeholder="Enter Location link on google maps">
                                            @error("location") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Whatsapp </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-whatsapp"></i></span>
                                            </div>
                                            <input type="text" name="whatsapp" value="{{$contact->whatsapp}}" id="email_address" class="form-control" placeholder="Enter Whatsapp number">
                                            @error("whatsapp") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Facebook </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-facebook"></i></span>
                                            </div>
                                            <input type="url" name="facebook" value="{{$contact->facebook}}" id="email_address" class="form-control" placeholder="Enter Facebook Page Link">
                                            @error("facebook") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Twitter </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-twitter"></i></span>
                                            </div>
                                            <input type="url" name="twitter" value="{{$contact->twitter}}" id="email_address" class="form-control" placeholder="Enter Twitter Link">
                                            @error("twitter") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Instagram Page </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-instagram"></i></span>
                                            </div>
                                            <input type="url" name="instagram" value="{{$contact->instagram}}" id="email_address" class="form-control" placeholder="Enter Instagram Page Link">
                                            @error("instagram") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Youtube Channel </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-youtube"></i></span>
                                            </div>
                                            <input type="url" name="youtube" value="{{$contact->youtube}}" id="email_address" class="form-control" placeholder="Enter Youtube Channel Link">
                                            @error("youtube") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Linkedin Profile </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-linkedin"></i></span>
                                            </div>
                                            <input type="url" name="linkedin" value="{{$contact->linkedin}}" id="email_address" class="form-control" placeholder="Enter Linkedin Profile Link">
                                            @error("linkedin") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Behance </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-behance"></i></span>
                                            </div>
                                            <input type="url" name="behance" value="{{$contact->behance}}" id="email_address" class="form-control" placeholder="Enter Behance Link">
                                            @error("behance") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Pintrest Link </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-pinterest"></i></span>
                                            </div>
                                            <input type="url" name="pintrest" value="{{$contact->pintrest}}" id="email_address" class="form-control" placeholder="Enter Pintrest Link">
                                            @error("pintrest") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong> Contact Info (Ar) </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Address </label>
                                        <div class="form-group">
                                            <input type="text" name="address_ar" value="{{$contact->address_ar}}" id="email_address" class="form-control" placeholder="Enter Address">
                                            @error("address_ar") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('/')])
            </form>
        </div>
    </div>
@endsection
