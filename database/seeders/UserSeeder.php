<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['email' => 'alex@tempmail.com', 'active' => 1],
            ['email' => 'maria@tempmail.com', 'active' => 1],
            ['email' => 'john@tempmail.com', 'active' => 1],
            ['email' => 'dominik@test.com', 'active' => 0],
            ['email' => 'andreas@yahoo.de', 'active' => 0],
            ['email' => 'Taaaaaaa@test.com', 'active' => 1],
            ['email' => 'rerere@test_mail.com', 'active' => 1]
        ];

        foreach ($users as $user) {
            $userObj = new User($user);
            $userObj->save();
        }
    }
}