<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceMoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_molds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned()->index();
            $table->integer('mold_id')->unsigned()->index();
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
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
        Schema::dropIfExists('device_molds');
    }
}
