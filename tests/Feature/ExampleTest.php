<?php

namespace Tests\Feature;

use \App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $response = $this->get('/');
        $response->assertStatus(200);

        //Just to remember the assertSee
        $this->get('/')->assertSee('Login');
        
        //Learning how to make unit tests with Laravel
        factory(Product::class)->create();
        $products = Product::all();
        $this->assertCount(1, $products);
    }
}
