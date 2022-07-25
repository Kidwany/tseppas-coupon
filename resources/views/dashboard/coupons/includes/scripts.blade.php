<script>
    $(document).ready(function () {
        var count           = 1;
        var maxField        = 5; //Input fields Increment Limitation
        var addButton       = document.getElementById('add_coupons');
        var fieldsWrapper   = document.getElementById('coupon_section');
        $(addButton).click(function () {
            var fieldHtml =
                '           <div class="row coupon-row" data-id="'+count+'" id="coupon_category">\n' +
                '                <div class="col-lg-3 col-md-12 col-sm-12">\n' +
                '                    <label for="email_address"> Count </label>\n' +
                '                    <div class="form-group">\n' +
                '                        <input type="number" name="count" value="{{old("count")}}"\n' +
                '                               id="email_address" class="form-control" placeholder="Count">\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '                <div class="col-lg-3 col-md-6" id="service_provider">\n' +
                '                    <label> Coupon category</label>\n' +
                '                    <select name="category['+count+']" class="form-control show-tick ms select2"\n' +
                '                            data-placeholder="Coupon category">\n' +
                '                        <option value="">Coupon category</option>\n' +
                '                        @if($couponCategories)\n' +
                '                            @foreach($couponCategories as $category)\n' +
                '                                <option value="{{$category->id}}">{{$category->title}}</option>\n' +
                '                            @endforeach\n' +
                '                        @endif\n' +
                '                    </select>\n' +
                '                </div>\n' +
                '                <div class="col-lg-3 col-md-12 col-sm-12">\n' +
                '                    <label for="email_address"> Sub total </label>\n' +
                '                    <div class="form-group">\n' +
                '                        <input type="number" name="coupons_sub_total['+count+']" step="any"\n' +
                '                               value="{{old("coupons_sub_total")}}" id="email_address"\n' +
                '                               class="form-control" placeholder="Sub total">\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '\n' +
                '                <div class="col-lg-3 col-md-12 col-sm-12">\n' +
                '                    <label for="email_address"> Notes </label>\n' +
                '                    <div class="d-flex">\n' +
                '                        <div style="width: 80%">\n' +
                '                            <div class="form-group">\n' +
                '                                <input type="text" name="coupons_notes['+count+']" value="{{old("coupons_notes")}}"\n' +
                '                                       id="email_address" class="form-control" placeholder="Notes">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div style="width: 18%">\n' +
                '                            <button data-id='+count+' type="button" id="remove_coupons" class="btn btn-danger" style="height: 35px; margin-top: 0">' +
                '                                        <i class="zmdi zmdi-delete"></i>' +
                '                            </button>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>';
            $(fieldsWrapper).append(fieldHtml);
            count++;
        });
        $(fieldsWrapper).on('click', '#remove_coupons', function (e) {
            e.preventDefault();
            /*$(this).parent('div').remove();
            $(this).parent('div').next().remove();*/
            var id = $(this).data("id");
            var body_container = $(".coupon-row").each(function (e) {
                var body_id = $(this).attr('data-id');
                if (body_id == id)
                {
                    $(this).remove();
                }
            });
            count--;
        })
    });
</script>

<script>
    document.getElementById("amount").addEventListener("input", function(){
        var discount = document.getElementById("discount").value;
        if(discount <= 0){
            document.getElementById("sub_total").value = this.value
        }
        else {
            document.getElementById("sub_total").value = this.value - ((this.value * discount)/100)
        }
        document.getElementById("total").value = parseFloat(this.value) + ((parseFloat(document.getElementById("sub_total").value) * 14)/100);
    });

    document.getElementById("discount").addEventListener("input", function(){
        var discount = document.getElementById("discount").value;
        if(this.value <= 0){
            document.getElementById("sub_total").value = document.getElementById("amount").value
        }
        else {
            document.getElementById("sub_total").value = document.getElementById("amount").value - ((document.getElementById("amount").value * this.value)/100)
        }
        document.getElementById("total").value = parseFloat(document.getElementById("amount").value) + ((parseFloat(document.getElementById("sub_total").value) * 14)/100);
    });
</script>
