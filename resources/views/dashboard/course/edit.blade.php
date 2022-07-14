@extends('dashboard.layouts.layouts')
@section('title', 'Course')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>
        $(function () {

            $(function () {
                //CKEditor
                /*CKEDITOR.replace('ckeditor1');
                CKEDITOR.replace('ckeditor2');
                CKEDITOR.replace('ckeditor3');
                CKEDITOR.replace('ckeditor4');
                CKEDITOR.replace('ckeditor5');
                CKEDITOR.replace('ckeditor6');*/
                CKEDITOR.replace('ckeditor')
                CKEDITOR.config.height = 250;

            });
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
                    <h2>Update Course</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name_ar")}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('course')}}">Course </a></li>
                        <li class="breadcrumb-item active"> Update Course Info</li>

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
            <form action="{{route('course.update', $course->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Update Course Info <strong>(En)</strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="title_en" value="{{$course->course_en->title}}" id="email_address"
                                                   class="form-control" placeholder="Enter Title Of Course">
                                            @error("title_en") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email_address"> Description </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor1" name="description_en" class="form-control no-resize ckeditor"
                                                      placeholder="Enter Description Of Course">{{$course->course_en->description}}</textarea>
                                            @error("description_en") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email_address"> Accreditation </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor2" name="accreditation_en"
                                                      class="form-control no-resize ckeditor"
                                                      placeholder="Enter Accreditation">{{$course->course_en->accreditation}}</textarea>
                                            @error("accreditation_en") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email_address"> Exam Details </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor3" name="exam_details_en"
                                                      class="form-control no-resize ckeditor"
                                                      placeholder="Enter Exam Details">{{$course->course_en->exam_details}}</textarea>
                                            @error("exam_details_en") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Course Code </label>
                                        <div class="form-group">
                                            <input type="text" name="code" value="{{$course->code}}" id="email_address"
                                                   class="form-control" placeholder="Enter Course Code">
                                            @error("code") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6" id="service_provider">
                                        <label> Category</label>
                                        <select name="category_id" class="form-control show-tick ms select2"
                                                data-placeholder="-- Choose Category --">
                                            <option value="">-- Choose Category --</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $course->category_id ? 'selected' : ''}}>{{$category->category_en->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("category_id") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-6" id="service_provider">
                                        <label> partner</label>
                                        <select name="partner_id" class="form-control show-tick ms select2"
                                                data-placeholder="-- Choose Partner --">
                                            <option value="">-- Choose Partner --</option>
                                            @if($partners)
                                                @foreach($partners as $partner)
                                                    <option value="{{$partner->id}}" {{$partner->id == $course->partner_id ? 'selected' : ''}}>{{$partner->partner_en->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("partner_id") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg- 12 col-md-12 col-sm-3">
                                        <label for="email_address">Course Image</label>
                                        <div class="form-group">
                                            <input type="file" name="image_path" id="email_address" class="form-control"
                                                   placeholder=" Upload Image">
                                            @error("image_path") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6" id="service_provider">
                                        <label> Course Instructor</label>
                                        <select name="instructor_id" class="form-control show-tick ms select2"
                                                data-placeholder="-- Choose Instructor --">
                                            <option value="">-- Choose Instructor --</option>
                                            @if($instructors)
                                                @foreach($instructors as $instructor)
                                                    <option
                                                        value="{{$instructor->id}}" {{$instructor->id == $course->instructor_id ? 'selected' : ''}}> {{$instructor->user->name}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("instructor_id") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Price </label>
                                        <div class="form-group">
                                            <input type="number" name="price" value="{{$course->price}}" id="email_address"
                                                   class="form-control" placeholder="Enter Price">
                                            @error("price") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Sessions Number </label>
                                        <div class="form-group">
                                            <input type="number" name="sessions" value="{{$course->courseDetails->sessions}}" id="email_address"
                                                   class="form-control" placeholder="Enter Sessions Number">
                                            @error("sessions") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6" id="service_provider">
                                        <label> Lab</label>
                                        <select name="room_id" class="form-control show-tick ms select2"
                                                data-placeholder="-- Choose Lab --">
                                            <option value="">-- Choose Lab --</option>
                                            @if($rooms)
                                                @foreach($rooms as $room)
                                                    <option value="{{$room->id}}" {{$room->id == $course->courseDetails->room_id ? 'selected' : ''}}> {{$room->name}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("room_id") <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Quizes </label>
                                        <div class="form-group">
                                            <input type="number" name="quizes" value="{{$course->courseDetails->quizes}}" id="email_address"
                                                   class="form-control" placeholder="Enter Quizes Number">
                                            @error("quizes") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Duration in Hours </label>
                                        <div class="form-group">
                                            <input type="number" name="duration_in_hours"
                                                   value="{{$course->courseDetails->duration_in_hours}}"
                                                   id="email_address"
                                                   class="form-control" placeholder="Enter Duration in Hours">
                                            @error("duration_in_hours") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Hours in Week </label>
                                        <div class="form-group">
                                            <input type="number" name="hrs_a_week" value="{{$course->courseDetails->hrs_a_week}}" id="email_address"
                                                   class="form-control" placeholder="Enter Hours in week">
                                            @error("hrs_a_week") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Number of Weeks </label>
                                        <div class="form-group">
                                            <input type="number" name="weeks" value="{{$course->courseDetails->weeks}}" id="email_address"
                                                   class="form-control" placeholder="Enter Number of  week">
                                            @error("weeks") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Number of Months </label>
                                        <div class="form-group">
                                            <input type="number" name="months" value="{{$course->courseDetails->months}}" id="email_address"
                                                   class="form-control" placeholder="Enter Number of  Months">
                                            @error("months") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Number of Seats </label>
                                        <div class="form-group">
                                            <input type="number" name="seats" value="{{$course->courseDetails->seats}}" id="email_address"
                                                   class="form-control" placeholder="Enter Number of  Seats">
                                            @error("seats") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label for="email_address">Assign Course as Active</label>
                                        <div class="checkbox">
                                            <input id="is_active" name="is_active" type="checkbox" value="1" {{$course->is_active ? 'checked' : ''}}>
                                            <label for="is_active">
                                                Check if Course is Active
                                            </label>
                                            @error("is_active") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label for="email_address">Show Course in Featured Courses Section</label>
                                        <div class="checkbox">
                                            <input id="is_featured" name="is_featured" {{$course->is_featured ? 'checked' : ''}} type="checkbox" value="1">
                                            <label for="is_featured">
                                                Check if Course is Featured
                                            </label>
                                            @error("is_featured") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="header">
                                <h2>Update Course Info <strong>(Ar)</strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="title_ar" value="{{$course->course_ar->title}}" id="email_address"
                                                   class="form-control" placeholder="Enter Title Of Course">
                                            @error("title_ar") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email_address"> Description </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor4" name="description_ar" class="ckeditor form-control no-resize"
                                                      placeholder="Enter Description Of Course">{{$course->course_ar->description}}</textarea>
                                            @error("description_ar") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email_address"> Accreditation </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor5" name="accreditation_ar"
                                                      class="form-control no-resize ckeditor"
                                                      placeholder="Enter Accreditation">{{$course->course_en->accreditation}}</textarea>
                                            @error("accreditation_ar") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="email_address"> Exam Details </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor6" name="exam_details_ar"
                                                      class="form-control no-resize ckeditor"
                                                      placeholder="Enter Exam Details">{{$course->course_en->exam_details}}</textarea>
                                            @error("exam_details_ar") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('corporate')])
            </form>
        </div>
    </div>
@endsection
