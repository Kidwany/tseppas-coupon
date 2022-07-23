<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string("serial");
            $table->integer("coupon_category_id");
            $table->integer("customer_id");
            $table->integer("sales_order_id");
            $table->integer("status_id");
            $table->string("phone");
            $table->decimal("amount");
            $table->decimal("redeemed_amount");
            $table->decimal("left_amount");
            $table->boolean("redeemed")->default(0)->nullable();
            $table->timestamp("expire_date")->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
