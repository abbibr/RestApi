<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
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
        $status = $this->faker->randomElement(['B', 'P', 'V']);

        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100000, 1000000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade() : null
        ];
    }
}
