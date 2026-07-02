<?php

namespace Tests\Unit;

use App\OrderStatus;
use Tests\TestCase;

class OrderStatusTest extends TestCase
{
    public function test_labels_are_human_readable(): void
    {
        $this->assertEquals('Pending', OrderStatus::Pending->label());
        $this->assertEquals('Shipped', OrderStatus::Shipped->label());
        $this->assertEquals('Delivered', OrderStatus::Delivered->label());
        $this->assertEquals('Cancelled', OrderStatus::Cancelled->label());
    }

    public function test_delivered_and_cancelled_are_final_states(): void
    {
        $this->assertTrue(OrderStatus::Delivered->isFinal());
        $this->assertTrue(OrderStatus::Cancelled->isFinal());
    }

    public function test_pending_and_shipped_are_not_final_states(): void
    {
        $this->assertFalse(OrderStatus::Pending->isFinal());
        $this->assertFalse(OrderStatus::Shipped->isFinal());
    }
}
