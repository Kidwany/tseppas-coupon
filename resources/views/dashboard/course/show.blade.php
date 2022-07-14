@extends('dashboard.layouts.layouts')
@section('title', 'Courses')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Courses</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('course')}}"> Courses </a></li>
                        <li class="breadcrumb-item active"> Courses Info </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{adminUrl('course/' . $course->id . '/edit')}}" class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-edit"></i></a>
                    <a href="{{adminUrl('course-calendar/' . $course->id . '/edit')}}" class="btn btn-info btn-icon float-right" type="button"><i class="zmdi zmdi-calendar"></i></a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="blogitem mb-5">
                            <div class="blogitem-image">
                                <a href="{{adminUrl('course/' . $course->id)}}"><img src="{{assetPath($course->image_path)}}" alt="course image"></a>
                                {{--<span class="blogitem-date">Monday, December 15, 2018</span>--}}
                            </div>
                            <div class="blogitem-content">
                                <div class="blogitem-header">
                                    <div class="blogitem-meta">
                                        <span><i class="zmdi zmdi-account"></i>Created By <a href="javascript:void(0);">{{$course->createdBy->name}}</a></span>
                                        <span><i class="zmdi zmdi-plus"></i><a href="{{adminUrl('round/create?course_id=' . $course->id)}}">New Round</a></span>
                                    </div>
                                    {{--<div class="blogitem-share">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook-box"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter-box"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                                        </ul>
                                    </div>--}}
                                </div>

                                <h5><a href="#">Course Name</a></h5>
                                <p>{!! $course->course_en->title  !!}</p>

                                <h5><a href="#">Description</a></h5>
                                <p>
                                    {!! $course->course_en->description !!}
                                </p>

                                <h5><a href="#">Accreditation</a></h5>
                                <p>
                                    {!! $course->course_en->accreditation !!}
                                </p>

                                <h5><a href="#">Exam Details</a></h5>
                                <p>
                                    {!! $course->course_en->exam_details  !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Instructor</strong> </h2>
                        </div>
                        <div class="">
                            <ul class="comment-reply list-unstyled">
                                <li>
                                    <div class="icon-box"><img class="img-fluid img-thumbnail" src="{{assetPath($course->instructor->user->image_path)}}" alt="Awesome Image"></div>
                                    <div class="text-box">
                                        <h5>{{$course->instructor->user->name}}</h5>
                                        <p>{{$course->instructor->instructor_en->bio}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Course Details</strong></h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled mb-0 widget-categories">
                                <li><a href="#"><strong>Code</strong>: #{{$course->code}}</a></li>
                                <li><a href="#"><strong>Category</strong>: {{$course->category->category_en->title}}</a></li>
                                <li><a href="{{adminUrl('partner/' . $course->partner_id . '/edit')}}"><strong>Partner</strong>:
                                        {{$course->partner->partner_en->name}}
                                    </a>
                                </li>
                                <li><a href="#"><strong>Price</strong>: {{$course->price}} L.E</a></li>
                                <li><a href="{{adminUrl('room/' . $course->courseDetails->room_id . '/edit')}}"><strong>Lab</strong>:
                                        #{{$course->courseDetails->room->code}}</a>
                                </li>
                                <li><a href="#"><strong>Sessions</strong>: {{$course->courseDetails->sessions}} Sessions</a></li>
                                <li><a href="#"><strong>Quizes</strong>: {{$course->courseDetails->quizes}}</a></li>
                                <li><a href="#"><strong>Duration(Hours)</strong>: {{$course->courseDetails->duration_in_hours}} (Hours)</a></li>
                                <li><a href="#"><strong>Weeks</strong>: {{$course->courseDetails->weeks}} Weeks</a></li>
                                <li><a href="#"><strong>Months</strong>: {{$course->courseDetails->months}} Months</a></li>
                                <li><a href="#"><strong>Seats</strong>: {{$course->courseDetails->seats}} Seats</a></li>
                                <li><a href="{{adminUrl('round/?course_id=' . $course->id)}}"><strong>Rounds</strong>: Show Rounds({{$course->rounds->count()}})</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
