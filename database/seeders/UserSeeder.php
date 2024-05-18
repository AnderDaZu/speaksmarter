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
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@test.com',
            'password' => Hash::make('12345678'),
        ]);
        $editor->assignRole('editor');
    }
}
