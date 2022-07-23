<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_quotations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("type", )->nullable()->comment("1 => sales quotation, 2 => sales order");
            $table->string("code");
            $table->integer("customer_id");
            $table->integer("status_id");
            $table->integer("sales_type_id");
            $table->decimal("sub_total");
            $table->decimal("discount");
            $table->decimal("tax");
            $table->decimal("total");
            $table->integer("items_count");
            $table->integer("total_quantity");
            $table->text("notes");
            $table->boolean("is_saved")->nullable();
            $table->boolean("is_submitted")->nullable();
            $table->integer("created_by");
            $table->integer("reviewed_by");
            $table->integer("approved_by");
            $table->timestamp("reviewed_at");
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
        Schema::dropIfExists('sales_quotations');
    }
}
