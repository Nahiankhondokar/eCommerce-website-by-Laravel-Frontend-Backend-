<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
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



}
