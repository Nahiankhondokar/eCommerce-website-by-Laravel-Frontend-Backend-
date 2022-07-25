@extends('frontend.main_muster')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            
            @include('frontend.common.user_sidebar')

            {{-- // Shipping Details --}}
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h3 class="text-center">Shipping Details</h3>
                    </div>
                    <div class="card-body" style="background: #E9EBEC;">
                        <table class="table">
                            <tr>
                                <th>Shipping Name :</th>
                                <th> {{ $order -> name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email : </th>
                                <th>{{ $order -> email }} </th>
                            </tr>
                            <tr>
                                <th>Shipping Phone : </th>
                                <th>{{ $order -> phone }}</th>
                            </tr>
                            <tr>
                                <th>Division : </th>
                                <th>{{ $order -> division -> division_name }}</th>
                            </tr>
                            <tr>
                                <th>District : </th>
                                <th>{{ $order -> district -> district_name }}</th>
                            </tr>
                            <tr>
                                <th>State : </th>
                                <th>{{ $order -> stateName -> state_name ?? 'none' }}</th>
                            </tr>

                            <tr>
                                <th>Post Code : </th>
                                <th>{{ $order -> post_code }}</th>
                            </tr>

                            <tr>
                                <th>Order Date : </th>
                                <th>{{ $order -> order_date }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- // order details --}}
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h3 class="text-center">Order Details</h3>
                    </div>
                    <div class="card-body" style="background: #E9EBEC;">
                        <table class="table">
                            <tr>
                                <th> Name :</th>
                                <th> {{ $order -> user -> name }}</th>
                            </tr>
                            <tr>
                                <th> Email : </th>
                                <th>{{ $order -> user -> email }} </th>
                            </tr>
                            <tr>
                                <th> Phone : </th>
                                <th>{{ $order -> user -> phone }}</th>
                            </tr>
                            <tr>
                                <th>Payment Type : </th>
                                <th>{{ $order -> payment_method }}</th>
                            </tr>
                            <tr>
                                <th>Tranx ID : </th>
                                <th>{{ $order -> transaction_id ??  'none'  }}</th>
                            </tr>
                            <tr>
                                <th>Invoice : </th>
                                <th class="text-danger">{{ $order -> invoice_no }}</th>
                            </tr>

                            <tr>
                                <th>Order Total : </th>
                                <th>$ {{ $order -> amount }}</th>
                            </tr>

                            <tr>
                                <th>Order : </th>
                                <th>
                                    <span class="badge badge-warning">{{ $order -> status }}</span>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #e2e2e2;" >
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
                                    <td class="col-md-2">
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

                                    <td class="col-md-1"> 
                                        <label for=""> ${{ $item -> price * $item -> qty }} (${{ $item -> price }} * {{ $item -> qty }}) </label>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            @if($order -> status !== 'delivered')

            @else

            @php
                $order_data = App\Models\Order::where('id', $order -> id) -> where('return_reason', '=', NULL) -> first();
            @endphp

                @if( $order_data)
                    <form action="{{ route('order.return', $order -> id ) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Order Return Reason</label>
                            <textarea id="" cols="30" rows="5" class="form-control" placeholder="Return Reason..." name="orderReturn"></textarea>
                        </div>

                        <button type="submit" class='btn btn-primary'>Order Return</button>
                    </form>
                    <br>
                @else
                    <span class="badge badge-pill badge-danger" style="background: red">You have sent your return request</span>
                    <br>
                @endif 
                    <br>
            @endif



        </div>
    </div>
</div>



@endsection