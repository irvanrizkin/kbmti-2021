<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventFieldChoicesTable extends Migration
{
    public function up()
    {
        Schema::create('event_field_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('choice')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
