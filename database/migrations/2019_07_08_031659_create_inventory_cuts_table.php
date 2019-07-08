<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryCutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_cuts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('description');
            $table->softDeletes();
            $table->unsignedBigInteger('administrative_id');
            $table->timestamps();

            $table->foreign('administrative_id')->references('id')->on('administratives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_cuts');
    }
}
