<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'admin 123',
        //     'username' => 'admin123',
        //     'password' => bcrypt('12345678'),
        //     // 'password' => Hash::make('123456'),
        //     'telp' => '081234567890',
        //     'level' => 'admin'
        // ]);
        User::create([
            'name' => 'petugas 123',
            'username' => 'petugas123',
            'password' => bcrypt('12345678'),
            // 'password' => Hash::make('123456'),
            'telp' => '081234567890',
            'level' => 'petugas'
        ]);
    }
}
