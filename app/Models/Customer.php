<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'contact_number', 'address'];
    public function validate($input){
        return Validator::make($input,[
            'name' => 'required',
            'email' => 'required|string|email|max:255|',
            'contact_number' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);

    }
}
