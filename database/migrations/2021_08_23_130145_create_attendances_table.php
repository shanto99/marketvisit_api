<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Attendances', function (Blueprint $table) {
            $table->id('AttendanceID');
            $table->string('SnapperID');
            $table->string('OutletCode');
            $table->foreign('SnapperID')->references('UserID')->on('UserManager');
            $table->foreign('OutletCode')->references('OutletCode')->on('Outlets');
            $table->decimal('Lat', 10, 7)->nullable();
            $table->decimal('Lng', 10, 7)->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
