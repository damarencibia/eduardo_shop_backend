<?php

// database/factories/RoleUserFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;

class RoleUserFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Relación con User
            'role_id' => Role::factory(), // Relación con Role
        ];
    }
}
