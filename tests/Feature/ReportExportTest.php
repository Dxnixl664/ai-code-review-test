<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ReportExportTest extends TestCase
{
    use RefreshDatabase;

    public function test_report_can_be_exported(): void
    {
        Mail::fake();

        $user = User::factory()->create();
        Order::factory()->count(3)->create();

        $response = $this->actingAs($user)->post('/reports/export');

        $response->assertRedirect();
    }
}
