<?php

namespace Tests\Unit;

use App\News;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testNews(){
        $this->assertIsArray(News::getNews());
    }

}

