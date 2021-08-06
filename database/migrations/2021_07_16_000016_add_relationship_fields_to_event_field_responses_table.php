<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventFieldResponsesTable extends Migration
{
    public function up()
    {
        Schema::table('event_field_responses', function (Blueprint $table) {
            $table->unsignedBigInteger('event_registration_id')->nullable();
            $table->foreign('event_registration_id', 'event_registration_fk_4394027')->references('id')->on('event_registrations');
            $table->unsignedBigInteger('event_field_id')->nullable();
            $table->foreign('event_field_id', 'event_field_fk_4394028')->references('id')->on('event_fields');
        });
    }
}
