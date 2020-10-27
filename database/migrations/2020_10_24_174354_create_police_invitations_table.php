<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_invitations', function (Blueprint $table) {
            $table->id();
            $table->string('officer_name');
            $table->string('rank');
            $table->string('invitee_name');
            $table->string('gender');
            $table->text('reason');
            $table->string('invitation_date');
            $table->string('police_district');
            $table->string('station_code');
            $table->string('invitee_address');
            $table->string('response_date');
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
        Schema::dropIfExists('police_invitations');
    }
}
