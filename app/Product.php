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

    public static $hands_code = [
        "ぐー" => "goo", "ちょき" => "tyoki", "ぱー" => "pa"
    ];

    public function splited_hands($hand = false)
    {
        $splited = explode(",", $this->hands);
        $sh = ["right" => $splited[1], "left" => $splited[0]];
        if ($hand){
          return $sh[$hand];
        }else{
          return $sh;
        }
    }

    public function hand_code($hand)
    {
        return Product::$hands_code[$this->splited_hands()[$hand]];
    }
}
