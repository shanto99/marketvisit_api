<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttendanceIdToAttendanceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('AttendanceImages', function (Blueprint $table) {
            $table->foreign('AttendanceID')->references('AttendanceID')->on('Attendances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_images', function (Blueprint $table) {
            //
        });
    }
}
