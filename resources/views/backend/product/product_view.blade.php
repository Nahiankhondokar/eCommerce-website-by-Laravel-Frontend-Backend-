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
                                        <select id="CategorySelectProduct" name="category_id" class="form-control">
    
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
                                        <select name="subcategory_id" class="form-control">
    
                                            <option selected disabled value="">Select SubCategory</option>
    
                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <a href=""></a></div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <h5>Basic Text Input <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                        </div>
                       
                        <div class="form-group">
                            <h5>File Input Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="file" class="form-control" required> </div>
                        </div>
                       
                        <div class="form-group">
                            <h5>Only Numbers <span class="text-danger">*</span></h5>
                            <div class="input-group"> <span class="input-group-addon">$</span>
                                <input type="number" name="onlyNum" class="form-control" required data-validation-required-message="This field is required"> <span class="input-group-addon">.00</span> </div>
                        </div>
                       
                        <div class="form-group">
                            <h5>Basic Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option value="">Select Your City</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">UK</option>
                                    <option value="4">Canada</option>
                                    <option value="5">Dubai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Textarea <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                            </div>
                        </div>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Checkbox <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="checkbox" id="checkbox_1" required value="single">
                                    <label for="checkbox_1">Check this custom checkbox</label>
                                </div>								
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" required value="x">
                                        <label for="checkbox_2">I am unchecked Checkbox</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" value="y">
                                        <label for="checkbox_3">I am unchecked too</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Radio Buttons <span class="text-danger">*</span></h5>
                                <fieldset class="controls">
                                    <input name="group1" type="radio" id="radio_1" value="1" required>
                                    <label for="radio_1">Check Me</label>
                                </fieldset>
                                <fieldset>
                                    <input name="group1" type="radio" id="radio_2" value="2">
                                    <label for="radio_2">Or Me</label>									
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <fieldset>
                                        <input name="group2" type="radio" id="radio_3" value="Yes" required>
                                        <label for="radio_3">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="group2" type="radio" id="radio_4" value="No">
                                        <label for="radio_4">Or Me</label>
                                    </fieldset>
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