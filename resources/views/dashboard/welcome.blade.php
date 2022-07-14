@extends('dashboard.layouts.layouts')

@section('title', 'Dashboard')

@section('customizedStyle')
@endsection

@section('customizedScript')
    <link rel="stylesheet" href="{{assetPath("dashboard/assets/plugins/charts-c3/plugin.css")}}"/>
    @include('dashboard.charts.registercharts')
@endsection

@section('content')




    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                    <li class="breadcrumb-item active"> Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-left"></i></button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{--Statistics--}}
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon zmdi zmdi-view-list ">
                    <div class="body">
                        <h6>Sales Quotations</h6>
                        <h2> 124 <small class="info">Quotations</small></h2>
                        <small>Number of Sales Quotations  </small>
                        {{--<div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon zmdi zmdi-accounts-list">
                    <div class="body">
                        <h6>Sales Orders</h6>
                        <h2>114<small class="info"> Orders </small></h2>
                        <small>Sales Orders </small>
                        {{--<div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon zmdi zmdi-tag">
                    <div class="body">
                        <h6>Coupons</h6>
                        <h2> 12.1K <small class="info">Coupons</small></h2>
                        <small>Total Created Coupons</small>
                        {{--<div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>Customers</h6>
                        <h2> 110 <small class="info"> Customers </small></h2>
                        <small>Total Customers</small>
                        {{--<div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><i class="zmdi zmdi-chart"></i> General</strong> Statistics </h2>
                            <div class="header-dropdown d-flex flex-row justify-content-between">
<!--                                <select id="month" name="month" class="form-control show-tick ms select2" data-placeholder="اختر نوع الرمز الترويجي">
                                    <option value="">&#45;&#45; Choose Month &#45;&#45;</option>
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
                                </select>-->
                                <select disabled name="year" class="form-control show-tick ms select2" data-placeholder="اختر نوع الرمز الترويجي" style="margin-right: 8px">
                                    <option value="">Choose Year</option>
                                    <option value="2022" selected>2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="body">
                            <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
