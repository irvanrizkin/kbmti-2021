<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingProkersTable extends Migration
{
    public function up()
    {
        Schema::create('upcoming_prokers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('caption');
            $table->string('description');
            $table->string('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
