<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('professional_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('Profile')->limit(500);
            $table->unsignedBigInteger('personal_data_id');
            $table->foreign('personal_data_id')->references('id')->on('personal_data')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professional_profiles');
    }
}
