<?php

namespace App\Models;



class Product extends BaseModel
{
  protected $primaryKey = 'id';
  protected $table = 'products';
  protected $fillable = array('name', 'title', 'description','price','category_id','brand_id');
}
