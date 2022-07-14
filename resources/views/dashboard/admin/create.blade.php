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
                        <li class="breadcrumb-item active">New Admin  </li>
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
            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{old('name')}}" id="email_address" class="form-control" placeholder="Enter admin name" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">Email</label>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{old('email')}}" id="email_address" class="form-control" placeholder="Enter username" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">Phone</label>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{old('phone')}}" step="any" id="email_address" class="form-control" placeholder="Enter Phone ">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address"> Password </label>
                                        <div class="form-group">
                                            <input type="password" name="password" value="{{old('password')}}" id="email_address" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="email_address">Confirm Password</label>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" value="{{old('password-confirmation')}}" id="email_address" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('admin')])
            </form>
        </div>
    </div>

@endsection
