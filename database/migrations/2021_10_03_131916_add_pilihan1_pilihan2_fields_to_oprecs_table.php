<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPilihan1Pilihan2FieldsToOprecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oprecs', function (Blueprint $table) {
            $table->string('pilihan1')->nullable()->after('no_hp');
            $table->string('pilihan2')->nullable()->after('pilihan1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oprecs', function (Blueprint $table) {
            $table->dropColumn('pilihan1');
            $table->dropColumn('pilihan2');
        });
    }
}
