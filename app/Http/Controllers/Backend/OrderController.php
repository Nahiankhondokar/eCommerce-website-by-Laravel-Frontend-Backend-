<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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


    /**
     *  Status Confirmed Order
     */
    public function StatusConfirmed($order_id){

        $confirm = Order::find($order_id);
        $confirm -> status = 'confirmed';
        $confirm -> update();

        // confirmation message
        $notification = [
            'message'       => 'Product is Confirmed Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('pendding-order') -> with($notification);
    }


        /**
     *  Status Confirmed Order
     */
    public function StatusProcessing($order_id){

        $confirm = Order::find($order_id);
        $confirm -> status = 'processing';
        $confirm -> update();

        // confirmation message
        $notification = [
            'message'       => 'Product is porcessing Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('confirmed-order') -> with($notification);
    }


        /**
     *  Status Confirmed Order
     */
    public function StatusPicked($order_id){

        $confirm = Order::find($order_id);
        $confirm -> status = 'picked';
        $confirm -> update();

        // confirmation message
        $notification = [
            'message'       => 'Product is picked Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('processing-order') -> with($notification);
    }


    /**
     *  Status Confirmed Order
     */
    public function StatusShipped($order_id){

        $confirm = Order::find($order_id);
        $confirm -> status = 'shipped';
        $confirm -> update();

        // confirmation message
        $notification = [
            'message'       => 'Product is shipped Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('picked-order') -> with($notification);
    }

    /**
     *  Status Confirmed Order
     */
    public function StatusDelivered($order_id){

        // Quantity Subtraction.
        $order = OrderItem::where('order_id', $order_id) -> get();
        foreach($order as $data){

            Product::where('id', $data -> product_id) -> update([
                'product_qty'        =>  DB::raw('product_qty -'. $data -> qty)
            ]);

        }
        
        // data update
        $confirm = Order::find($order_id);
        $confirm -> status = 'delivered';
        $confirm -> update();

        // confirmation message
        $notification = [
            'message'       => 'Product is delivered Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('shipped-order') -> with($notification);
    }


        /**
     *  Status Confirmed Order
     */
    public function StatusCanceled($order_id){

        $confirm = Order::find($order_id) -> first();
        $confirm -> status = 'canceled';
        $confirm -> update();

        // confirmation message
        $notification = [
            'message'       => 'Product is Pendding Again',
            'alert-type'    => 'warning'
        ];

        return redirect() -> route('pendding-order') -> with($notification);
    }



    
    /**
     *  Download Admin order invoice
     */
    public function AdminOrderInvoice($order_id){

        $order = Order::with('division', 'district', 'stateName', 'user') -> where('id', $order_id) -> first();
        $orderItem = OrderItem::with('product') -> where('order_id', $order_id) -> orderBy('id', 'DESC') -> get();

        // invoice pdf package
        $pdf = Pdf::loadView('backend.order.order_invoice', compact('order', 'orderItem')) -> setPaper('a4') -> setOptions([
            'temDir'        => public_path(),
            'chroot'        => public_path()
        ]);
        return $pdf->download('invoice.pdf');
        
    }




}
