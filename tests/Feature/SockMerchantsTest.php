<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SockMerchantsTest extends TestCase
{
    /** @test */
    public function case_1()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'n' => 9,
            'ar' => [10, 20, 20, 10, 10, 30, 50, 10, 20]
        ];

        $this->post('/sockmerchants', $attributes)->assertHeader('foo', 3);
    }

    /** @test */
    public function case_2()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'n' => 15,
            'ar' => [6, 5, 2, 3, 5, 2, 2, 1, 1, 5, 1, 3, 3, 3, 5]
        ];

        $this->post('/sockmerchants', $attributes)->assertHeader('foo', 6);
    }

    /** @test */
    public function case_3()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'n' => 19,
            'ar' => [6, 5, 2, 3, 5, 2, 99, 1, 53, 5, 1, 9, 3, 3, 0, 8, 8, 8, 8]
        ];

        $this->post('/sockmerchants', $attributes)->assertHeader('foo', 6);
    }

    /** @test */
    public function case_4()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'n' => 4,
            'ar' => [0, 2, 3, 1]
        ];

        $this->post('/sockmerchants', $attributes)->assertHeader('foo', 0);
    }
}
