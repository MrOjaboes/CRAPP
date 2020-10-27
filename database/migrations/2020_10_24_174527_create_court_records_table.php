<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_records', function (Blueprint $table) {
            $table->id();
            $table->string('defendant_name');
            $table->string('charge_number');
            $table->string('offence_nature');
            $table->string('court_name');
            $table->string('court_charge');
            $table->string('gender');
            $table->string('arraignment_date');
            $table->string('final_charge');
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
        Schema::dropIfExists('court_records');
    }
}
