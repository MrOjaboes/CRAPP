<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prison_records', function (Blueprint $table) {
            $table->id();
            $table->string('accused_name');
            $table->string('charge_number');
            $table->string('arraignment_date');
            $table->string('offence_nature');
            $table->string('court_name');
            $table->string('prison_charge');
            $table->string('conviction_period')->nullable();
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
        Schema::dropIfExists('prison_records');
    }
}
