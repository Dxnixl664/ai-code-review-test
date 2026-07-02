<?php

namespace Tests\Feature;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    public function test_coupon_percent_off_can_be_updated(): void
    {
        $user = User::factory()->create();
        $coupon = Coupon::factory()->create(['code' => 'SAVE10', 'percent_off' => 10]);

        $response = $this->actingAs($user)->put("/coupons/{$coupon->id}", [
            'code' => 'SAVE20',
            'percent_off' => 20,
        ]);

        $response->assertRedirect(route('coupons.edit', $coupon));
        $this->assertEquals(20, $coupon->fresh()->percent_off);
    }
}
