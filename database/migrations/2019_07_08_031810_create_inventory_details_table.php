<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('previous_stock');
            $table->integer('new_stock');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('inventory_cuts_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('inventory_cuts_id')->references('id')->on('inventory_cuts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_details');
    }
}
