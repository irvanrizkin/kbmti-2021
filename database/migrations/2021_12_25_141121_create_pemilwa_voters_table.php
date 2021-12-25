<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilwaVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilwa_voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim')->nullable();
            $table->string('email')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // Foreign Key
            $table->unsignedBigInteger('pemilwa_event_id')->nullable();
            $table->foreign('pemilwa_event_id', 'pemilwa_event_fk_5667425')->references('id')->on('pemilwa_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilwa_voters');
    }
}
