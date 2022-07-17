@extends('dashboard.layouts.layouts')
@section('title', 'Sales Orders')
@section('customizedStyle')
@endsection

@section('customizedScript')

@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sales Order</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('sales-orders')}}">Sales Order </a></li>
                        <li class="breadcrumb-item active"> All Sales Order </li>
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
                        <div class="header d-flex justify-content-between">
                            <h2><strong>List </strong> Sales Order </h2>
                            <a href="{{adminUrl('sales-orders/create')}}" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add New </a>
                        </div>
                        <!-- Advanced Select2 -->
                        <div class="body">
                            <div class="table-responsive"><strong>List </strong> Sales Orders
                                <table id="ssss" class="table table-bordered table-striped table-hover js-exportable dataTable">
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Code </th>
                                        <th> Sales Agent </th>
                                        <th> Customer </th>
                                        <th> Order Amount </th>
                                        <th> Status </th>
                                        <th> progress </th>
                                        <th> Approved By </th>
                                        <th> Created at </th>
                                        <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th> # </th>
                                        <th> Code </th>
                                        <th> Sales Agent </th>
                                        <th> Customer </th>
                                        <th> Order Amount </th>
                                        <th> Status </th>
                                        <th> progress </th>
                                        <th> Approved By </th>
                                        <th> Created at </th>
                                        <th> Actions </th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>GFR-15529863</td>
                                        <td><a href="#"><i class="zmdi zmdi-accounts-alt"></i> Mohamed Mahran</a></td>
                                        <td><a href="#">Vodafone</a></td>
                                        <td>124,000 L.E</td>
                                        <td><span class="badge badge-info">In progress</span></td>
                                        <td>
                                            <small>75% from order has been finished</small>

                                            <div class="progress">
                                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                        <td>12 July 2022, 08:43 AM</td>
                                        <td>Mohamed Zidan</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="{{adminUrl('sales-orders/1')}}" class="btn btn-info btn-sm"><i class="zmdi zmdi-eye"></i></a>
<!--                                            <a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete1" data-color="red"><i class="zmdi zmdi-delete"></i> </a>-->
                                        </td>
                                    </tr>

                                    {{--@foreach($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            <td><img class="table-image" src="{{assetPath($slider->bg_image_path)}}" alt="thumb" style="width: 60px"></td>
                                            <td>{{$slider->slider_en->title}}</td>
                                            <td>{{$slider->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{adminUrl('slider/'.$slider->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                                <a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete{{$slider->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach--}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($sliders))
        @foreach($sliders as $slider)
            <div class="modal fade" id="delete{{$slider->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Slider</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> Are You Sure From Deleting This Slider ? <strong> {{$slider->slider_en->name}} </strong></div>
                        <form id="deleteUser{{$slider->id}}" style="display: none" action="{{route('slider.destroy', $slider->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteUser{{$slider->id}}">Delete</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
