<?php

namespace Tests\Feature;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_delete_their_own_invoice(): void
    {
        $user = User::factory()->create();
        $invoice = Invoice::create(['user_id' => $user->id, 'number' => 'INV-001', 'amount' => 49.99]);

        $response = $this->actingAs($user)->delete("/invoices/{$invoice->id}");

        $response->assertRedirect(route('invoices.index'));
        $this->assertDatabaseMissing('invoices', ['id' => $invoice->id]);
    }

    public function test_invoices_index_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/invoices');

        $response->assertOk();
    }
}
