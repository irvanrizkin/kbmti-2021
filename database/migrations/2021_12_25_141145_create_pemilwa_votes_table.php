<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilwaVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilwa_votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            // Foreign Key
            $table->unsignedBigInteger('pemilwa_event_id')->nullable();
            $table->foreign('pemilwa_event_id', 'pemilwa_event_fk_5667436')->references('id')->on('pemilwa_events');
            $table->unsignedBigInteger('pemilwa_candidate_id')->nullable();
            $table->foreign('pemilwa_candidate_id', 'pemilwa_candidate_fk_5667437')->references('id')->on('pemilwa_candidates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilwa_votes');
    }
}
