<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOprecsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void 
     */ 
    public function up()
    {
        Schema::create('oprecs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('nim')->nullable();;
            $table->string('angkatan')->nullable();;
            $table->string('tempat_lahir')->nullable();;
            $table->string('tanggal_lahir')->nullable();;
            $table->string('alamat')->nullable();;
            $table->string('email')->nullable();;
            $table->string('id_line')->nullable();; 
            $table->string('no_hp')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oprecs');
    }
}
