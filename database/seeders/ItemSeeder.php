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
            'name' => "White T-Shirt",
            'description' => "Just a white t-shirt",
            'image' => "img/white-t-shirt.jpg",
            'price' => 50000,
            'stock' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
          'name' => "Red T-Shirt",
          'description' => "Just a red t-shirt",
          'image' => "img/red-t-shirt.jpg",
          'price' => 50000,
          'stock' => 10,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Green T-Shirt",
        'description' => "Just a green t-shirt",
        'image' => "img/green-t-shirt.jpeg",
        'price' => 50000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Black T-Shirt",
        'description' => "Just a black t-shirt",
        'image' => "img/black-t-shirt.jpg",
        'price' => 50000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Light Blue Shirt",
        'description' => "Just a light blue shirt",
        'image' => "img/light-blue-shirt.jpg",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Black and Red Shirt",
        'description' => "Just a black and red shirt",
        'image' => "img/black-and-red-shirt.webp",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Green Shirt",
        'description' => "Just a green shirt",
        'image' => "img/green-shirt.webp",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Black and White Shirt",
        'description' => "Just a black and white shirt",
        'image' => "img/black-and-white-shirt.jpg",
        'price' => 100000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Brown Jacket",
        'description' => "Just a brown jacket",
        'image' => "img/brown-jacket.jpeg",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Ridge Work Jacket",
        'description' => "Just a ridge work jacket",
        'image' => "img/ridge-work-jacket.webp",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Hoodie Jacket",
        'description' => "Just a hoodie jacket",
        'image' => "img/hoodie-jacket.png",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('items')->insert([
        'name' => "Leather Jacket",
        'description' => "Just a leather jacket",
        'image' => "img/leather-jacket.jpg",
        'price' => 125000,
        'stock' => 10,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
