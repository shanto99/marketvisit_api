<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserManager', function (Blueprint $table) {
            $table->string('UserID')->primary();
            $table->string('UserName')->default('');
            $table->string('Designation')->default('');
            $table->string('Email')->unique();
            $table->string('MobileNo')->unique();
            $table->string('TerritoryID')->nullable();
            $table->string('Password');
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
        Schema::dropIfExists('users');
    }
}
