@extends('dashboard.layouts.layouts')
@section('title', 'Slider')
@section('customizedStyle')
@endsection

@section('customizedScript')

@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sales Quotations</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('sales-quotations')}}">Sales Quotations </a></li>
                        <li class="breadcrumb-item active"> All Sales Quotations </li>
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
                            <h2><strong>List </strong> Sales Quotations </h2>
                            <a href="{{adminUrl('sales-quotations/create')}}" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add New </a>
                        </div>
                        <!-- Advanced Select2 -->
                        <div class="body">
                            <div class="table-responsive"><strong>List </strong> Sales Quotations
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card mb-0">
                                            <div class="header">
                                                <h2><strong>Filter</strong> Quotations By</h2>
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
                                                            <option>Vodafone</option>
                                                            <option>Orange</option>
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
                                                                <label for="approved">Approved</label>
                                                            </div>
                                                            <div class="radio inlineblock">
                                                                <input type="radio" name="status" id="rejected" class="with-gap" value="option2">
                                                                <label for="rejected">Rejected</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 mt-2 mb-0">
                                                        <p class="mb-0"> <b>Type</b> </p>
                                                        <div class="form-group">
                                                            <div class="radio inlineblock m-r-20">
                                                                <input type="radio" name="type" id="all" class="with-gap" value="option1" checked>
                                                                <label for="all">All</label>
                                                            </div>
                                                            <div class="radio inlineblock m-r-20">
                                                                <input type="radio" name="type" id="items" class="with-gap" value="option1">
                                                                <label for="items">Items</label>
                                                            </div>
                                                            <div class="radio inlineblock">
                                                                <input type="radio" name="type" id="coupons" class="with-gap" value="option2">
                                                                <label for="coupons">Coupons</label>
                                                            </div>
                                                        </div>
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
                                        <th> Sales Agent </th>
                                        <th> Customer </th>
                                        <th> Quotation Amount </th>
                                        <th> Discount </th>
                                        <th> Type </th>
                                        <th> Status </th>
                                        <th> Reviewed at </th>
                                        <th> Created at </th>
                                        <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th> Code </th>
                                        <th> Sales Agent </th>
                                        <th> Customer </th>
                                        <th> Quotation Amount </th>
                                        <th> Discount </th>
                                        <th> Type </th>
                                        <th> Status </th>
                                        <th> Reviewed at </th>
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
                                        <td>15%</td>
                                        <td><i class="zmdi zmdi-account"></i> Items</td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>12 July 2022, 08:43 AM</td>
                                        <td>11 July 2022, 11:00 AM</td>
                                        <td>
                                            <a href="{{adminUrl('slider/1/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#" class="btn btn-info btn-sm"><i class="zmdi zmdi-eye"></i></a>
                                            <a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete1" data-color="red"><i class="zmdi zmdi-delete"></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>GFR-15529863</td>
                                        <td><a href="#"><i class="zmdi zmdi-account"></i> Ahmed Azmy</a></td>
                                        <td><a href="#">Misr Bank</a></td>
                                        <td>124,000 L.E</td>
                                        <td>15%</td>
                                        <td><i class="zmdi zmdi-tag"></i> Coupons</td>
                                        <td><span class="badge badge-danger">Rejected</span></td>
                                        <td>12 July 2022, 08:43 AM</td>
                                        <td>11 July 2022, 11:00 AM</td>
                                        <td>
                                            <a href="{{adminUrl('sales-quotations/1/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="#" class="btn btn-info btn-sm"><i class="zmdi zmdi-eye"></i></a>
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
