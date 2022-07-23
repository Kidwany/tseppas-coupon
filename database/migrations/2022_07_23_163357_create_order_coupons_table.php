<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_coupons', function (Blueprint $table) {
            $table->id();
            $table->integer("sales_order_id");
            $table->integer("coupon_category_id");
            $table->integer("customer_id");
            $table->integer("coupons_count");
            $table->decimal("unit_value");
            $table->decimal("total");
            $table->boolean("is_generated")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_coupons');
    }
}
