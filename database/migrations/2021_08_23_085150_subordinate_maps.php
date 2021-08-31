<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubordinateMaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SubordinateMaps', function (Blueprint $table) {
            $table->id('MapID');
            $table->string('SupervisorID');
            $table->string('SubordinateID');
            $table->foreign('SupervisorID')->references('UserID')->on('UserManager');
            $table->foreign('SubordinateID')->references('UserID')->on('UserManager');
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
        //
    }
}
