<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Truck;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truck>
 */
class TruckFactory extends Factory
{
    protected $model = Truck::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_number' => $this->faker->bothify('*****'),
            'year' => $this->faker->numberBetween('1900', '2028'),
            'notes' => $this->faker->text('20')
        ];
    }
}
