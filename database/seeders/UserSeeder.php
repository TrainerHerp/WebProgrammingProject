<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'username' => 'Andi',
          'email' => 'andi@gmail.com',
          'password' => Hash::make('12345678'),
          'phone_number' => '12345678',
          'address' => 'ewfhuirhe4g'
        ]);

        DB::table('users')->insert([
          'username' => 'Budi',
          'email' => 'budi@gmail.com',
          'password' => Hash::make('12345678'),
          'phone_number' => '12345678',
          'address' => 'ewfhuirhe4g',
          'is_admin' => true
        ]);
    }
}
