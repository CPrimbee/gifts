<?php

namespace Database\Factories;

use App\Models\{Category, Item};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name'        => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'reference'   => $this->faker->word(),
            'quantity'    => $this->faker->numberBetween(1, 10),
        ];
    }

    public function activated(): self
    {
        return $this->state(['is_active' => true]);
    }

    public function signed(Carbon $carbon = null): self
    {
        return $this->state(['signed_at' => $carbon ?? $this->faker->dateTimeBetween('-1 year', 'now')]);
    }
}
