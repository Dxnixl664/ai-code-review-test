<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_name' => $this->faker->randomElement(['Basic', 'Pro', 'Enterprise']),
            'status' => $this->faker->randomElement(['active', 'cancelled']),
        ];
    }
}
