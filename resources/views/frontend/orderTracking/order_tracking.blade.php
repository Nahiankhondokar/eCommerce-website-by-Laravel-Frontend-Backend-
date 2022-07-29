@extends('frontend.main_muster')

@section('content')

@section('title')
{{ $trackOrder -> invoice_no }}
@endsection


 {{-- CSS FILE FOR ORDER TRACKING TEMPLATE --}}
<style>
    body{background-color: #eeeeee;font-family: 'Open Sans',serif}
    .container{}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #157ed2}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #157ed2;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #157ed2;border-color: #157ed2;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
</style>

<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <br>
            <div class="row text-center">
                <div class="col-md-2">
                    <b>Invoice No</b><br>
                    <span>{{ $trackOrder -> invoice_no }}</span>
                </div>
                <div class="col-md-2">
                    <b>Order Date</b><br>
                    <span>{{ $trackOrder -> order_date }}</span>
                </div>
                <div class="col-md-2">
                    <b>Shipping By - User</b><br>
                    <span>{{ $trackOrder -> division -> division_name }} / {{ $trackOrder -> district -> district_name }}</span>
                </div>
                <div class="col-md-2">
                    <b>Phone Number</b><br>
                    <span>{{ $trackOrder -> phone }}</span>
                </div>
                <div class="col-md-2">
                    <b>Payment Type</b><br>
                    <span>{{ $trackOrder -> payment_method }}</span>
                </div>
                <div class="col-md-2">
                    <b>Total Amount</b><br>
                    <span>${{ $trackOrder -> amount }}</span>
                </div>
            </div>

            <div class="track">

                @if($trackOrder -> status == 'Pendding')
                    {{-- // active --}}
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pendding</span> </div>

                    {{-- // inactive --}}
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirmed</span> </div>

                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing </span> </div>

                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pickup</span> </div>

                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                    
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                @elseif($trackOrder -> status == 'confirmed')
                    {{-- // active --}}
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pendding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirmed</span> </div>

                    {{-- // inactive --}}
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing </span> </div>

                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pickup</span> </div>

                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                    
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                
                    @elseif($trackOrder -> status == 'processing')
                    {{-- // active --}}
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pendding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing </span> </div>

                    {{-- // inactive --}}
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pickup</span> </div>

                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                    
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                    @elseif($trackOrder -> status == 'picked')
                    {{-- // active --}}
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pendding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pickup</span> </div>

                    {{-- // inactive --}}
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                    
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                    @elseif($trackOrder -> status == 'shipped')
                    {{-- // active --}}
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pendding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pickup</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>

                    {{-- // inactive --}}
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                    @elseif($trackOrder -> status == 'delivered')
                    {{-- // active --}}
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pendding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Processing </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pickup</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Shipped</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                    {{-- // inactive --}}
                    
                @endif
                
            </div>
            <hr>
            <br><br>
        </div>
    </article>
</div>


@endsection