<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    /**
     *  Report view
     */
    public function ReportView(){

        return view('backend.report.report_view');

    }


    /**
     *  Report view
     */
    public function ReportShowByDate(Request $request){

        // Change date format
        $date = new DateTime($request -> date);
        $date_format = $date -> format('d F Y');

        // Get the data
        $order = Order::where('order_date', $date_format) -> latest() -> get();
        return view('backend.report.report_show', compact('order'));

    }


        /**
     *  Report view
     */
    public function ReportShowByMonthYear(Request $request){

        // Get the data
        $order = Order::where('order_month', $request -> month) -> where('order_year', $request -> year) -> latest() -> get();
        return view('backend.report.report_show_month_year', compact('order'));

    }


    /**
     *  Report view
     */
    public function ReportShowByYear(Request $request){

        // Get the data
        $order = Order::where('order_year', $request -> year) -> latest() -> get();
        return view('backend.report.report_show_year', compact('order'));

    }



}
