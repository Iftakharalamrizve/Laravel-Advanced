<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->comment('Primary key of Doctor table');
            $table->date('appointment_data');
            $table->string('patient_name');
            $table->string('patient_email')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('disease_details')->nullable();
            $table->string('sex')->nullable();
            $table->enum('status', ['Peanding', 'Completed','On Going'])->default('Peanding');
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
        Schema::dropIfExists('appointments');
    }
}
