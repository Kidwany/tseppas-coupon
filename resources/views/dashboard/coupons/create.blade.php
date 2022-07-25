@extends('dashboard.layouts.layouts')
@section('title', 'Coupons')
@section('customizedStyle')
@endsection

@section('customizedScript')
    @include("dashboard.coupons.includes.scripts")
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
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('dashboard.layouts.messages')
                    <form action="{{adminUrl("coupons/store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6" id="service_provider">
                                                <label> Partner</label>
                                                <select name="customer" class="form-control show-tick ms select2"
                                                        data-placeholder="Choose Customer">
                                                    <option></option>
                                                    @if($customers)
                                                        @foreach($customers as $customer)
                                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
<!--                                            <div class="col-lg-3 col-md-6 mt-2 mb-0">
                                                <p class="mb-0"> <b>Type</b> </p>
                                                <div class="form-group">
                                                    <div class="radio inlineblock m-r-20">
                                                        <input type="radio" name="quotation_type" id="items" class="with-gap" value="1">
                                                        <label for="items">Items</label>
                                                    </div>
                                                    <div class="radio inlineblock">
                                                        <input type="radio" name="quotation_type" id="coupons" class="with-gap" value="2">
                                                        <label for="coupons">Coupons</label>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <label for="amount"> Amount </label>
                                                <div class="form-group">
                                                    <input  type="number" name="amount" value="{{old("amount")}}"
                                                           id="amount" class="form-control" placeholder="Amount">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <label for="discount"> Discount (%) </label>
                                                <div class="form-group">
                                                    <input type="number" step="any" name="discount" value="0"
                                                           id="discount" class="form-control" placeholder="Discount">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <label for="sub_total"> Sub Total </label>
                                                <div class="form-group">
                                                    <input disabled type="number" step="any" name="sub_total" value="{{old("sub_total")}}"
                                                           id="sub_total" class="form-control" placeholder="Sub Total">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <label for="tax"> Tax </label>
                                                <div class="form-group">
                                                    <input type="number" step="any" disabled name="tax" value="0.14" id="tax"
                                                           class="form-control" placeholder="Tax">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <label for="total"> Total </label>
                                                <div class="form-group">
                                                    <input disabled type="number" name="total" step="any" value="{{old("total")}}"
                                                           id="total" class="form-control" placeholder="Total">
                                                </div>
                                            </div>

                                        </div>

                                        <br>

                                        <div class="header d-flex justify-content-between">
                                            <h2><strong>List </strong> Coupons Details</h2>
                                        <!--                            <a href="{{adminUrl('coupons/create')}}" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add New </a>-->
                                        </div>
                                        <div id="coupon_section" class="coupon_section">
                                            <div class="row" data-id="0" id="coupon_category">
                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                    <label for="email_address"> Count </label>
                                                    <div class="form-group">
                                                        <input type="number" name="count[0]" value="{{old("count")}}"
                                                               id="email_address" class="form-control" placeholder="Count">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6" id="service_provider">
                                                    <label> Coupon category</label>
                                                    <select name="category[0]" class="form-control show-tick ms select2"
                                                            data-placeholder="Coupon category">
                                                        <option value="">Coupon category</option>
                                                        @if($couponCategories)
                                                            @foreach($couponCategories as $category)
                                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                    <label for="email_address"> Sub total </label>
                                                    <div class="form-group">
                                                        <input type="number" name="coupons_sub_total[0]" step="any"
                                                               value="{{old("coupons_sub_total")}}" id="email_address"
                                                               class="form-control" placeholder="Sub total">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                    <label for="email_address"> Notes </label>
                                                    <div class="d-flex">
                                                        <div style="width: 80%">
                                                            <div class="form-group">
                                                                <input type="text" name="coupons_notes[0]" value="{{old("coupons_notes")}}"
                                                                       id="email_address" class="form-control" placeholder="Notes">
                                                            </div>
                                                        </div>
                                                        <div style="width: 18%">
                                                            <button type="button" id="add_coupons" class="btn btn-success" style="height: 35px; margin-top: 0">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6 text-right">
                                                <ul class="list-unstyled">
                                                    <li><strong>Sub-Total:-</strong> 2930.00</li>
                                                    <li class="text-danger"><strong>Discount:-</strong> 12.9%</li>
                                                    <li><strong>Tax:-</strong> 14%</li>
                                                </ul>
                                                <h3 class="mb-0 text-success">2963 L.E</h3>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-6">
                                                <div class="form-group">
                                                    <div class="radio m-r-20">
                                                        <input type="radio" name="save_or_submit" id="save_or_submit"
                                                               class="with-gap" value="1">
                                                        <label for="save_or_submit"> Save and Exit</label>
                                                    </div>
                                                    <div class="radio m-r-20">
                                                        <input type="radio" name="save_or_submit" id="save_or_submit"
                                                               class="with-gap" value="2">
                                                        <label for="save_or_submit"> Submit for review</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
