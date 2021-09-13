<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationshioToMatkuliahsFromBankSoalMateris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_soal_materis', function (Blueprint $table) {
            $table->unsignedBigInteger('matkuliah_id');
            $table->foreign('matkuliah_id', 'matkuliah_fk_4852184')->references('id')->on('matkuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_soal_materis', function (Blueprint $table) {
            // Remove foreign
            $table->dropForeign('matkuliah_fk_4852184');
            $table->dropColumn('matkuliah_id');
        });
    }
}
