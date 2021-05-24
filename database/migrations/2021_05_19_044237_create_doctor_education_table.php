<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->comment('Primary key of Doctor table');
            $table->enum('type', ['Education', 'Experiance'])->default('Education');
            $table->string('institution_name')->nullable();
            $table->string('discipline_name')->nullable();
            $table->string('period')->nullable();
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
        Schema::dropIfExists('doctor_education');
    }
}
