<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModelIdAndNameToMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media_handlers', function (Blueprint $table) {
            // Add attributes
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media_handlers', function (Blueprint $table) {
            // Remove attributes
            $table->dropColumn('model_id');
            $table->dropColumn('model_name');
        });
    }
}
