<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testGoodForm()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/admin/create/news')
                ->type('title', 'Тест')
                ->type('text', 'Текст длятеста длинный нужен, очень длинный иначе не пройдет, еще для верности надо')
                ->press('Добавить')
                ->assertPathIs('/admin/create/news');
        });
    }

    public function testBadForm()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/admin/create/news')
                ->type('title', 'Тес')
                ->press('Добавить')
                ->assertSee('Количество символов в поле \'Заголовок\' должно быть не менее 4.')
                ->assertPathIs('/admin/create/news');
        });
    }
}
