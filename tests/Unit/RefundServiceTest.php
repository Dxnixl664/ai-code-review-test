<?php

namespace Tests\Unit;

use App\Services\RefundService;
use Carbon\Carbon;
use Tests\TestCase;

class RefundServiceTest extends TestCase
{
    public function test_recent_delivered_order_is_eligible(): void
    {
        $service = new RefundService();

        $eligible = $service->isEligible('delivered', Carbon::now()->subDays(5));

        $this->assertTrue($eligible);
    }
}
