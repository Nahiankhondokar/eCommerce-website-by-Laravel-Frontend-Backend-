<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];


    // realtion ship for product informaiton
    public function product(){
        return $this -> belongsTo(Product::class, 'product_id', 'id');
    }

    // realtion ship for product informaiton
    public function user(){
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }


}
