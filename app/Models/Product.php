<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    // Relationship for getting parent category name
    public function category(){
        return $this -> belongsTo(Category::class, 'category_id', 'id');
    }

    // Relationship for getting parent category name
    public function brand(){
        return $this -> belongsTo(Category::class, 'brand_id', 'id');
    }
    
}
