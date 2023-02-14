<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'username' => 'sanomanjiro',
            'name' => 'Sano Manjiro',
            'email' => 'sanoman@gmail.com',
            'role_id' => 1,
            'phone' => '081234567890',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('admin');

        $user = User::factory()->create([
            'username' => 'takemichihanagaki',
            'name' => 'Takemichi Hanagaki',
            'email' => 'takemichi@gmail.com',
            'role_id' => 2,
            'phone' => '081234567891',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('user');

        $users = User::factory()->count(98)->create();
        $users->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
