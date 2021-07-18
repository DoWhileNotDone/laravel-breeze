<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', 'user@example.com')->exists() === false) {
            User::factory()
                ->create([
                    'email' => 'user@example.com',
                    'password'  => Hash::make('password'),
                ]);
        }
    }
}
