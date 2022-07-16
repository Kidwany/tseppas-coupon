@extends('dashboard.layouts.layouts')
@section('title', 'New Sales Quotation')
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

        $("input[name=quotation_type]").click(function() {
            var type = $(this).val();
            if (type == 1){
                $("#items_section").show();
                $("#coupon_section").hide();
            }else {
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
                    <h2>Sales Quotations</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name_ar")}} </a></li>
                        <li class="breadcrumb-item active"> Sales Quotations</li>

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
            <form action="{{adminUrl("sales-quotations/store")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6" id="service_provider">
                                        <label> Customer</label>
                                        <select name="customer" class="form-control show-tick ms select2"
                                                data-placeholder="Choose Customer">
                                            <option></option>
                                            <option>Vodafone</option>
                                            <option>Orange</option>
                                            <option>Misr Bank</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mt-2 mb-0">
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
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label for="email_address"> Amount </label>
                                        <div class="form-group">
                                            <input type="number" name="amount" value="{{old("amount")}}"
                                                   id="email_address" class="form-control" placeholder="Amount">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label for="email_address"> Discount </label>
                                        <div class="form-group">
                                            <input type="number" step="any" name="discount" value="{{old("discount")}}"
                                                   id="email_address" class="form-control" placeholder="Discount">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label for="email_address"> Sub Total </label>
                                        <div class="form-group">
                                            <input type="number" step="any" name="sub_total" value="{{old("sub_total")}}"
                                                   id="email_address" class="form-control" placeholder="Sub Total">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label for="email_address"> Tax </label>
                                        <div class="form-group">
                                            <input type="number" step="any" disabled name="tax" value="0.14" id="email_address"
                                                   class="form-control" placeholder="Tax">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label for="email_address"> Total </label>
                                        <div class="form-group">
                                            <input type="number" name="total" step="any" value="{{old("total")}}"
                                                   id="email_address" class="form-control" placeholder="Total">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label for="email_address"> Date </label>
                                        <div class="form-group">
                                            <input type="date" name="date" value="{{old("date")}}" id="email_address"
                                                   class="form-control" placeholder="Date">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="email_address"> Payment Notes </label>
                                        <div class="form-group">
                                            <textarea id="ckeditor" name="payment_notes" class="form-control no-resize"
                                                      placeholder="Payment Notes">{{old("payment_notes")}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div id="coupon_section" style="display: none" class="coupon_section">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label for="email_address"> Count </label>
                                            <div class="form-group">
                                                <input type="number" name="count" value="{{old("count")}}"
                                                       id="email_address" class="form-control" placeholder="Count">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6" id="service_provider">
                                            <label> Coupon category</label>
                                            <select name="category" class="form-control show-tick ms select2"
                                                    data-placeholder="Coupon category">
                                                <option value="">Coupon category</option>
                                                <option value="">10% Discount</option>
                                                <option value="">20% Discount</option>
                                                <option value="">25% Discount</option>
                                                <option value="">100 L.E Discount</option>
                                                <option value="">200 L.E Discount</option>
                                                <option value="">400 L.E Discount</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label for="email_address"> Sub total </label>
                                            <div class="form-group">
                                                <input type="number" name="coupons_sub_total" step="any"
                                                       value="{{old("coupons_sub_total")}}" id="email_address"
                                                       class="form-control" placeholder="Sub total">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label for="email_address"> Notes </label>
                                            <div class="d-flex">
                                                <div style="width: 80%">
                                                    <div class="form-group">
                                                        <input type="text" name="coupons_notes" value="{{old("coupons_notes")}}"
                                                               id="email_address" class="form-control" placeholder="Notes">
                                                    </div>
                                                </div>
                                                <div style="width: 18%">
                                                    <button class="btn btn-success" style="height: 35px; margin-top: 0">+</button>

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
                                </div>

                                <div id="items_section" style="display: none" class="items_section">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6" id="service_provider">
                                            <label> Item</label>
                                            <select name="item_id" class="form-control show-tick ms select2"
                                                    data-placeholder="Item">
                                                <option value="">Item</option>
                                                <option value="">كنافة بالقشطة</option>
                                                <option value="">حلويات شرقية مشكل</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label for="email_address"> Item Price </label>
                                            <div class="form-group">
                                                <input type="number" name="price" value="{{old("price")}}"
                                                       id="email_address" class="form-control" placeholder="Item Price">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label for="email_address"> Quantity </label>
                                            <div class="form-group">
                                                <input type="number" name="qty" value="{{old("qty")}}" id="email_address"
                                                       class="form-control" placeholder="Quantity">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label for="email_address"> Sub total </label>
                                            <div class="d-flex">
                                                <div style="width: 80%">
                                                    <div class="form-group">
                                                        <input type="number" name="items_sub_total"
                                                               value="{{old("items_sub_total")}}" id="email_address"
                                                               class="form-control" placeholder="Sub total">
                                                    </div>
                                                </div>
                                                <div style="width: 18%">
                                                    <button class="btn btn-success" style="height: 35px; margin-top: 0">+</button>

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
            </form>
        </div>
    </div>
@endsection
