<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->numberBetween(18000, 50000),
            'first_line' => $this->faker->streetAddress,
            'town' => $this->faker->city,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'post_code' => $this->faker->postcode,
            'full_or_part' => $this->faker->randomElement(['Full Time', 'Part Time']),
            'region' => $this->faker->randomElement([
                'Alaska', 'Arizona', 'Nevada', 'Ohio', 'Wisconsin', // Custom list of states
            ]),
            'timezone' => $this->faker->timezone,
            'dark_mode' => false,
            'start_date' => now(),
            'remote_based' => $this->faker->boolean,
            'department_id' => $this->faker->numberBetween(1, 18),
            'roles_id' => $this->faker->numberBetween(1, 3),
            'seniority_id' => $this->faker->numberBetween(1, 4),
            'job_id' => $this->faker->numberBetween(1, 45),
            'holiday_entitlement_id' => 1,
            'contact_id' => $this->faker->numberBetween(1, 100),
        ];
    }

    /**
     * Define a state for US-based users.
     */
    public function us(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'region' => $this->faker->randomElement([
                    'Alaska', 'Arizona', 'Nevada', 'Ohio', 'Wisconsin'
                ]),
                'timezone' => $this->faker->timezone,
                'country' => 'United States',
                'post_code' => $this->faker->postcode,
            ];
        });
    }

    /**
     * Define a state for Spain-based users.
     */
    public function spain(): static
    {
        return $this->state(function (array $attributes) {
            $this->faker->locale('es_ES');  // Set the locale for Spain
    
            return [
                'region' => $this->faker->randomElement([ // Spain states
                    'Andalucía', 'Cataluña', 'Madrid', 'Valencia', 'Galicia',
                ]),
                'timezone' => 'Europe/Madrid',
                'country' => 'España',
                'post_code' => $this->faker->postcode,
            ];
        });
    }

    /**
     * Define a state for Italy-based users.
     */
    public function italy(): static
    {
        return $this->state(function (array $attributes) {
            $this->faker->locale('it_IT');  // Set the locale for Italy
    
            return [
                'region' => $this->faker->randomElement([ // Italy states
                    'Lazio', 'Lombardia', 'Sicilia', 'Campania', 'Veneto',
                ]),
                'timezone' => 'Europe/Rome',
                'country' => 'Italia',
                'post_code' => $this->faker->postcode,
            ];
        });
    }

    /**
     * Define a state for France-based users.
     */
    public function france(): static
    {
        return $this->state(function (array $attributes) {
            $this->faker->locale('fr_FR');  // Set the locale for France
    
            return [
                'region' => $this->faker->randomElement([ // France regions
                    'Île-de-France', 'Provence-Alpes-Côte d\'Azur', 'Nouvelle-Aquitaine',
                ]),
                'timezone' => 'Europe/Paris',
                'country' => 'France',
                'post_code' => $this->faker->postcode,
            ];
        });
    }
}
