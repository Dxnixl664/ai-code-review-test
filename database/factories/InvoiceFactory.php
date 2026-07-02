<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => strtoupper($this->faker->unique()->bothify('INV-####')),
            'status' => $this->faker->randomElement(['paid', 'unpaid', 'overdue']),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
