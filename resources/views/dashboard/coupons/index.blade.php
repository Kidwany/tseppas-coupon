@extends('dashboard.layouts.layouts')
@section('title', 'Coupons')
@section('customizedStyle')
@endsection

@section('customizedScript')
    @include("dashboard.coupons.includes.charts")
@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Coupons</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('coupons')}}">Coupons </a></li>
                        <li class="breadcrumb-item active"> All Coupons </li>
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
                <div class="col-lg-6">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="body text-center">
                                <div id="order_chart" class="c3_chart d_distribution"></div>
                                {{--<button class="btn btn-primary mt-4 mb-4">View More</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @include('dashboard.coupons.includes.statistics')
                </div>
            </div>

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('dashboard.layouts.messages')
                    <div class="card">
                        <div class="header d-flex justify-content-between">
                            <h2><strong>List </strong> Coupons </h2>
<!--                            <a href="{{adminUrl('coupons/create')}}" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add New </a>-->
                        </div>
                        <!-- Advanced Select2 -->
                        <div class="body">
                            <div class="table-responsive"><strong>List </strong> Coupons
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card mb-0">
                                            <div class="header">
                                                <h2><strong>Filter</strong> Coupons By</h2>
                                                <ul class="header-dropdown">

                                                </ul>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-md-6">
                                                        <p class="mb-0"> <b>Customers</b> </p>
                                                        <select class="form-control show-tick ms select2" data-placeholder="Filter By Customers">
                                                            <option></option>
                                                            <option>Vodafone</option>
                                                            <option>Orange</option>
                                                            <option>Misr Bank</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <p class="mb-0"> <b>Sales Agents</b> </p>
                                                        <select class="form-control show-tick ms select2" data-placeholder="Filter By Customers">
                                                            <option></option>
                                                            <option>Ahmed Osama</option>
                                                            <option>Sayed Hanafy</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <p class="mb-0"> <b>Discount</b> </p>
                                                        <select class="form-control show-tick ms select2" data-placeholder="Filter By Discount Amount">
                                                            <option></option>
                                                            <option>100 L.E</option>
                                                            <option>200 L.E</option>
                                                            <option>500 L.E</option>
                                                            <option>1000 L.E</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <p class="mb-0"> <b>Month</b> </p>
                                                        <select class="form-control show-tick ms select2" data-placeholder="Choose Month">
                                                            <option></option>
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
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <p class="mb-0"> <b>Year</b> </p>
                                                        <select class="form-control show-tick ms select2" data-placeholder="Choose Year">
                                                            <option></option>
                                                            <option>2021</option>
                                                            <option>2022</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 mt-2 mb-0">
                                                        <p class="mb-0"> <b>Status</b> </p>
                                                        <div class="form-group">
                                                            <div class="radio inlineblock m-r-20">
                                                                <input type="radio" name="status" id="all" class="with-gap" value="option1" checked>
                                                                <label for="all">All</label>
                                                            </div>
                                                            <div class="radio inlineblock m-r-20">
                                                                <input type="radio" name="status" id="approved" class="with-gap" value="option1">
                                                                <label for="approved">Redeemed</label>
                                                            </div>
                                                            <div class="radio inlineblock">
                                                                <input type="radio" name="status" id="rejected" class="with-gap" value="pending">
                                                                <label for="rejected">Pending</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary"> <i class="zmdi zmdi-filter-list"></i> Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="ssss" class="table table-bordered table-striped table-hover js-exportable dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Code </th>
                                        <th> Customer </th>
                                        <th> Client </th>
                                        <th> Discount </th>
                                        <th> Status </th>
                                        <th> Expire Date </th>
                                        <th> Created at </th>
                                        <th> Created By </th>
                                        <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th> Code </th>
                                        <th> Customer </th>
                                        <th> Client </th>
                                        <th> Discount </th>
                                        <th> Status </th>
                                        <th> Expire Date </th>
                                        <th> Created at </th>
                                        <th> Created By </th>
                                        <th> Actions </th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>GFR-15529863</td>
                                        <td><a href="#">Vodafone</a></td>
                                        <td><a href="#">Mohamed Kidwany</a></td>
                                        <td>100,00 L.E</td>
                                        <td><span class="badge badge-success">Redeemed</span></td>
                                        <td>12 July 2022, 08:43 AM</td>
                                        <td>11 July 2023, 11:00 AM</td>
                                        <td>Mohamed Hamdy</td>
                                        <td>
<!--                                            <a href="{{adminUrl('coupons/1/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#" class="btn btn-info btn-sm"><i class="zmdi zmdi-eye"></i></a>-->
                                            <a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete1" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>GFR-15529863</td>
                                        <td><a href="#">Misr Bank</a></td>
                                        <td><a href="#">Sayed Ali</a></td>
                                        <td>200,00 L.E</td>
                                        <td><span class="badge badge-info">Pending</span></td>
                                        <td>12 July 2022, 08:43 AM</td>
                                        <td>11 July 2023, 11:00 AM</td>
                                        <td>Mohamed Hamdy</td>
                                        <td>
                                        <!-- <a href="{{adminUrl('coupons/1/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#" class="btn btn-info btn-sm"><i class="zmdi zmdi-eye"></i></a>-->
                                            <a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete1" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
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
