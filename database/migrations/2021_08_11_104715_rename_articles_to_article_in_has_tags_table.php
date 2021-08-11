<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameArticlesToArticleInHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('has_tags', function (Blueprint $table) {
            $table->renameColumn('articles_id', 'article_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('has_tags', function (Blueprint $table) {
            $table->renameColumn('article_id', 'articles_id');
        });
    }
}
