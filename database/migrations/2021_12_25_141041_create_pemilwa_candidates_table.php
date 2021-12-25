<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilwaCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilwa_candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('no_urut')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // Foreign Key
            $table->unsignedBigInteger('pemilwa_event_id')->nullable();
            $table->foreign('pemilwa_event_id', 'pemilwa_event_fk_5667418')->references('id')->on('pemilwa_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilwa_candidates');
    }
}
