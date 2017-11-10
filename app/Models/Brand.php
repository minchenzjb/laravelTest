<?php

namespace App\Models;

class Brand extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'brands';
    protected $fillable = array('name');
}
