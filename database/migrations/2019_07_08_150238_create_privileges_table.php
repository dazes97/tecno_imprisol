<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->unsignedBigInteger('case_use_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('case_use_id')->references('id')->on('case__uses');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
