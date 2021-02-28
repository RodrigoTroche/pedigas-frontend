<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array('name' => 'Garrafa 10kg', 'description' => '', 'price' => '75000', 'stock' => 10),
            array('name' => 'Garrafa 13kg', 'description' => '', 'price' => '90000', 'stock' => 10),
            array('name' => 'Garrafa 15kg', 'description' => '', 'price' => '105000', 'stock' => 10),
            array('name' => 'Garrafa 30kg', 'description' => '', 'price' => '360000', 'stock' => 10)
        );

        foreach ($products as $key => $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'created_at' => date(now())
            ]);
        }
    }
}