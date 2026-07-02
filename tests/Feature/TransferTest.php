<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Services\TransferService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransferTest extends TestCase
{
    use RefreshDatabase;

    public function test_transfer_moves_funds_between_accounts(): void
    {
        $from = Account::factory()->create(['balance' => 500]);
        $to = Account::factory()->create(['balance' => 100]);

        (new TransferService())->transfer($from, $to, 200);

        $this->assertEquals(300, $from->fresh()->balance);
        $this->assertEquals(300, $to->fresh()->balance);
    }
}
