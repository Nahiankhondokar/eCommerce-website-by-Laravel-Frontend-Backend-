@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            <div class="col-md-12">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Blog Category List <span class="badge badge-pill badge-success">{{ count($blogPost) }}</span> </h3>
                     <a href="{{ route('post.add') }}" style="float: right;" class="btn btn-primary">Add Post</a>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Post Category</th>
                                   <th>Post Image</th>
                                   <th>Post Name Eng</th>
                                   <th>Post Name Hin</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($blogPost as $data)
                                <tr>
                                    <td>{{ $data -> blogCategory -> blog_categroy_name_eng }}</td>
                                    <td><img src="{{ asset($data -> post_image) }}" alt="" width="50"></td>
                                    <td>{{ $data -> post_title_eng }}</td>
                                    <td>{{ $data -> post_title_hin }}</td>
                                    <td>
                                        <a href="{{ route('blog.category.edit', $data -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                        <a id="delete" href="{{ url('/blog/category/delete/' . $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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