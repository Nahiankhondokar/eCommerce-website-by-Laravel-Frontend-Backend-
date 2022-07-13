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

                                    <td class="col-md-1">
                                        <label for="">
                                            <span class="badge badge-warning">{{ $order -> status }}</span>
                                        </label>
                                    </td>

                                    <td class="col-md-3">
                                        <a href="{{ url('user/order-details', $order -> id) }}" class="btn btn-sm btn-primary" style="padding: 3px 11px !important;"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-sm btn-info"><i class="fa fa-download"></i></a>
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