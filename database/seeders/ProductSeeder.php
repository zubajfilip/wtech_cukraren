<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Product::create([
            'id' => Str::uuid(),
            'name' => 'Čokoládový donut',
            'type' => 'Donut',
            'description' => 'Toto je description text',
            'price' => 0.90,
            'imagePath' => 'images/choco_glaze.jpg',
            'details' => json_encode(['Hmotnost 90g', 'Neplnený'])
        ]);

        Product::create([
            'id' => Str::uuid(),
            'name' => 'Cukrový donut',
            'type' => 'Donut',
            'description' => 'Toto je description text pre cukrový donut',
            'price' => 1.90,
            'imagePath' => 'images/classic_sugar.jpg',
            'details' => json_encode(['Hmotnost 80g', 'Neplnený'])
        ]);
    }
}
