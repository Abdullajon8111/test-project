<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ids = Category::pluck('id')->toArray();

        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'category_id' => array_rand($ids)
        ];
    }
}
