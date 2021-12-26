<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDoneFieldToPemilwaVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemilwa_voters', function (Blueprint $table) {
            $table->boolean('is_done')->default(false)->nullable()->after('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemilwa_voters', function (Blueprint $table) {
            $table->dropColumn('is_done');
        });
    }
}
