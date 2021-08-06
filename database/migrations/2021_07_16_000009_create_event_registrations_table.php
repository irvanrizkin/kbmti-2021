<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dummy_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
