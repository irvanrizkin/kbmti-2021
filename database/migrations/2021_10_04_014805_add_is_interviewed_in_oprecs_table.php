<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsInterviewedInOprecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oprecs', function (Blueprint $table) {
            $table->boolean('is_interviewed')->after('pilihan2')->default(false)->nullable();
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
            $table->dropColumn("is_interviewed");
        });
    }
}
