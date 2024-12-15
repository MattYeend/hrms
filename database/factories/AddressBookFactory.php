<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddressBook>
 */
class AddressBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_line' => $this->faker->streetAddress,
            'town' => $this->faker->city,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'post_code' => $this->faker->postcode,
            'head_office' => 1,
            'address_contact_id' => 1,
        ];
    }
}