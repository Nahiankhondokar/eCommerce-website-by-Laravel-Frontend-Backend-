@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All User Show Table --}}
            <div class="col-md-12">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">All User List</h3>
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
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($users as $user)
                                <tr>
                                    <td><img src="{{ (!empty( $user -> profile_photo_path )) ? url('media/frontend/' . $user -> profile_photo_path) : url('media/no_image.jpg') }}" alt="" width="50"></td>
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td>{{ $user -> phone }}</td>
                                    <td>
                                        @if($user -> UserOnline())
                                            <span class="badge badge-pill badge-success">Online</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user -> last_seen) -> diffForHUmans() }}</span>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning">Edit</a>

                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
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