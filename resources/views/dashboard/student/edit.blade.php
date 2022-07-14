@extends('dashboard.layouts.layouts')
@section('title', 'Student')
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
                    <h2>Students</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('student')}}">Students </a></li>
                        <li class="breadcrumb-item active">Update Student </li>
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
            <form action="{{route('student.update', $student->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Update Student </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{$student->name}}" id="email_address" class="form-control" placeholder="Name">
                                            @error("name") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="email_address"> Email </label>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{$student->email}}" id="email_address" class="form-control" placeholder="Email">
                                            @error("email") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="email_address"> Phone </label>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{$student->phone}}" id="email_address" class="form-control" placeholder="Phone">
                                            @error("phone") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="email_address"> Emergency Contact Name </label>
                                        <div class="form-group">
                                            <input type="text" name="emergency_contact_name" value="{{$student->student->emergency_contact_name}}" id="email_address" class="form-control" placeholder="Emergency Contact Name">
                                            @error("emergency_contact_name") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="email_address"> Emergency Contact Phone </label>
                                        <div class="form-group">
                                            <input type="text" name="emergency_contact_phone" value="{{$student->student->emergency_contact_phone}}" id="email_address" class="form-control" placeholder="Emergency Contact Phone">
                                            @error("emergency_contact_phone") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6" id="service_provider" >
                                        <label> Corporate</label>
                                        <select name="corporate_id" class="form-control show-tick ms select2" data-placeholder="Corporate">
                                            <option value="">Corporate</option>
                                            @if(!empty($corporates))
                                                @foreach($corporates as $corporate)
                                                    <option value="{{$corporate->id}}" {{$student->corporate_id == $corporate->id ? 'selected' : ''}}>{{$corporate->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("corporate_id") <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label for="email_address"> Password </label>
                                        <div class="form-group">
                                            <input type="password" name="password" value="" id="email_address" class="form-control" placeholder="Password">
                                            @error("password") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label for="email_address">Assign student as active</label>
                                        <div class="checkbox">
                                            <input id="is_active" name="is_active" type="checkbox" value="1" {{$student->is_active == 1 ? 'checked' : ''}}>
                                            <label for="is_active">
                                                Assign student as active
                                            </label>
                                            @error("is_active") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('student')])
            </form>
        </div>
    </div>
@endsection
