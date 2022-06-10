@extends('admin.admin_master')

@section('admin')

<div class="container-full">  

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Edit Product</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form action="{{ route('update.product', $product -> id) }}" method="POST">
                    @csrf

                    <input type="hidden" name="update_id" value="{{ $product -> id }}">

                  <div class="row">
                    <div class="col-12">

                        {{-- Categroy, Brands, subcategory --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control">
    
                                            <option selected disabled value="">Select Brand</option>
    
                                            @foreach ($brand as $item)
                                                <option value="{{ $item -> id }}" {{ ($product -> brand_id == $item -> id) ? 'selected' : '' }} >{{ $item -> brand_name_eng }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <a href=""></a></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control productcatEdit">
    
                                            <option selected disabled value="">Select Category</option>
    
                                            @foreach ($category as $item)
                                                <option value="{{ $item -> id }}" {{ ($product -> category_id == $item -> id) ? 'selected' : '' }}>{{ $item -> category_name_eng }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <a href=""></a></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls" id="productsubcategoryItem">
                                        <select style="pointer-events : none;"  name="subcategory_id" class="form-control productsubcatEdit">
    
                                            <option selected disabled value="">Select SubCategory</option>

                                            @foreach ($subcategory as $item)
                                                <option value="{{ $item -> id }}" {{ ($product -> subcategory_id == $item -> id) ? 'selected' : '' }}>{{ $item -> subcategory_name_eng }}</option>
                                            @endforeach
                                            
    
                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <a href=""></a></div>
                                </div>
                            </div>
                        </div>

                        {{-- subsubCategroy, product feilds --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubsubCategroy Select <span class="text-danger">*</span></h5>
                                    <div class="controls" id="productsubsubcategoryItem">
                                        <select style="pointer-events : none;" name="subsubcategory_id" class="form-control productsubsubcatEdit">
    
                                            <option selected disabled value="">SubsubCategroy Select</option>

                                            @foreach ($subsubcategory as $item)
                                                <option value="{{ $item -> id }}" {{ ($product -> subsubcategory_id == $item -> id) ? 'selected' : '' }}>{{ $item -> subsubcategory_name_eng }}</option>
                                            @endforeach
                                            

                                        </select>
                                        @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_eng" class="form-control" value="{{ $product -> product_name_eng }}" />

                                        @error('product_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control" value="{{ $product -> product_name_hin }}" />

                                        @error('product_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- code quentity tag name --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code<span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <input type="text" name="product_code" class="form-control" value="{{ $product -> product_code }}" />

                                        @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" value="{{ $product -> product_qty }}"/>

                                        @error('product_qty')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Tag Name Eng <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tag_eng" class="form-control" data-role="tagsinput" value="{{ $product -> product_tag_eng }}">
                                        
                                        @error('product_tag_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- tag, size,  --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tag Hin<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tag_hin" class="form-control" data-role="tagsinput" value="{{ $product -> product_tag_hin }}"/>

                                        @error('product_tag_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size Eng<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_eng" class="form-control" data-role="tagsinput" value="{{ $product -> product_size_eng }}">

                                        @error('product_size_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="product_size_hin" data-role="tagsinput" value="{{ $product -> product_size_hin }}">
                                        
                                        @error('product_size_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- color  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color Hin<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_hin" class="form-control" data-role="tagsinput" value="{{ $product -> product_color_hin }}"/>
                                        @error('product_color_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color Eng<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_eng" class="form-control" data-role="tagsinput" value="{{ $product -> product_color_eng }}">

                                        @error('product_color_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>


                        </div>

                        {{--  price  --}}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="selling_price" value="{{ $product -> selling_price }}">
                                        
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" value="{{ $product -> discount_price ?? 'None' }}"/>

                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- short description --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_eng" id="textarea" class="form-control"  placeholder="Textarea text" >
                                            {!! $product -> short_desc_eng !!}
                                        </textarea>
                                        @error('short_desc_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description Hinde<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_hin" id="textarea" class="form-control"  placeholder="Textarea text" >
                                            {!! $product -> short_desc_hin !!}
                                        </textarea>

                                        @error('short_desc_hin ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- long description --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_desc_eng" rows="10" cols="80" >
                                            {!! $product -> long_desc_eng !!}
                                        </textarea>
                                        @error('long_desc_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description Hinde<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_desc_hin" rows="10" cols="80" >
                                            {!! $product -> long_desc_hin !!}
                                        </textarea>
                                        @error('long_desc_hin ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- checkbox --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Type <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" value="1" id="checkbox_1" name="hot_deal_products" {{ ($product -> hot_deal_product == 1) ? 'checked' : '' }}>
                                            <label for="checkbox_1">Hot Deal Products</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" value="1" id="checkbox_2" name="feature_products" {{ ($product -> feature_product == 1) ? 'checked' : '' }}>
                                            <label for="checkbox_2">Feature Products </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Type <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" value="1" id="checkbox_3" name="special_offer" {{ ($product -> special_offer == 1) ? 'checked' : '' }}>
                                            <label for="checkbox_3">Special Offer </label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" value="1"  id="checkbox_4" name="special_deals" {{ ($product -> special_deal == 1) ? 'checked' : '' }}>
                                            <label for="checkbox_4">Special Deals </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-info rounded mb-5" value="Update Product">
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


  {{-- Multiplae image & Thambnail image change --}}
  <div class="content">
      <section>
        <div class="row">
            <div class="col-md-6">
                <div class="box bt-3 border-warning">
                  <div class="box-header">
                    <h4 class="box-title">Multiple Images <strong>Update</strong></h4>
                  </div>
    
                    {{-- Multiplae image change --}}
                  <form action="{{ route('gallery.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Product Multiple Photos<span class="text-danger">*</span></h5>
                                <div class="controls">
                        
                                    <label for="product_gallery"><img class="gallery_selectorEdit" src="{{ URL::to('') }}/media/admin/porductThambnail/gallery.png" alt="" style="width: 50px; cursor : pointer; display: none;"></label>
                        
                                    <input id="product_gallery" multiple type="file" class="form-control productGalleryEdit" style="display: none;" name="product_gallery[]" >
                                    <input type="hidden" name="product_id" value="{{ $product -> id }}">
                        
                                    <h5 class="productGalleryCloseEdit" style="cursor : pointer;">X</h5>

                                    <div id="product_previous_gallery">

                                        @php
                                        foreach ($multiple_img as $value) {

                                            $gall_arr = json_decode($value -> photo_name);

                                        }
                                        @endphp

                                        @foreach($gall_arr -> gallery as $img)
                                        
                                        <img src="{{ asset('media/admin/products/gallery/' . $img) }}" alt="" style="width: 50px">

                                        @endforeach
                                    </div>

                                    <div class="productGalleryShowEdit">
                                        
                                    </div>
                                    
                                    @error('feature_products')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <a href=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-info rounded mb-5" value="Update Phtots">
                    </div>
      
                  </form>
    
                </div>
            </div>
    {{-- ------------------------------------------------------------------------ --}}
            <div class="col-md-6">
                <div class="box bt-3 border-warning">
                  <div class="box-header">
                    <h4 class="box-title">Product Thambnail <strong>Update</strong></h4>
                  </div>
    
                    {{-- Thambnail image change --}}
                  <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group p-3">
                              <h5>Main Thambnail<span class="text-danger">*</span></h5>
                              <div class="controls">
                               
                                  <label for="productThambnail" style="cursor : pointer;">
                                    <img class="thambnail_selector" src="{{ URL::to('') }}/media/admin/porductThambnail/thambnail.png" alt="" style="width: 50px; cursor : pointer; display: none;">
                                </label>
                      
                                  <input id="productThambnail" type="file" style="display: none;" name="product_thamnail" class="form-control product_thambnail">
    
                                    
                      
                                  <h5 class="productThumbClose" style="cursor : pointer;">X</h5>
                                    
                                  <img class="productThambShow" src="{{ asset('media/admin/products/thambnail/' . $product -> product_thamnail) }}" alt="" style="max-width: 80px;"> 
                                  
                                  @error('product_thamnail')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                  <a href=""></a>
                              </div>
                          </div>
                        </div>
                    </div>
    
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-info rounded mb-5" value="Update Phtots">
                    </div>
      
                  </form>
    
                </div>
            </div>
        </div>
      </section>
  </div>

@endsection