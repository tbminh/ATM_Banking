<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\RoleAccess as Role;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_id'=> Role::all()->random()->id,
            'full_name'=> $this->faker->name(),
            'email'=> $this->faker->safeEmail(),
            'password' => Hash::make(12345),
            'gender'=>$this->faker->boolean(0,1),
            'phone_number'=>$this->faker->phoneNumber(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
