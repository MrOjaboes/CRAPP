<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_records', function (Blueprint $table) {
            $table->id();
            $table->string('suspect_name');
            $table->string('file_number');
            $table->string('police_formation');
            $table->string('date_of_arrest');
            $table->text('nature_of_offence');
            $table->string('admin_suspect');
            $table->text('remarks');
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
        Schema::dropIfExists('police_records');
    }
}
