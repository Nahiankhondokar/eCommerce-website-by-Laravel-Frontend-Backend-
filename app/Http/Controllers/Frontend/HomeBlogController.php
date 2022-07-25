<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\blog\BlogPost;
use App\Models\blog\BlogPostCategroy;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    /**
     *  Blog show
     */
    public function BlogView(){

        $blogCategory = BlogPostCategroy::latest() -> get();
        $blogPost = BlogPost::latest() -> get();
        return view('frontend.blog.blog_view', [
            'blogCategory'      => $blogCategory,
            'blogPost'          => $blogPost
        ]);
    }


        /**
     *  Blog details
     */
    public function BlogViewDetails($id){

        $blogCategory = BlogPostCategroy::latest() -> get();
        $blogPost = BlogPost::find($id);
        return view('frontend.blog.details_blog_view', [
            'blogCategory'      => $blogCategory,
            'blogPost'          => $blogPost
        ]);
    }



            /**
     *  Blog details
     */
    public function BlogPostCategory($category_id){

        $blogCategory = BlogPostCategroy::latest() -> get();
        $blogPost = BlogPost::where('category_id', $category_id) -> orderBy('id', 'DESC') -> get();
        return view('frontend.blog.blog_post_category', [
            'blogCategory'      => $blogCategory,
            'blogPost'          => $blogPost
        ]);
    }




    

}
