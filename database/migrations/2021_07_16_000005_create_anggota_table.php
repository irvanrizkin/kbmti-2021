<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('instagram_acc')->nullable();
            $table->string('linkedin_acc')->nullable();
            $table->string('keanggotaan');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
