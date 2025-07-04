<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_number' => $this->faker->unique()->bothify('POL-###'),
            'customer_name' => $this->faker->name(),
            'premium_amount' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['active', 'cancelled', 'pending']),
        ];
    }
}


//  bothify() - creates strings like POL-123
// faker->name() - gives realistic customer names
// randomFloat() - gives decimal premiums
// randomElement() - randomizes status
