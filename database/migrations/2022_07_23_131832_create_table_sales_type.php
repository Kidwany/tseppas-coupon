<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class CreateTableSalesType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_type', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code");
            $table->boolean("is_active")->nullable()->default(1);
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'SalesTypeSeeder',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_type');
    }
}
