<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Category as Cate;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cate_id'=> Cate::all()->random()->id,
            'author'=> User::where('role_id',2)->random()->id,
            'title' => $this->faker->title(200),
            'content' => $this->faker->paragraph(),
            'post_status'=>0,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
