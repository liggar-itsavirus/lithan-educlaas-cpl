<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'id' => '1',
            'name' => 'User',
            'phone' => '+62811421',
            'address' => 'Jalan Buntu',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123123'),
          ]);
      
          User::factory()->create([
            'id' => '2',
            'name' => 'Admin',
            'phone' => '+62811421',
            'address' => 'Jalan Buntu',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123'),
          ]);
    }
}
