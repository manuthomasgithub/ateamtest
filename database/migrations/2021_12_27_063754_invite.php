<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::rename('invite', 'invites');
/*      Schema::create('invite', function (Blueprint $table) {
	      $table->increments('id');
	      $table->integer('event_id');
              $table->string('email_id');
              $table->boolean('status');
              $table->timestamps();
});*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invite');
    }
}
