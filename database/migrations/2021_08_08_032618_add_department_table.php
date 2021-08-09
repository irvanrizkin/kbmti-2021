<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Departments Table
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('initial');
            $table->longText('description');
            $table->string('type');
            $table->string('sub_type');
            $table->timestamps();
            $table->softDeletes();
        });
        // Renew Table Anggota
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropColumn('keanggotaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Un create departments
        Schema::dropIfExists('departments');

        Schema::table('anggota', function (Blueprint $table) {
            $table->string('keanggotaan')->after('linkedin_acc');
        });
    }
}
