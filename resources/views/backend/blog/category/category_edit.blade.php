@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
   

            {{-- Category Add form --}}

            <div class="col-md-4 m-auto">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Blog Category Edit</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('blog.category.update', $blogCategory -> id) }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5>Blog Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_eng" class="form-control" value="{{ $blogCategory -> blog_categroy_name_eng }}">
                                    </div>
                                    @error('blog_category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Blog Category Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name_hin" class="form-control" value="{{ $blogCategory -> blog_categroy_name_hin }}">
                                    </div>
                                    @error('blog_category_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                
                                <div class="text-xs-right text-center">
                                    <input type="submit" class="btn btn-info rounded mb-5" value="Update">
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