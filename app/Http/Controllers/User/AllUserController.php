<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

// use PDF;

class AllUserController extends Controller
{
    /**
     *  My orders
     */
    public function MyOrders(){

        $orders = Order::where('user_id', Auth::id()) -> orderBy('id', 'DESC') -> get();
        return view('frontend.user.order.order_view', compact('orders'));

    }

    /**
     *  My orders
     */
    public function OrderDetails($order_id){

        $order = Order::with('division', 'district', 'stateName', 'user') -> where('id', $order_id) -> where('user_id', Auth::id()) -> first();
        $orderItem = OrderItem::with('product') -> where('order_id', $order_id) -> orderBy('id', 'DESC') -> get();
        return view('frontend.user.order.order_details', compact('order', 'orderItem'));

    }


    /**
     *  My orders
     */
    public function InvoiceDownload($order_id){

        $order = Order::with('division', 'district', 'stateName', 'user') -> where('id', $order_id) -> where('user_id', Auth::id()) -> first();
        $orderItem = OrderItem::with('product') -> where('order_id', $order_id) -> orderBy('id', 'DESC') -> get();
        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));

        // invoice pdf package
        $pdf = Pdf::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem')) -> setPaper('a4') -> setOptions([
            'temDir'        => public_path(),
            'chroot'        => public_path()
        ]);
        return $pdf->download('invoice.pdf');

    }


    /**
     *   User order return 
     */
    public function UserOrderReturn(Request $request, $order_id){


        Order::findOrFail($order_id) -> update([
            'return_reason'          => $request -> orderReturn,
            'return_date'            => Carbon::now() -> format('d F Y')
        ]);

        // confirmation message
        $notification = [
            'message'       => 'Return Request Sent Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('my.order') -> with($notification);

    }


    
    /**
     *   User order return list 
     */
    public function UserOrderReturnList(){

        $orders = Order::where('user_id', Auth::id()) -> where('return_reason', '!=', NULL) -> get();
        return view('frontend.user.order.order_return_list', compact('orders'));

    }


    /**
     *   User order return list 
     */
    public function UserOrderCancel(){

        $orders = Order::where('user_id', Auth::id()) -> where('return_reason', 'canceled') -> get();
        return view('frontend.user.order.order_cancel', compact('orders'));

    }




}
