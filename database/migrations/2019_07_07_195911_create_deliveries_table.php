<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->date('register_date');
            $table->date('delivery_date')->nullable();
            $table->string('destine')->nullable();
            $table->string('estado');
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('administrative_id')->nullable();
            $table->softDeletes();
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('administrative_id')->references('id')->on('administratives');
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
        Schema::dropIfExists('deliveries');
    }
}
