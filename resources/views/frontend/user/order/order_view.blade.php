@extends('frontend.main_muster')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            
            @include('frontend.common.user_sidebar')

            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #e2e2e2;" >
                                <td class="col-md-1">
                                    <label for="">Date</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Total</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Invoice</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Payment</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Order</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Active</label>
                                </td>
                            </tr>

                            @foreach($orders as $order)
                                <tr>
                                    <td class="col-md-2">
                                        <label for="">{{ $order -> order_date }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">$ {{ $order -> amount }}</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">{{ $order -> invoice_no }}</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">{{ $order -> payment_method }}</label>
                                    </td>


                                    {{-- Order status --}}
                                    <td class="col-md-1">

                                        @if($order -> status == 'Pendding')
                                            <label for="">
                                                <span class="badge badge-warning" style="background: rgb(67, 0, 105)">{{ ucwords('pandding') }}</span>
                                            </label>
                                        @elseif($order -> status == 'confirmed')
                                        <label for="">
                                            <span class="badge badge-warning" style="background: rgb(128, 0, 117)">{{ ucwords('confirmed') }}</span>
                                        </label>
                                        @elseif($order -> status == 'delivered')
                                        <label for="">
                                            <span class="badge badge-warning" style="background: green">{{ ucwords('delivered') }}</span>

                                            @if($order -> return_order == 1)
                                                <span class="badge badge-danger" style="background: red">Return Requested</span>
                                            @endif

                                        </label>
                                        @elseif($order -> status == 'shipped')
                                        <label for="">
                                            <span class="badge badge-warning" style="background: rgb(117, 70, 0)">{{ ucwords('shipped') }}</span>
                                        </label>
                                        @elseif($order -> status == 'picked')
                                        <label for="">
                                            <span class="badge badge-warning" style="background: rgb(3, 0, 182)">{{ ucwords('picked') }}</span>
                                        </label>
                                        @elseif($order -> status == 'processing')
                                        <label for="">
                                            <span class="badge badge-warning" style="color : black; background: yellow">{{ ucwords('processing') }}</span>
                                        </label>
                                        @elseif($order -> status == 'canceled')
                                        <label for="">
                                            <span class="badge badge-warning" style="background: red">{{ ucwords('canceled') }}</span>
                                        </label>
                                    
                                        @endif
                                        
                                    </td>





                                    <td class="col-md-3">
                                        <a href="{{ url('user/order-details', $order -> id) }}" class="btn btn-sm btn-primary" style="padding: 3px 11px !important;" title="view"><i class="fa fa-eye"></i></a>
                                        
                                        <a target="_blank" href="{{ url('user/invoice-download', $order -> id) }}" class="btn btn-sm btn-info" title="Download PDF"><i class="fa fa-download"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>



            

        </div>
    </div>
</div>



@endsection