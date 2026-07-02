<?php

namespace Tests\Feature;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoices_can_be_filtered_by_status(): void
    {
        $user = User::factory()->create();
        Invoice::factory()->create(['status' => 'overdue']);
        Invoice::factory()->create(['status' => 'paid']);

        $response = $this->actingAs($user)->get('/invoices-by-status?status=overdue');

        $response->assertOk();
    }
}
