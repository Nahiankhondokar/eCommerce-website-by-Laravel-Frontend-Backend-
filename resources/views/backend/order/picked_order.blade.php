@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            {{-- <div class="col-md-12> --}}
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Picked Order List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Invoice</th>
                                   <th>Amount</th>
                                   <th>Payment</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($order as $data)
                                <tr>
                                    <td>{{ $data -> order_date }}</td>
                                    <td>{{ $data -> invoice_no }} </td>
                                    <td>${{ $data -> amount }}</td>
                                    <td>
                                        {{ $data -> payment_method }}
                                    </td>
                                    <td>
                                        <span class="badge badge-info badge-pill">{{ $data -> status }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('pendding.order.details', $data -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>

                                        <a id="delete" href="{{ url('/coupone/delete/' . $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                               @endforeach
                           </tbody>
                         </table>
                       </div>
                   </div>
                   <!-- /.box-body -->
                </div>
                 <!-- /.box -->   
            
            {{-- </div> --}}

        </div>
    </div>
</div>

@endsection