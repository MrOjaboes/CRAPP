<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_slips', function (Blueprint $table) {
            $table->id();
            $table->string('station_code');
            $table->string('station_address');
            $table->string('victim_name');
            $table->text('victim_address');
            $table->string('case_type');
            $table->string('gender');
            $table->string('nationality');
            $table->string('hospital_name');
            $table->text('hospital_address');
            $table->double('hospital_bill',18,2)->default(0.00);
            $table->string('issued_date');
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('medical_slips');
    }
}
