<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorRatingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_rating_reviews', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('customer_id')->comment('Primary key of User table');
            $table->unsignedBigInteger('doctor_id')->comment('Primary key of User table');
            $table->integer('rating')->default(1);
            $table->string('review')->nullable();
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
        Schema::dropIfExists('doctor_rating_reviews');
    }
}
