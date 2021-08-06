<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventFieldChoicesTable extends Migration
{
    public function up()
    {
        Schema::table('event_field_choices', function (Blueprint $table) {
            $table->unsignedBigInteger('event_field_id')->nullable();
            $table->foreign('event_field_id', 'event_field_fk_4394210')->references('id')->on('event_fields');
        });
    }
}
