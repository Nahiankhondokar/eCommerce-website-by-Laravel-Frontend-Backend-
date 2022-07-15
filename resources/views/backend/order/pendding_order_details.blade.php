@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Oder Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="row">

            {{-- // Shipping Details --}}
            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong></h4>
				  </div>

                  <table class="table">
                    <tr class="text-left">
                        <th>Shipping Name :</th>
                        <th> {{ $order -> name }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>Shipping Email : </th>
                        <th>{{ $order -> email }} </th>
                    </tr>
                    <tr class="text-left">
                        <th>Shipping Phone : </th>
                        <th>{{ $order -> phone }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>Division : </th>
                        <th>{{ $order -> division -> division_name }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>District : </th>
                        <th>{{ $order -> district -> district_name }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>State : </th>
                        <th>{{ $order -> stateName -> state_name ?? 'none' }}</th>
                    </tr>

                    <tr class="text-left">
                        <th>Post Code : </th>
                        <th>{{ $order -> post_code }}</th>
                    </tr>

                    <tr class="text-left">
                        <th>Order Date : </th>
                        <th>{{ $order -> order_date }}</th>
                    </tr>
                </table>

				</div>
			  </div>


              {{-- // Order Details --}}
              <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong></h4>
				  </div>
				

                  <table class="table">
                    <tr class="text-left">
                        <th> Name :</th>
                        <th> {{ $order -> user -> name }}</th>
                    </tr>
                    <tr class="text-left"> 
                        <th> Email : </th>
                        <th>{{ $order -> user -> email }} </th>
                    </tr>
                    <tr class="text-left">
                        <th> Phone : </th>
                        <th>{{ $order -> user -> phone }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>Payment Type : </th>
                        <th>{{ $order -> payment_method }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>Tranx ID : </th>
                        <th>{{ $order -> transaction_id ??  'none'  }}</th>
                    </tr>
                    <tr class="text-left">
                        <th>Invoice : </th>
                        <th class="text-danger">{{ $order -> invoice_no }}</th>
                    </tr>

                    <tr class="text-left">
                        <th>Order Total : </th>
                        <th>$ {{ $order -> amount }}</th>
                    </tr>

                    <tr class="text-left">
                        <th>Order : </th>
                        <th>
                            <span class="badge badge-warning text-dark"><b>{{ $order -> status }}</b></span>
                        </th>
                    </tr>

                    @if($order -> status == 'Pendding')
                    <tr>
                        <a href="{{ route('order.confirmed', $order -> id) }}" class="btn btn-info" id="confirmed"> <b>Order Confirmed</b></a>
                    </tr>
                    @elseif($order -> status == 'confirmed')
                    <tr>
                        <a href="{{ route('order.processing', $order -> id) }}" class="btn btn-info" id="processing"> <b> Order Processing</b></a>
                    </tr>
                    @elseif($order -> status == 'processing')
                    <tr>
                        <a href="{{ route('order.picked', $order -> id) }}" class="btn btn-info" id="picked"> <b> Order Picked</b></a>
                    </tr>
                    @elseif($order -> status == 'picked')
                    <tr>
                        <a href="{{ route('order.shipped', $order -> id) }}" class="btn btn-info" id="shipped"> <b> Order Shipped </b></a>
                    </tr>
                    @elseif($order -> status == 'shipped')
                    <tr>
                        <a href="{{ route('order.delivered', $order -> id) }}" class="btn btn-info" id="delivered"> <b> Order Delivered</b></a>
                    </tr>
                    @elseif($order -> status == 'delivered')
                    <tr>
                        <a href="{{ route('order.canceled', $order -> id) }}" class="btn btn-info" id="canceled"> <b> Order Canceled</b></a>
                    </tr>
                    @endif
                    
                </table>


				</div>
			  </div>


              {{-- // Product Details --}}
              <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">

                  <table class="table">
                    <tbody>
                        <tr style="" >
                            <td class="col-md-1">
                                <label for="">Images</label>
                            </td>
                            <td class="col-md-1">
                                <label for="">Product Name Eng</label>
                            </td>
                            <td class="col-md-1">
                                <label for="">Product code</label>
                            </td>
                            <td class="col-md-1">
                                <label for="">Color</label>
                            </td>
                            <td class="col-md-1">
                                <label for="">Size</label>
                            </td>
                            <td class="col-md-1">
                                <label for="">Quantity</label>
                            </td>
                            <td class="col-md-1">
                                <label for="">Price</label>
                            </td>
                        </tr>

                        @foreach($orderItem as $item)
                            <tr>
                                <td class="col-md-1">
                                    <img src="{{URL::to('')}}/media/admin/products/tham-nail/{{ $item -> product -> product_thamnail }}" alt="" style="width: 50px; height: 50px;">
                                </td>

                                <td class="col-md-2">
                                    <label for="">{{ $item -> product -> product_name_eng }}</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">{{ $item -> product -> product_code }}</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">{{ $item -> color }}</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">{{ $item -> size }}</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">{{ $item -> qty }}</label>
                                </td>

                                <td class="col-md-2"> 
                                    <label for=""> ${{ $item -> price * $item -> qty }} (${{ $item -> price }} * {{ $item -> qty }}) </label>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

				</div>
			  </div>

        </div> 
        {{-- // end row --}}
    </div>
</div>

@endsection