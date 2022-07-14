@extends('dashboard.layouts.layouts')
@section('title', 'المستخدمين')
@section('customizedStyle')
@endsection

@section('customizedScript')
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>المستخدمين</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name_ar')}} </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> المستخدمين </a></li>
                        <li class="breadcrumb-item active"> بيانات المستخدمين </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="{{adminUrl('user/' . $user->id)}}"><img src="{{assetPath('dashboard/assets/images/user.png')}}" class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10">{{$user->name}}</h4>
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('user.update', $user->id)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-danger">تعطيل الحساب</button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <small>المحفظة</small>
                                    <h5>{{$user->balance->amount }}</h5>
                                </div>
                                <div class="col-4">
                                    <small>عدد عمليات الحجز</small>
                                    <h5>{{$orders->orders_count }}</h5>
                                </div>
                                <div class="col-4">
                                    <small> اجمالي قيمة العمليات </small>
                                    <h5>{{$orders->total_orders_value}}  ج.م </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">البريد الإلكتروني: </small>
                            <p>{{$user->email}}</p>
                            <hr>
                            <small class="text-muted">الجوال: </small>
                            <p>{{$user->phone}}</p>
                            <hr>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">تم التسجيل من : </small>
                            <p>{{$user->platform ? ($user->platform == 1 ? 'Android' : 'IOS') : ''}}</p>
                            <hr>
                            <small class="text-muted">اللغة: </small>
                            <p>{{$user->lang ? ($user->lang == 'ar' ? 'العربية' : 'الإنجليزية') : ''}}</p>
                            <hr>
                            <small class="text-muted">تم التسجيل في: </small>
                            <p>{{$user->created_at->format('d M Y')}}  {{$user->created_at->format('h:i:s')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">

                        <div class="body">
                            <div class="header">
                                <h2><strong>العناوين </strong> </h2>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>العنوان</th>
                                        <th>البناية</th>
                                        <th>الدور</th>
                                        <th>الشقة</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($addresses)
                                        @foreach($addresses as $address)
                                            <tr>
                                                <th scope="row">{{$address->id}}</th>
                                                <td>{{$address->name}}</td>
                                                <td>{{$address->address}}</td>
                                                <td>{{$address->build_no}}</td>
                                                <td>{{$address->floor}}</td>
                                                <td>{{$address->flat}}</td>
                                                <td>{{$address->notes ? $address->notes : "لا توجد ملاحظات"}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="header">
                                <h2><strong>العمليات </strong> السابقة</h2>
                            </div>
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الكود</th>
                                        <th> الطيار </th>
                                        <th> النوع </th>
                                        <th> الحالة </th>
                                        <th> تم الطلب </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>م</th>
                                        <th>الكود</th>
                                        <th> الطيار </th>
                                        <th> النوع </th>
                                        <th> الحالة </th>
                                        <th> تم الطلب </th>
                                        <th>تعديل</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($latest_orders)
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
