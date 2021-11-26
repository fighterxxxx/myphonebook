<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntrepriseFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->lastName(),
            'rue' => $this->faker->unique()->streetAddress(),
            'cp'  => "75000",
            'ville' => $this->faker->city(),
            'téléphone' => "0709273890",
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}
