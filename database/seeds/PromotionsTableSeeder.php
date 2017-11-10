<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('promotion')->insert(['prod_id' => 1, 'rule' => 'price*((int)(quantity/2)+quantity%2)',]);
      DB::table('promotion')->insert(['prod_id' => 2, 'rule' => 'price*((int)(quantity/3)*2 + quantity%3)',]);
      
    }
}
