<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderReturnController extends Controller
{
    /**
     *  Order reutrn request
     */
    public function OrderReturnRequest() {

        $order = Order::where('return_order', 1) -> orderBy('id', 'DESC') -> get();
        return view('backend.return_order.return_request', compact('order'));
    }


    /**
     *  Return order approve
     */
    public function OrderReturnRequestApprove($order_id){

        // data update
        $update = Order::where('id', $order_id) -> first();
        $update -> return_order = 2;
        $update -> update();

        
        // confirmation message
        $notification = [
            'message'       => 'Return Request Approve Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notification);

    }



    /**
     *  retur order all approve data show
     */
    public function AllApproveReturnOrder(){

        $order = Order::where('return_order', 2) -> orderBy('id', 'DESC') -> get();
        return view('backend.return_order.all_apporve_order', compact('order'));

    }


    
}
