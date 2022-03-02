<?php

namespace Database\Factories;



use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>

     */

    
    public function definition()
    {
        return [
            //

            'title'=>$this->faker->word(),
            'body'=>$this->faker->word(),
            'category_id'=>$this->faker->numberBetween(1,100),
        ];
    }
}
