<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_4553482')->references('id')->on('departments');
        });
    }
}
