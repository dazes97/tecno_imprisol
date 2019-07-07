<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliberiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliberies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->date('register_date');
            $table->date('delivery_date')->nullable();
            $table->string('destine')->nullable();
            $table->string('estado');
            $table->unsignedBigInteger('sale_id');
            $table->softDeletes();
            $table->foreign('sale_id')->references('id')->on('sales');
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
        Schema::dropIfExists('deliberies');
    }
}
