<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("remote_id");
            $table->string("category_id");
            $table->string("code");
            $table->string("url");
            $table->string("title");
            $table->text("description");
            $table->string("remote_category_name");
            $table->decimal("price");
            $table->decimal("tax");
            $table->boolean("in_stock")->nullable()->default(1);
            $table->integer("created_by");
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
        Schema::dropIfExists('products');
    }
}
