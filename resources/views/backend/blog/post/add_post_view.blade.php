@extends('admin.admin_master')

@section('admin')

<div class="container-full">  

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Add New Blog Post</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12">


                        {{-- Post title --}}
                        <div class="row">    

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Name En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="post_title_eng" class="form-control"  />

                                        @error('post_title_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Name Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="post_title_hin" class="form-control"  />

                                        @error('post_title_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Post Categroy Images --}}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Blog Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select id="" name="category_id" class="form-control productcat">
    
                                            <option selected disabled value="">Select Category</option>
    
                                            @foreach ($blogCategory as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> blog_categroy_name_eng }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <a href=""></a></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Thambnail<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     
                                        <label for="productThambnail"><img class="thambnail_selector" src="{{ URL::to('') }}/media/admin/porductThambnail/thambnail.png" alt="" style="width: 50px; cursor : pointer;"></label>

                                        <input id="productThambnail" type="file" style="display: none;" name="post_image" class="form-control product_thambnail" >

                                        <h5 class="productThumbClose" style="display: none; cursor : pointer;">X</h5>
                                        <img class="productThambShow" src="" alt="" style="max-width: 80px;"> 
                                        
                                        @error('post_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                        </div>


                        {{-- Post description --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="post_details_eng" id="textarea" class="form-control"  placeholder="Textarea text" ></textarea>
                                        @error('post_details_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Description Hinde<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="post_details_hin" id="textarea" class="form-control"  placeholder="Textarea text" ></textarea>
                                        @error('post_details_hin ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                  </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-info rounded mb-5" value="Add Blog Post">
                    </div>
                </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


@endsection