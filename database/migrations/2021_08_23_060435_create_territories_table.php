<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Territories', function (Blueprint $table) {
            $table->string('TerritoryID')->primary();
            $table->string('Territory')->unique();
            $table->string('ZoneID');
            $table->foreign('ZoneID')->references('ZoneID')->on('Zones');
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
        Schema::dropIfExists('territories');
    }
}
