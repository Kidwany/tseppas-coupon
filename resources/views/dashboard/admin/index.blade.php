@extends('dashboard.layouts.layouts')
@section('title', 'Admins')
@section('customizedStyle')
@endsection

@section('customizedScript')



@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Admins</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('admin')}}">Admins </a></li>
                        <li class="breadcrumb-item active"> All Admins </li>
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
                    @include('dashboard.layouts.messages')
                    <div class="card">
                        <div class="header">
                            <h2><strong>List of</strong> Admins </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th> Status </th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th> Status </th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                <span class="badge badge-{{$user->is_active == 1 ? 'success' : 'danger'}}">
                                                        {{$user->is_active == 1 ? 'Active' : 'De-active'}}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{adminUrl('admin/' . $user->id . '/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                                <a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete{{$user->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($users)
        @foreach($users as $user)
            <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Admin</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> Are you sure you want to delete admin ? <strong> {{$user->name}} </strong></div>
                        <form id="deleteUser{{$user->id}}" style="display: none" action="{{route('admin.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteUser{{$user->id}}">Delete</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
