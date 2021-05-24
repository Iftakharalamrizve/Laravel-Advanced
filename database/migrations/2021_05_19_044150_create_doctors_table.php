<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Primary key of User table');
            $table->unsignedBigInteger('sector_id')->comment('Primary key of Sector table');
            $table->unsignedBigInteger('location_id')->comment('Primary key of Location table');
            $table->string('qualification')->nullable();
            $table->string('phone')->nullable();
            $table->string('fees')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('sex')->nullable();
            $table->enum('is_emergency_support', ['YES', 'NO'])->default('NO');
            $table->enum('is_featured', ['YES', 'NO'])->default('NO');
            $table->enum('is_active', ['YES', 'NO'])->default('NO');
            $table->enum('is_band', ['YES', 'NO'])->default('NO');
            $table->binary('about')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
