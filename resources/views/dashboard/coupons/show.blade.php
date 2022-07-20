@extends('dashboard.layouts.layouts')
@section('title', 'Generate Coupon')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>
        $(function () {

            $(function () {
                //CKEditor
                CKEDITOR.replace('ckeditor');
                CKEDITOR.config.height = 300;

            });
            // Basic instantiation:
            $('#car_color').colorpicker();

            // Example using an event, to change the color of the #demo div background:
            $('#car_color').on('colorpickerChange', function (event) {
                $('.input-group-addon').css('background-color', event.color.toString());
            });
        });

        $("input[name=quotation_type]").click(function () {
            var type = $(this).val();
            if (type == 1) {
                $("#items_section").show();
                $("#coupon_section").hide();
            } else {
                $("#coupon_section").show();
                $("#items_section").hide();
            }
        });
    </script>
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Coupons</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name")}} </a></li>
                        <li class="breadcrumb-item active"> Coupons</li>

                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
        @include("dashboard.layouts.messages")
        <!-- Vertical Layout -->
            <form action="{{adminUrl("coupons/store")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <small class="text-muted">Sales Order Code: </small>
                                        <p>GFR-15529863</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Sales Agent: </small>
                                        <p>Mohamed Mahran</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Customer: </small>
                                        <p>Vodafone</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Approved By: </small>
                                        <p>Ahmed Zidan</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Created At: </small>
                                        <p>12 July 2022, 08:43 AM</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Last Update: </small>
                                        <p>12 July 2022, 08:43 AM</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Coupons Count: </small>
                                        <p>550</p>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Total Amount: </small>
                                        <p>124,00 K</p>
                                    </div>

                                    <div class="col-md-3">
                                        <small class="text-muted">Download Excel Template: </small>
                                        <p><a href="{{assetPath("excel_templates/Coupons template.xlsx")}}" class="btn btn-primary"><i class="zmdi zmdi-download"></i> Download </a></p>
                                    </div>
                                </div>

                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table
                                    class="table table-hover product_item_list c_table theme-color mb-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg"
                                    style="">
                                    <thead>
                                    <tr class="footable-header">
                                        <th class="footable-sortable footable-first-visible"
                                            style="display: table-cell;">#<span
                                                class="fooicon fooicon-sort"></span></th>
                                        <th class="footable-sortable" style="display: table-cell;">
                                            Quantity<span class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="sm xs" class="footable-sortable"
                                            style="display: table-cell;">Amount<span
                                                class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="xs" class="footable-sortable"
                                            style="display: table-cell;">Total<span
                                                class="fooicon fooicon-sort"></span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="display: table-cell;">1</td>
                                        <td style="display: table-cell;">100</td>
                                        <td style="display: table-cell;">200 L.E</td>
                                        <td style="display: table-cell;"><span class="col-green">20,000.00 L.E</span></td>
                                    </tr>
                                    <tr>
                                        <td style="display: table-cell;">2</td>
                                        <td style="display: table-cell;">50</td>
                                        <td style="display: table-cell;">500 L.E</td>
                                        <td style="display: table-cell;"><span class="col-green">25,000.00 L.E</span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-6">

                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Clients List</h2>
                            </div>
                            <div class="body">
                                <p>Try to upload <strong>EXCEL</strong> only</p>
                                <input type="file" class="dropify" data-allowed-file-extensions="xlsx png pdf">
                            </div>
                        </div>

                        <button type="button" data-toggle="modal" data-target="#confirmModal" class="btn btn-raised btn-primary btn-round waves-effect">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">Confirm Upload</h4>
                    </div>
                    <div class="modal-body">
                        You are about generating coupons for your clients <br>
                        Are You Sure you want to proceed ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success btn-round waves-effect">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
