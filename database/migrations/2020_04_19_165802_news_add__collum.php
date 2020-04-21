<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsAddCollum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->integer('guid')->comment('Guid новости');
            $table->string('rss')->comment('Rss откуда взята новость');
            $table->string('link')->comment('Ссылка на новость');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('guid');
            $table->dropColumn('rss');
            $table->dropColumn('link');
        });
    }
}
