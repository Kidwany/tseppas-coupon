@extends('dashboard.layouts.layouts')

@section('title', 'Dashboard')

@section('customizedStyle')
@endsection

@section('customizedScript')
    @include('dashboard.charts.registercharts')
@endsection

@section('content')




    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                    <li class="breadcrumb-item active"> Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-left"></i></button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{--Statistics--}}
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>Students</h6>
                        <h2>{{$students}} <small class="info">Active Student</small></h2>
                        <small>Number of active students  </small>
                        {{--<div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon zmdi zmdi-graduation-cap">
                    <div class="body">
                        <h6>Instructors</h6>
                        <h2>{{$instructors}}<small class="info"> Instructor </small></h2>
                        <small>Instructors Number </small>
                        {{--<div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon zmdi zmdi-book">
                    <div class="body">
                        <h6>Courses</h6>
                        <h2>{{$courses}} <small class="info">Course</small></h2>
                        <small>Total Courses</small>
                        {{--<div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon zmdi zmdi-accounts">
                    <div class="body">
                        <h6>Rounds</h6>
                        <h2> {{$rounds}} <small class="info"> Round </small></h2>
                        <small>Total courses rounds</small>
                        {{--<div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

        @if(isAdmin() == true)
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><i class="zmdi zmdi-chart"></i> Students</strong> Statistics </h2>
                            <div class="header-dropdown d-flex flex-row justify-content-between">
                                <select id="month" name="month" class="form-control show-tick ms select2" data-placeholder="اختر نوع الرمز الترويجي">
                                    <option value="">-- Choose Month --</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select disabled name="year" class="form-control show-tick ms select2" data-placeholder="اختر نوع الرمز الترويجي" style="margin-right: 8px">
                                    <option value="">Choose Year</option>
                                    <option value="2021" selected>2021</option>
                                </select>
                            </div>
                        </div>
                        <div class="body">
                            <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>


   {{-- <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Latest </strong> Enrollment Requests  </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student name</th>
                                    <th> Course </th>
                                    <th> Start date </th>
                                    <th> Status </th>
                                    <th> Created at </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Student name</th>
                                    <th> Course </th>
                                    <th> Start date </th>
                                    <th> Status </th>
                                    <th> Created at </th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @if($latest_requests)
                                        @foreach($latest_requests as $request)
                                            <tr>
                                                <td>#{{$request->code}}</td>
                                                <td><a href="{{adminUrl('student/' . $request->student->user_id)}}">
                                                        {{$request->student->user->name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{adminUrl('course/' . $request->course_id)}}">
                                                        {{ $request->course->course_en->title }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $request->round->start_date->format('d M Y') }}
                                                </td>
                                                <td><span class="badge badge-warning">{{$request->status->title}}</span></td>
                                                <td>{{ $request->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ adminUrl('student/' . $request->student->user_id) }}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-eye"></i></a>
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
    </div>--}}



@endsection
