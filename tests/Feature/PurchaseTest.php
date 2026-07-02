<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_purchasing_decrements_stock(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['stock' => 5]);

        $response = $this->actingAs($user)->post("/products/{$product->id}/purchase");

        $response->assertRedirect();
        $this->assertEquals(4, $product->fresh()->stock);
    }

    public function test_cannot_purchase_out_of_stock_product(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['stock' => 0]);

        $response = $this->actingAs($user)->post("/products/{$product->id}/purchase");

        $response->assertSessionHasErrors('stock');
    }
}
