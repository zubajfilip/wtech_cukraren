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

        // other seeders

        $topping_category = Category::create([
            'id' => Str::uuid(),
            'name' => 'topping',
        ]);

        Category::create([
            'id' => Str::uuid(),
            'name' => 'stuffed',
        ]);

        $choco_category = Category::create([
            'id' => Str::uuid(),
            'name' => 'chocolate',
        ]);

        $coko_donut = Product::create([
            'id' => Str::uuid(),
            'name' => 'Čokoládový donut',
            'type' => 'Donut',
            'description' => 'Description of the new product',
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

        CategoryProduct::create([
            'productId' => $coko_donut->id,
            'categoryId' => $topping_category->id,
        ]);

        CategoryProduct::create([
            'productId' => $coko_donut->id,
            'categoryId' => $choco_category->id,
        ]);
    }
}
