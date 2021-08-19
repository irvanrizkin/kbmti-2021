<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMediaHandlresIdToAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id')->nullable();
            $table->foreign('media_id', 'media_fk_2')->references('id')->on('media_handlers');
        });
    }
}
