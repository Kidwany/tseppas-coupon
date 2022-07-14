@extends('dashboard.layouts.layouts')
@section('title', 'Students')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Students</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('student')}}"> Students </a></li>
                        <li class="breadcrumb-item active"> Students Info </li>
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
            @include('dashboard.student.new-request')
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="{{adminUrl('student/' . $student->id)}}">
                                <img src="{{$student->image_path ? assetPath($student->image_path) : assetPath('dashboard/assets/images/user.png')}}"
                                                                                   class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10">{{$student->name}}</h4>
                            <div class="row">
                                <div class="col-12">
                                    {{--<form action="{{route('student.update', $student->id)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-{{$student->is_active ? 'danger' : 'success'}}">
                                            {{$student->is_active ? 'Deactivate Account' : 'Activate Account'}}
                                        </button>
                                    </form>--}}
                                    <a href="{{adminUrl('student/' . $student->id . '/edit')}}" type="submit" class="btn btn-success">
                                        Update Student
                                    </a>
                                </div>
                                <div class="col-6">
                                    <small>Courses</small>
                                    <h5>{{$student->studentRounds->count()}} Enrolled Courses</h5>
                                </div>
                                <div class="col-6">
                                    <small>Exams</small>
                                    <h5>0 Attended Exams</h5>
                                </div>
                                {{--<div class="col-4">
                                    <small> اجمالي قيمة العمليات </small>
                                    <h5>{{$orders->total_orders_value}}  ج.م </h5>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">Email: </small>
                            <p>{{$student->email}}</p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p>{{$student->phone}}</p>
                            <hr>
                            <small class="text-muted">Registered at: </small>
                            <p>{{$student->created_at->format('d M Y')}}</p>
                            <hr>
                            <small class="text-muted">Corporate: </small>
                            @if($student->corporate_id)
                                <p>
                                    <a target="_blank" href="{{adminUrl('corporate/' . $student->corporate_id . '/edit')}}">
                                        {{$student->corporate->name}}
                                    </a>
                                </p>
                            @else
                                <p> - </p>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">Emergency Contact : </small>
                            <p>{{$student->student->emergency_contact_name}}</p>
                            <hr>
                            <small class="text-muted">Emergency Phone: </small>
                            <p>{{$student->student->emergency_contact_phone}}</p>
                            <hr>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="header">
                                <h2><strong>Student </strong>  Courses</h2>
                            </div>
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Round</th>
                                        <th>Instructor</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Round</th>
                                        <th>Instructor</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($student->studentRounds)
                                        @foreach($student->studentRounds as $round)
                                            <tr>
                                                <td>#{{$round->course->code}}</td>
                                                <td>{{$round->course->course_en->title}}</td>
                                                <td>{{$round->round->start_date->format('M Y')}} Round</td>
                                                <td>{{$round->round->instructor->instructor_en->name}}</td>
                                                <td>
                                                    <span class="badge badge-{{$round->round->is_finished ? 'success' : 'warning'}}">
                                                        {{$round->round->is_finished ? 'Completed' : 'In Progress'}}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
