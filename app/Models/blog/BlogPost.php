<?php

namespace App\Models\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    // blog post category relation ship
    public function blogCategory(){
        return $this -> belongsTo(BlogPostCategroy::class, 'category_id', 'id');
    }

}
