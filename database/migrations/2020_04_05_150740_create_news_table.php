<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('ID новости');
            $table->string('title')->comment('Заголовок новости');
            $table->mediumInteger('category_id')->comment('ID категории');
            $table->text('text')->comment('Текст новости');
            $table->string('img')->nullable(true)->comment('Путь к картинке');
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
