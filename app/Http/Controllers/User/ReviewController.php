<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     *  product review
     */
    public function ReviewStore(Request $request){

        // product id
        $id = $request -> product_id;

        // validation 
        $this -> validate($request, [
            'summary'       => 'required',
            'comment'       => 'required'
        ], [
            'summary.required'      => 'summary feild is required'
        ]);


        // review insert
        Review::create([
            'product_id'        => $id,
            'user_id'           => Auth::user() -> id,
            'summary'           => $request -> summary,
            'comment'           => $request -> comment,
            'created_at'        => Carbon::now()
        ]);


        // Confirmajtion message
        $notification = [
            'message'       => 'Your Review will Approve By Admin',
            'alert-type'    => 'success'
        ];


        return redirect() -> back() -> with($notification);

    }


    /**
     *  Pendding review
     */
    public function PenddingReview(){

        $reviews = Review::where('status', 0) -> latest() -> get();
        return view('backend.review.pendding_review', [
            'reviews'        => $reviews
        ]);

    }


    /**
     *  approve review
     */
    public function ApproveReviewView(){

        $reviews = Review::where('status', 1) -> latest() -> get();
        return view('backend.review.approve_review', [
            'reviews'        => $reviews
        ]);
    }


    /**
     *  approve review
     */
    public function ApproveReview($review_id){

        // data update
        $update_review = Review::where('id', $review_id) -> first();
        $update_review -> status = 1;
        $update_review -> update();

        // Confirmajtion message
        $notification = [
            'message'       => 'Your Review Approved By Admin',
            'alert-type'    => 'success'
        ];


        return redirect() -> back() -> with($notification);

    }


    /**
     *  delete review
     */
    public function DeleteReview($review_id){

        // data update
        $delete_review = Review::where('id', $review_id) -> first();
        $delete_review -> delete();

        // Confirmajtion message
        $notification = [
            'message'       => 'Your Review Detele By Admin',
            'alert-type'    => 'info'
        ];


        return redirect() -> back() -> with($notification);

    }



}
