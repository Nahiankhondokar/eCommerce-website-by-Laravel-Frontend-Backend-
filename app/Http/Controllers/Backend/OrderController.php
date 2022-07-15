<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{


    /**
     *  Pendding order
     */
    public function PenddingOrder(){

        $order = Order::where('status', 'Pendding') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.pendding_order', compact('order'));
    }


    /**
     *  Pendding order details
     */
    public function PenddingOrderDetails($order_id){

        $order = Order::with('division', 'district', 'stateName', 'user') -> where('id', $order_id) -> first();
        $orderItem = OrderItem::with('product') -> where('order_id', $order_id) -> orderBy('id', 'DESC') -> get();
        return view('backend.order.pendding_order_details', compact('order', 'orderItem'));

    }


    /**
     *  Confirmed Order details
     */
    public function ConfirmedOrder(){

        $order = Order::where('status', 'confirmed') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.confirmed_order', compact('order'));

    }


    /**
     *  Processing Order  details
     */
    public function ProcessingOrder(){

        $order = Order::where('status', 'processing') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.processing_order', compact('order'));

    }

    
    /**
     *  Processing Order  details
     */
    public function PickedOrder(){

        $order = Order::where('status', 'picked') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.picked_order', compact('order'));

    }


    /**
     *  Shipped Order  details
     */
    public function ShippedOrder(){

        $order = Order::where('status', 'shipped') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.shipped_order', compact('order'));

    }


    /**
     *  delivered Order  details
     */
    public function DeliveredOrder(){

        $order = Order::where('status', 'delivered') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.delivered_order', compact('order'));

    }


    
    /**
     *  canceled Order  details
     */
    public function CanceledOrder(){

        $order = Order::where('status', 'canceled') -> orderBy('id', 'DESC') -> get();
        return view('backend.order.canceled_order', compact('order'));

    }




}
