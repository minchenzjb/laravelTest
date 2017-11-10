<?php

namespace App\Models;


class Promotion extends BaseModel
{
  protected $primaryKey = 'id';
  protected $table = 'promotion';
  protected $fillable = array('prod_id', 'rule');
}
