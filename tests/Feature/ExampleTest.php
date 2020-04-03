<?php

namespace Tests\Feature;

use App\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function testHeader(){
        $resp = $this->get('/');
        $resp->assertHeader('Content-type', 'text/html; charset=UTF-8');
    }

    public function testNewsPage(){
        $resp = $this->get('/news');
        $resp->assertSeeText('Главные новости');
    }

    public function testMainPage(){
        $resp = $this->get('/');
        $resp->assertSeeText('Главная страница');
    }

    public function testContactsPage(){
        $resp = $this->get('/contacts');
        $resp->assertSeeText('@');
    }

    public function testLoginPage(){
        $resp = $this->get('/login');
        $resp->assertSeeText('Войти');
    }

    public function testCategoryPage(){
        $resp = $this->get('/news/category/test');
        $resp->assertHeader('Content-type', 'text/html; charset=UTF-8');
        $resp->assertStatus(200);
    }

}
