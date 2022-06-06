@extends('admin.admin_master')

@section('admin')

<div class="container-full">  

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">Add New Product</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form action="">
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
                                                <option value="{{ $item -> id }}">{{ $item -> brand_name_eng }}</option>
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
                                        <select id="productcat" name="category_id" class="form-control">
    
                                            <option selected disabled value="">Select Category</option>
    
                                            @foreach ($category as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> category_name_eng }}</option>
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
                                    <div class="controls">
                                        <select id="productsubcat" name="subcategory_id" class="form-control">
    
                                            <option selected disabled value="">Select SubCategory</option>
    
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
                                    <div class="controls">
                                        <select id="productsubsubcat" name="subsubcategory_id" class="form-control">
    
                                            <option selected disabled value="">SubsubCategroy Select</option>

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
                                        <input type="text" name="product_name_eng" class="form-control" required data-validation-required-message="This field is required" />

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
                                        <input type="text" name="product_name_hin" class="form-control" required data-validation-required-message="This field is required" />

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
                                        <input type="text" name="produt_code" class="form-control" />
                                        @error('produt_code')
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
                                        <input type="text" name="produt_qty" class="form-control" />

                                        @error('produt_qty')
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
                                        <input type="text" name="produt_tag_eng" class="form-control" data-role="tagsinput">
                                        
                                        @error('produt_tag_eng')
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
                                        <input type="text" name="produt_tag_hin" class="form-control" data-role="tagsinput" />
                                        @error('produt_tag_hin')
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
                                        <input type="text" name="produt_size_eng " class="form-control" data-role="tagsinput">

                                        @error('produt_size_eng ')
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
                                        <input type="text" class="form-control" name="produt_size_hin" data-role="tagsinput">
                                        
                                        @error('produt_size_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- color, price  --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color Hin<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="produt_color_hin" class="form-control" data-role="tagsinput" />
                                        @error('produt_color_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color Eng<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="produt_color_eng " class="form-control" data-role="tagsinput">

                                        @error('produt_color_eng ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="selling_price" >
                                        
                                        @error('selling_price ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- img, gallery, price  --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" />
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Main Thambnail<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     
                                        <label for="productThambnail"><img id="thambnail_selector" src="{{ URL::to('') }}/media/admin/porductThambnail/thambnail.png" alt="" style="width: 50px; cursor : pointer;"></label>

                                        <input id="productThambnail" type="file" style="display: none;" name="product_thamnail" class="form-control">

                                        <h5 id="productThumbClose" style="display: none; cursor : pointer;">X</h5>
                                        <img id="productThambShow" src="" alt="" style="max-width: 80px;"> 
                                        
                                        @error('product_thamnail')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Multiple Photos <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <label for="productGallery"><img id="gallery_selector" src="{{ URL::to('') }}/media/admin/porductThambnail/gallery.png" alt="" style="width: 50px; cursor : pointer;"></label>

                                        <input id="productGallery" multiple type="file" class="form-control" style="display: none;" name="productgallery[]">

                                        <img src="" alt="">
                                        
                                        @error('feature_products')
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
                                        <textarea name="short_desc_eng" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
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
                                        <textarea name="short_desc_hin" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
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
                                        <textarea id="editor1" name="long_desc_eng" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
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
                                        <textarea id="editor2" name="long_desc_hin" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
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
                                    <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" value="1" id="checkbox_1" name="hot_deal_products">
                                            <label for="checkbox_1">Hot Deal Products</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" value="1" id="checkbox_2" name="feature_products">
                                            <label for="checkbox_2">Feature Products </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" value="1" id="checkbox_3" name="special_offer">
                                            <label for="checkbox_3">Special Offer </label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" value="1"  id="checkbox_4" name="special_deals">
                                            <label for="checkbox_4">Special Deals </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-info rounded mb-5" value="Add Product">
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