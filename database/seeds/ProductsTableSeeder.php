<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(['name' => 'Apple', 'title' => 'Apple','description' => 'Apple from Austrlia','price' => 35,'category_id' => 1,'brand_id' => 1,]);
        DB::table('products')->insert(['name' => 'Orange', 'title' => 'Orange','description' => 'Orange from Autralia','price' => 64,'category_id' => 2,'brand_id' => 2,]);
    }
}
