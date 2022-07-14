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
                        <li class="breadcrumb-item"><a href="{{adminUrl('student')}}">Students </a></li>
                        <li class="breadcrumb-item active">All Students </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @if(isAdmin())
                <div class="row clearfix">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="body">
                                <h3 class="mt-0 mb-0">{{$total_students}}</h3>
                                <p class="text-muted">Total Students</p>
                                {{--<div class="progress">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                </div>
                                <small>21% higher than last month</small>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="body">
                                <h3 class="mt-0 mb-0">{{$enrolled_students}}</h3>
                                <p class="text-muted">Enrolled Students</p>
                                {{--<div class="progress">
                                    <div class="progress-bar l-pink" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                </div>
                                <small>43% higher than last month</small>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="body">
                                <h3 class="mt-0 mb-0">{{$related_to_corporate}}</h3>
                                <p class="text-muted">Related to Corporates</p>
                                {{--<div class="progress">
                                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                </div>
                                <small>23% From total registered students</small>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        @include('dashboard.layouts.messages')
                        <div class="header">
                            <h2><strong>List of </strong> Students </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Corporate</th>
                                        <th>Status</th>
                                        <th>Registered at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Corporate</th>
                                        <th>Status</th>
                                        <th>Registered at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($students_info)
                                        @foreach($students_info as $student)
                                            <tr>
                                                <td>#{{$student->id}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->phone}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>
                                                    @if($student->corporate_id)
                                                        <a href="{{adminUrl('corporate/' . $student->corporate_id . '/edit')}}">
                                                            {{$student->corporate->name}}
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{$student->is_active ? 'success' : 'danger'}}">
                                                        {{$student->is_active ? 'Active' : 'DeActive'}}
                                                    </span>
                                                </td>
                                                <td>{{$student->created_at->format('Y-m-d')}}</td>
                                                <td class="d-flex">
                                                    <a href="{{adminUrl('student/' . $student->id)}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-eye"></i> </a>
                                                    <a href="{{adminUrl('student/' . $student->id . '/edit')}}" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                                    {{--<a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete{{$user->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>--}}
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
