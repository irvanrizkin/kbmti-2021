<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBeritaTestTable extends Migration
{

    // Can not be roll-backed

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Remove table berita-test
        Schema::dropIfExists('berita_test');
    }

}
