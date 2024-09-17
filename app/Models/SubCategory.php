<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function validate($input)
    {
        return Validator::make($input, [
            'category_id' => 'required',
            'name' => 'required'
        ]);

    }

}
