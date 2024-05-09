<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create testing casual users
        User::create([
            'name' => 'Jožko Mrkvička',
            'email' => 'jozo@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Adam Novák',
            'email' => 'adam@example.com',
            'password' => Hash::make('password'),
        ]);

        // create testing admin user
        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        Admin::create([
            'id' => Str::uuid(),
            'userId' => $admin_user->id,
        ]);

        // Categories seeder
        $sprinkled_category = Category::create([
            'id' => Str::uuid(),
            'name' => 'posýpaný',
        ]);

        $glazed_category = Category::create([
            'id' => Str::uuid(),
            'name' => 'glazúrovaný',
        ]);

        $topping_category = Category::create([
            'id' => Str::uuid(),
            'name' => 'poliatý',
        ]);


        $stuffed_category = Category::create([
            'id' => Str::uuid(),
            'name' => 'plnený',
        ]);

        // Donuts seeders

        $coko_donut = Product::create([
            'id' => Str::uuid(),
            'name' => 'Čokoládový donut',
            'type' => 'Donut',
            'description' => 'Toto je description text pre Čoko donut',
            'price' => 0.90,
            'imagePath' => 'images/choco_glaze.jpg',
            'weight' => '100g',
        ]);

        $suga_donut = Product::create([
            'id' => Str::uuid(),
            'name' => 'Cukrový donut',
            'type' => 'Donut',
            'description' => 'Toto je description text pre cukrový donut',
            'price' => 1.90,
            'imagePath' => 'images/classic_sugar.jpg',
            'weight' => '90g',
        ]);

        $coko_sprinkle_donut = Product::create([
            'id' => Str::uuid(),
            'name' => 'Čokoládový posýpaný donut',
            'type' => 'Donut',
            'description' => 'Toto je description text pre Čokoládový posýpaný donut',
            'price' => 2,
            'imagePath' => 'images/choco_sprinkle.jpg',
            'weight' => '100g',
        ]);

        
        $classic_donut = Product::create([
            'id' => Str::uuid(),
            'name' => 'Klasický glazúrový Donut',
            'type' => 'Donut',
            'description' => 'Toto je description text pre Klasický Glazúrový Donut',
            'price' => 0.7,
            'imagePath' => 'images/classic_glazed.jpg',
            'weight' => '89g',
        ]);

        $blue_donut = Product::create([
            'id' => Str::uuid(),
            'name' => 'Modrý posýpaný donut',
            'type' => 'Donut',
            'description' => 'Toto je description text pre Modrý posýpaný donut',
            'price' => 5,
            'imagePath' => 'images/blue_sprinkle.jpg',
            'weight' => '130g',
        ]);

        // category product join table seeders
        CategoryProduct::create([
            'productId' => $coko_donut->id,
            'categoryId' => $topping_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $coko_sprinkle_donut->id,
            'categoryId' => $sprinkled_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $coko_sprinkle_donut->id,
            'categoryId' => $topping_category->id,
        ]);
    
        CategoryProduct::create([
            'productId' => $classic_donut->id,
            'categoryId' => $glazed_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $suga_donut->id,
            'categoryId' => $topping_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $blue_donut->id,
            'categoryId' => $topping_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $blue_donut->id,
            'categoryId' => $sprinkled_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $blue_donut->id,
            'categoryId' => $stuffed_category->id,
        ]);
    }
}
