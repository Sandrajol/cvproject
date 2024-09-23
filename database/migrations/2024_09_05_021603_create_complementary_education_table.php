<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('complementary_education', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('institution');
            $table->year('year');
            $table->foreignId('personal_data_id')->constrained('personal_data')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('complementary_education');
    }
};
