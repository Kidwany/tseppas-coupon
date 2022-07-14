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
                        <li class="breadcrumb-item active">Edit Admin  </li>
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
            <!-- Vertical Layout -->
            <form action="{{route('admin.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{$user->name}}" id="email_address" class="form-control" placeholder="Enter Admin Name" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">Email</label>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{$user->email}}" id="email_address" class="form-control" placeholder="Enter username" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">Phone</label>
                                        <div class="form-group">
                                            <input type="tel" name="phone" value="{{$user->phone}}" step="any" id="email_address" class="form-control" placeholder="Enter Phone ">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address"> Password </label>
                                        <div class="form-group">
                                            <input type="password" name="password" value="" id="email_address" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">Confirm Password </label>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" value="" id="email_address" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('page')])
            </form>
        </div>
    </div>

@endsection
