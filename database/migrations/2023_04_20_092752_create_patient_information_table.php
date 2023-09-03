<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_information', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('current_department')->nullable();
            $table->string('current_class');
            $table->string('current_school')->nullable();
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
        Schema::dropIfExists('patient_information');
    }
}
