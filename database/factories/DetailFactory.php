<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail>
 */
class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'topic' => 'Well experienced Software Engineer',
            'description' => 'As a web developer you probably immediately thought that the way to optimize for this is to include as many keywords as possible on your resume. Unfortunately for that solution.',
            'name' => 'Madhusanka Alwis',
            'phone' => '(94) 77 006-1547',
            'email' => 'mail@alwism.com',
            'skype' => 'alwism',
            'address' => 'Panadura, Sri Lanka',
            'experience' => '4',
            'freelance' => 'Available',
            'language' => 'English, Sinhala',
        ];
    }
}
