<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventFieldResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('event_field_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('response')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
