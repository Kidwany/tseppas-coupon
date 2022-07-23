<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name");
            $table->string("phone", 30)->nullable();
            $table->string("email", 30)->nullable();
            $table->string("logo_path", 255)->nullable();
            $table->integer("employees_count");
            $table->integer("branches_count");
            $table->string("address");
            $table->integer("status_id")->nullable();
            $table->boolean("is_active")->nullable()->default(1);
            $table->integer("created_by")->nullable();
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
        Schema::dropIfExists('customers');
    }
}
