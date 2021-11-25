<?php

namespace App\Models;

class Product extends BaseModel
{
    protected static $fillable = ['id', 'name', 'description', 'img'];
}