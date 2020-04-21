<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_in_soc', 20)
                ->default('')
                ->comment('id соц сети');
            $table->enum('type_auth', ['site', 'vk', 'git'])
                ->default('site')
                ->comment('Типаутентификации пользователя поумолчанию');
            $table->string('avatar', 150)
                ->default('https://img.icons8.com/ios/50/000000/laravel.png')
                ->comment('Ссылка на аватар');
            $table->index('id_in_soc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'id_in_soc',
                'type_auth',
                'avatar'
            ]);
        });
    }
}
