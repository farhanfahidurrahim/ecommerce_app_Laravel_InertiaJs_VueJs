<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'description'=>$this->faker->text,
            'image'=>$this->faker->imageUrl('1000','430'),
            'btn_name'=>$this->faker->word,
            'btn_link'=>$this->faker->url,
            'position'=>$this->faker->numberBetween(1,10),
            'status'=>$this->faker->boolean,
        ];
    }
}
