@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Product Show Table --}}
            <div class="col-md-12">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">All Product </h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Thambnail</th>
                                   <th>Product English</th>
                                   <th>Product Hinde</th>
                                   <th>Product Size</th>
                                   <th>Quentity</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($products as $data)
                                <tr>
                                    <td><img src="{{ URL::to('') }}/media/admin/products/thambnail/{{ $data -> product_thamnail }}" alt="" style="width: 40px"></i></td>
                                    <td>{{ $data -> product_name_eng }}</td>
                                    <td>{{ $data -> product_name_hin }}</td>
                                    <td>{{ $data -> product_size_eng }}</td>
                                    <td>{{ $data -> product_qty }}</td>
                                    {{-- <td>
                                        <img style="width:60px; height: 60px;" src="{{ URL::to('') }}/media/Category/{{ $data -> category_icon }}" alt="">
                                    </td> --}}
                                    <td>
                                        <a href="#" id="product_view" view_id='{{ $data -> id }}' data-toggle="modal" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>

                                        <a href="" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a id="delete" href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
            
            </div>

        </div>
    </div>
</div>



{{-- Single Product View Modal --}}
<div id="single_product" class="modal fade">
    <div class="modal modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Details of Item</h2>
                
            </div>
        </div>
    </div>
</div>



@endsection