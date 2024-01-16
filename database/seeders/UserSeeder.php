<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin Rijal',
            'email' => 'rijal@email.com',
            'password' => Hash::make('admin'),
            'phone' => '085155414564',
            'roles' => 'ADMIN'
        ]);
    }
}
