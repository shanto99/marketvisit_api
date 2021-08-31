<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Outlets', function (Blueprint $table) {
            $table->string('OutletCode')->primary();
            $table->string('OutletName');
            $table->string('OutletAddress');
            $table->string('ContactPerson');
            $table->string('OutletPhone');
            $table->string('AssignedSR');
            $table->string('TerritoryID');
            $table->foreign('AssignedSR')->references('UserID')->on('UserManager');
            $table->foreign('TerritoryID')->references('TerritoryID')->on('Territories');
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
        Schema::dropIfExists('outlets');
    }
}
