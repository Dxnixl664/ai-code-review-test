<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_page_can_be_rendered(): void
    {
        $user = User::factory()->create();
        Product::create(['name' => 'Widget', 'description' => 'A widget', 'price' => 9.99]);

        $response = $this->actingAs($user)->get('/products');

        $response->assertOk();
    }

    public function test_products_can_be_searched_by_name(): void
    {
        $user = User::factory()->create();
        Product::create(['name' => 'Blue Widget', 'description' => '', 'price' => 9.99]);
        Product::create(['name' => 'Red Gadget', 'description' => '', 'price' => 12.99]);

        $response = $this->actingAs($user)->get('/products?search=Widget');

        $response->assertOk();
    }
}
