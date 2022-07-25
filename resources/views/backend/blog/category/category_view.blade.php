@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Blog Category List <span class="badge badge-pill badge-success">{{ count($blogCategory) }}</span> </h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Blog Category Eng</th>
                                   <th>Blog Category Hin</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($blogCategory as $data)
                                <tr>
                                    <td>{{ $data -> blog_categroy_name_eng }}</td>
                                    <td>{{ $data -> blog_categroy_name_hin }}</td>
                                    {{-- <td>
                                        <img style="width:60px; height: 60px;" src="{{ URL::to('') }}/media/Category/{{ $data -> category_icon }}" alt="">
                                    </td> --}}
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


            {{-- Category Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Blog Category Add</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('blog.category.store') }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5>Blog Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_eng" class="form-control">
                                    </div>
                                    @error('blog_category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Blog Category Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_hin" class="form-control">
                                    </div>
                                    @error('blog_category_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                
                                <div class="text-xs-right text-center">
                                    <input type="submit" class="btn btn-info rounded mb-5" value="Submit">
                                </div>
                        </form>

                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->         
               </div>
            
            </div>


        </div>
    </div>
</div>

@endsection