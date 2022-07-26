@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Pendding Review Show Table --}}
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Approve Review List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Product</th>
                                   <th>User</th>
                                   <th>Summary</th>
                                   <th>Review</th>
                                   <th>Status</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($reviews as $data)
                                <tr>
                                    <td>{{ $data -> product -> product_name_eng }}</td>
                                    <td>{{ $data -> user -> name }} </td>
                                    <td>${{ $data -> summary }}</td>
                                    <td>
                                        {{ $data -> comment }}
                                    </td>
                                    <td>
                                        @if( $data -> status == 1 )

                                            <span class="badge badge-success badge-pill">Approved</span>
                                        
                                        @endif 
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