<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Akun Admin
        DB::table('users')->insert([
            'name' => 'Dino Febiyan',
            'email' => 'admin@uas.com',
            'password' => Hash::make('1234567890'),
            'role' => 'admin',
            'email_verified_at' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Akun Staff (Teknisi)
        DB::table('users')->insert([
            'name' => 'Febriyan Putra Hariadi',
            'email' => 'staff@uas.com',
            'password' => Hash::make('1234567890'),
            'role' => 'staff',
            'email_verified_at' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
