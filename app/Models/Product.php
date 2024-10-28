<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock', 'category', 'image_url'];

    public function validate($input){
        return Validator::make($input,[
            'name'=>'required ',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category' => 'required',
            'image_url' => 'required',

        ]);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
