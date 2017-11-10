<?php

namespace App\Models;


class Cart extends BaseModel
{
  protected $primaryKey = 'id';
  protected $table = 'cart';
  protected $fillable = array('prod_id');
}
