<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;



class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    /**
     * A basic test testCartAdd.
     *
     * @return void
     */
    public function testCartAdd()
    {
      $this->get('/public/cart-add/6');
      
      $this->assertDatabaseHas('cart', [
        'prod_id' => 6
    ]);
    }
    
}
