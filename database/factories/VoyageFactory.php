<?php

namespace Database\Factories;

use App\Models\Voyage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VoyageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Voyage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->title,
            'date_voyage' => $this->faker->date,
            'ligne' => $this->faker->sentences,
            'durée' => $this->faker->randomDigit,
            'prix' => $this->faker->randomDigit,
            ''




        ];
    }
}
