<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\name;

class Category extends Model
{

    use HasFactory;
    protected $fillable = ['name'];
    public function validate($input){
        return Validator::make($input,[
            'name'=>'required '
        ]);

    }
}
