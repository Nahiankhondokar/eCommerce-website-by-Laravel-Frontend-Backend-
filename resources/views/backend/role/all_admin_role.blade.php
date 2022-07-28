@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All User Show Table --}}
            <div class="col-md-12">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Admin User Role List</h3>
                     <a href="{{ route('create.admin.view') }}" style="float: right" class="btn btn-primary">Create Admin</a>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Access</th>
                                    <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($adminUser as $item)
                                <tr>
                                    <td><img src="{{ (!empty( $item -> profile_photo_path )) ? url( $item -> profile_photo_path) : url('media/no_image.jpg') }}" alt="" width="50"></td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> email }}</td>
                                    <td>
                                        @if($item -> brand == 1)
                                            <span class="badge badge-success">Brand</span>
                                        @endif 
                                        
                                        @if($item -> category == 1)
                                            <span class="badge badge-success">Category</span>
                                        @endif

                                        @if($item -> product == 1)
                                            <span class="badge badge-primary">Product</span>
                                        @endif
                                        
                                        @if($item -> slider == 1)
                                            <span class="badge badge-dark">Slider</span>
                                        @endif
                                        
                                        @if($item -> coupone == 1)
                                            <span class="badge badge-danger">Coupone</span>
                                        @endif
                                        
                                        @if($item -> shipping == 1)
                                            <span class="badge badge-ingo">Shipping</span>
                                        @endif
                                        
                                        @if($item -> blog == 1)
                                            <span class="badge badge-danger">Blog</span>
                                        @endif
                                        
                                        @if($item -> sitesetting == 1)
                                            <span class="badge badge-warning">Site Setting</span>
                                        @endif
                                        
                                        @if($item -> returnorder == 1)
                                            <span class="badge badge-light">Return Order</span>
                                        @endif
                                        
                                        @if($item -> review == 1)
                                            <span class="badge badge-primary">Review</span>
                                        @endif
                                        
                                        @if($item -> stock == 1)
                                            <span class="badge badge-danger">Stock</span>
                                        @endif
                                        
                                        @if($item -> orders == 1)
                                            <span class="badge badge-warning">Orders</span>
                                        @endif
                                        
                                        @if($item -> reports == 1)
                                            <span class="badge badge-info">Reports</span>
                                        @endif
                                        
                                        @if($item -> users == 1)
                                            <span class="badge badge-dark">Users</span>
                                        @endif
                                        
                                        @if($item -> adminuserrole == 1)
                                            <span class="badge badge-light">Admin User Role</span>
                                        @endif
                                        
                                    </td>
                                    <td width="100">
                                        <a href="{{ route('admin.user.edit', $item -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>

                                        <a id="delete" href="{{ route('admin.user.delete', $item -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

@endsection