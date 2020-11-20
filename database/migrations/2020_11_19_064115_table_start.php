<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableStart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineTable', function(Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_name');
            $table->integer('id_type');
            $table->integer('id_value');
            $table->integer('engine_power');
            $table->integer('price');
            $table->string('location');
            $table->double('engine_displacement_value');
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engineTable');
    }
}
