<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Primary key of User table');
            $table->string('name');
            $table->string('qualification')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('sex')->nullable();
            $table->enum('is_active', ['YES', 'NO'])->default('NO');
            $table->enum('is_band', ['YES', 'NO'])->default('NO');
            $table->binary('about')->nullable();
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
        Schema::dropIfExists('assistants');
    }
}
