<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistant_doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assistant_id')->comment('Primary key of Assistant table');
            $table->unsignedBigInteger('doctor_id')->comment('Primary key of Doctor table');
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
        Schema::dropIfExists('assistant_doctors');
    }
}
