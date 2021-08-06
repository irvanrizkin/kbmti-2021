<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('event_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
