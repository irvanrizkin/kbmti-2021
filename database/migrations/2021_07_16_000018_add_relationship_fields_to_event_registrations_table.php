<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_fk_4393948')->references('id')->on('events');
        });
    }
}
