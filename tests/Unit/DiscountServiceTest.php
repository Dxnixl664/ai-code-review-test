<?php

namespace Tests\Unit;

use App\Services\DiscountService;
use Carbon\Carbon;
use Tests\TestCase;

class DiscountServiceTest extends TestCase
{
    public function test_discount_applies_well_before_cutoff(): void
    {
        $service = new DiscountService();

        $rate = $service->earlyBirdDiscountRate(
            Carbon::parse('2026-01-01'),
            Carbon::parse('2026-02-01')
        );

        $this->assertEquals(0.15, $rate);
    }

    public function test_no_discount_well_after_cutoff(): void
    {
        $service = new DiscountService();

        $rate = $service->earlyBirdDiscountRate(
            Carbon::parse('2026-03-01'),
            Carbon::parse('2026-02-01')
        );

        $this->assertEquals(0.0, $rate);
    }
}
