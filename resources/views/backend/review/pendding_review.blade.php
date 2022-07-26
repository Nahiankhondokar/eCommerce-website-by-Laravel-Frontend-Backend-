@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Pendding Review Show Table --}}
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Pendding Review List</h3>
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
                                   <th>Action</th>
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
                                        @if( $data -> status == 0 )

                                            <span class="badge badge-info badge-pill">Pendding</span>
                                        
                                        @endif 
                                    </td>
                                    <td>
                                        <a href="{{ route('review.approve', $data -> id) }}" class="btn btn-sm btn-primary">Approve</a>
                                        <a id="delete" href="{{ route('review.delete', $data -> id) }}" class="btn btn-sm btn-danger">Delete</a>
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