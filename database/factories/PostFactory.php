<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $categoryRand = Category::all()->count();

        $data = [
            'title' => $this->faker->sentence(),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'published_at' => $this->faker->dateTime,
            'user_id' => User::where('id', random_int(1, 4))->first(),
        ];

        if (random_int(0, 100) > 98) {
            $data['category_id'] = Category::factory();
        } else {
            $data['category_id'] = Category::where('id', random_int(1, $categoryRand))->first();

        }

        $data['slug'] = Str::slug($data['title']);
        return $data;
    }
}
