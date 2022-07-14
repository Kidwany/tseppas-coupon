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
                        <li class="breadcrumb-item"><a href="{{adminUrl('course')}}">Courses </a></li>
                        <li class="breadcrumb-item active">All Courses </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        @include('dashboard.layouts.messages')
                        <div class="header d-flex justify-content-between">
                            <h2><strong>List of </strong> Courses </h2>
                            @if(isAdmin())
                                <a href="{{adminUrl('course/create')}}" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add new Course</a>
                            @endif
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Rounds</th>
                                        <th>Sessions</th>
                                        <th>Hours</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Rounds</th>
                                        <th>Sessions</th>
                                        <th>Hours</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($courses)
                                        @foreach($courses as $course)
                                            <tr>
                                                <td>#{{$course->code}}</td>
                                                <td>{{$course->course_en->title}}</td>
                                                <td><a href="{{adminUrl('round?course_id=' . $course->id)}}"> {{$course->rounds->count()}} Rounds </a> </td>
                                                <td>{{$course->courseDetails->sessions}} Sessions </td>
                                                <td>{{$course->courseDetails->duration_in_hours	}} Hours </td>
                                                <td>
                                                    <span class="badge badge-{{$course->is_active ? 'success' : 'danger'}}">
                                                        {{$course->is_active ? 'Active' : 'De-active'}}
                                                    </span>
                                                </td>
                                                <td>{{$course->created_at->format('Y-m-d')}}</td>
                                                <td class="d-flex">
                                                    <a href="{{adminUrl('course/' . $course->id)}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-eye"></i> </a>
                                                    @if(isAdmin())
                                                        <a href="{{adminUrl('course/'. $course->id . '/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                                        <a href="{{adminUrl('course-calendar/'. $course->id . '/edit')}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-calendar"></i> </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    {{--@if($latest_orders)
                                        @foreach($latest_orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->code}}</td>
                                                <td>
                                                    <a target="_blank" href="{{adminUrl('user/' . $order->star_id)}}">
                                                        {{$order->star_id ? $order->star->name : ''}}
                                                    </a>
                                                </td>
                                                <td><span class="badge badge-success">{{$order->type->name_ar}}</span></td>
                                                <td><span class="badge badge-info">{{$order->status->status}}</span></td>
                                                <td>{{$order->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{adminUrl('orders/'.$order->id)}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-eye"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($users))
        @foreach($users as $user)
            <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">حذف المستخدم</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> هل انت متأكد من انك تريد حذف المستخدم <strong> {{$user->name}} </strong></div>
                        <form id="deleteUser{{$user->id}}" style="display: none" action="{{route('user.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteUser{{$user->id}}">حذف</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
