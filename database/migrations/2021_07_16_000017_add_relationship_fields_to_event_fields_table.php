<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventFieldsTable extends Migration
{
    public function up()
    {
        Schema::table('event_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_fk_4393916')->references('id')->on('events');
        });
    }
}
