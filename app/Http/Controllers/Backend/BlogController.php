<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog\BlogPost;
use App\Models\blog\BlogPostCategroy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    /**
     *  Blog Category show
     */
    public function BlogCategroyShow(){

        $blogCategory = BlogPostCategroy::latest() -> get();
        return view('backend.blog.category.category_view', compact('blogCategory'));

    }


        /**
     *  Blog Category Store
     */
    public function BlogCategroyStore(Request $request){

        // validation
        $this -> validate($request, [
            'blog_category_name_eng'        => 'required'
        ], [
            'blog_category_name_eng.required'       => 'blog category eng name is required'
        ]);

        // data store
        BlogPostCategroy::insert([
            'blog_categroy_name_eng'            => $request -> blog_category_name_eng,
            'blog_categroy_name_hin'            => $request -> blog_category_name_hin,
            'blog_categroy_slug_eng'            => strtolower(str_replace(' ', '-', $request -> blog_category_name_eng)),
            'blog_categroy_slug_hin'            => str_replace(' ', '-', $request -> blog_category_name_hin),
            'created_at'                        => Carbon::now()
        ]);


        //  confirmation message
        $notification = [
            'message'       => 'Blog Category Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notification);

    }


    /**
     *  Blog Category edit
     */
    public function BlogCategroyEdit($id){

        $blogCategory = BlogPostCategroy::findOrFail($id) -> first();

        return view('backend.blog.category.category_edit', compact('blogCategory'));

    }



    /**
     *  Blog Category update
     */
    public function BlogCategroyUpdate(Request $request, $id){

        // data update
        $blogCategory = BlogPostCategroy::findOrFail($id);
        $blogCategory -> blog_categroy_name_eng = $request -> blog_category_name_eng;
        $blogCategory -> blog_categroy_name_hin = $request -> blog_category_name_hin;
        $blogCategory -> blog_categroy_slug_eng = strtolower(str_replace(' ', '-', $request -> blog_category_name_eng));
        $blogCategory -> blog_categroy_slug_hin = str_replace(' ', '-', $request -> blog_category_name_hin);
        $blogCategory -> update();


        //  confirmation message
        $notification = [
            'message'       => 'Blog Category Updated Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('blog.category.view') -> with($notification);

    }



    /**
     *  Blog Category Delete
     */
    public function BlogCategroyDelete($id){

        // data delete
        $blogCategory = BlogPostCategroy::findOrFail($id) -> first();
        $blogCategory -> delete();


        //  confirmation message
        $notification = [
            'message'       => 'Blog Category Deleted Successfully',
            'alert-type'    => 'primary'
        ];

        return redirect() -> route('blog.category.view') -> with($notification);

    }


    // ================ Admin Blog post

    /**
     *  Blog Category show
     */
    public function AddBlogPost(){

        $blogCategory = BlogPostCategroy::latest() -> get();
        $blogPost     = BlogPost::latest() -> get();
        return view('backend.blog.post.add_post_view', compact('blogCategory', 'blogPost'));

    }

    /**
     *  List blog post
     */
    public function ListBlogPost(){

        $blogPost     = BlogPost::latest() -> get();
        return view('backend.blog.post.list_post_view', compact('blogPost'));

    }


    /**
     *   blog post store
     */
    public function StoreBlogPost(Request $request){

        // validation
        $this -> validate($request, [
            'post_title_eng'        => 'required'
        ], [
            'post_title_eng.required'       => 'post title is required'
        ]);

        // post image
        if($request -> hasFile('post_image')){

            $img = $request -> file('post_image');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            // Image::make($img) -> resize(740, 433) -> save('media/frontend/post/' . $unique);
            $img -> move(public_path('media/admin/post/'), $unique);
            $save_url = 'media/admin/post/' . $unique ;

        }


        // data stoer
        BlogPost::insert([
            'category_id'           => $request -> category_id,
            'post_title_eng'        => $request -> post_title_eng,
            'post_title_hin'        => $request -> post_title_hin,
            'post_slug_eng'         => strtolower(str_replace(' ', '-', $request -> post_title_eng)),
            'post_slug_hin'         => str_replace(' ', '-', $request -> post_title_hin),
            'post_details_eng'      => $request -> post_details_eng,
            'post_details_hin'      => $request -> post_details_hin,
            'post_image'            => $save_url,
            'created_at'            => Carbon::now()
        ]);


        //  confirmation message
        $notification = [
            'message'       => 'Blog Post Created Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('post.list') -> with($notification);



    }



}
