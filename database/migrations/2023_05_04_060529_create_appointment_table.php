<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
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
            $table->string('title');
            $table->string('price');
            $table->longtext('description');
            $table->unsignedBigInteger('speacialist_id');
            $table->unsignedBigInteger('creator_id');
            $table->string('meeting_link')->nullable();
            $table->string('duration')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default('2');
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
        Schema::dropIfExists('appointment');
    }
}
