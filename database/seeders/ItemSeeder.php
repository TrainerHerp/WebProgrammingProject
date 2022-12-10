<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'id' => 1,
            'name' => "White T-Shirt",
            'description' => "Just a white t-shirt",
            'image' => "shorturl.at/dmDRY",
            'price' => 50000,
            'stock' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
          'id' => 2,
          'name' => "Red T-Shirt",
          'description' => "Just a red t-shirt",
          'image' => "shorturl.at/kpsVY",
          'price' => 50000,
          'stock' => 10,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 3,
        'name' => "Green T-Shirt",
        'description' => "Just a green t-shirt",
        'image' => "shorturl.at/afr38",
        'price' => 50000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 4,
        'name' => "Black T-Shirt",
        'description' => "Just a black t-shirt",
        'image' => "shorturl.at/prUZ2",
        'price' => 50000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 5,
        'name' => "Light Blue Shirt",
        'description' => "Just a light blue shirt",
        'image' => "shorturl.at/nqCL4",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 6,
        'name' => "Black and Red Shirt",
        'description' => "Just a black and red shirt",
        'image' => "shorturl.at/PQTV0",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 7,
        'name' => "Green Shirt",
        'description' => "Just a green shirt",
        'image' => "shorturl.at/tFPZ8",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 8,
        'name' => "Black and White Shirt",
        'description' => "Just a black and white shirt",
        'image' => "shorturl.at/clrY0",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 9,
        'name' => "Brown Jacket",
        'description' => "Just a brown jacket",
        'image' => "shorturl.at/ekQTV",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 10,
        'name' => "Ridge Work Jacket",
        'description' => "Just a ridge work jacket",
        'image' => "shorturl.at/mqwC5",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 11,
        'name' => "Hoodie Jacket",
        'description' => "Just a hoodie jacket",
        'image' => "shorturl.at/vxASV",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'id' => 12,
        'name' => "Leather Jacket",
        'description' => "Just a leather jacket",
        'image' => "shorturl.at/myEGI",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
