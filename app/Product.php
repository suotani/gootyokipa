<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["title", "name", "hands"];

    public static $rules =[
        'title' => 'required',
        'name' => 'required',
        'right' => 'required',
        'left' => 'required',
        'image' => 'required'
    ];
}
