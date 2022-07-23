<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer("sales_order_id");
            $table->integer("product_id");
            $table->integer("status_id");
            $table->string("remote_item_id")->nullable();
            $table->string("item_name");
            $table->decimal("unit_price");
            $table->integer("quantity");
            $table->string("notes", 255)->nullable();
            $table->decimal("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
