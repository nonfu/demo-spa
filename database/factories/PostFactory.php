<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        return [
            'title' => rtrim($this->faker->sentence, '.'),
            'summary' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'image_url' => $this->faker->imageUrl()
        ];
    }
}
