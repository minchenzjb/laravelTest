<?php

namespace App\Models;

class Category extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = array('name');
}