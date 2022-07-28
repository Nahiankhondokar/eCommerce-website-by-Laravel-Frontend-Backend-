@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <div class="col-md-12">
                <section class="content">

                    <!-- Basic Forms -->
                    <div class="box">
                       <div class="box-header with-border text-center">
                         <h4 class="box-title ">Create Admin User Role </h4>
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">

                            <form action="{{ route('admin.user.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
        
                                        <div class="form-group">
                                            <h5>Admin User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Admin User Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="email" class="form-control" data-validation-required-message="This field is required"> 
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Admin User Phone<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="phone" class="form-control" data-validation-required-message="This field is required"> 
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                    
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Admin User Password<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="text" name="password" class="form-control" data-validation-required-message="This field is required"> 
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Admin User Photo<span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <input id="imgInput" type="file" name="profile_photo_path" class="form-control"> <br>

                                                <img id="imgShow" src="{{ url('media/no_image.jpg') }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%">

                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                {{-- checkbox --}}
                                <hr>
                                <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_1" name="brand">
                                                    <label for="checkbox_1">Brand</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_2" name="category">
                                                    <label for="checkbox_2">Category  </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_3" name="product">
                                                    <label for="checkbox_3">Product</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_4" name="slider">
                                                    <label for="checkbox_4">Slider </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_5" name="coupone">
                                                    <label for="checkbox_5">Coupone </label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_6" name="shipping">
                                                    <label for="checkbox_6">Shipping </label>
                                                </fieldset><fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_7" name="blog">
                                                    <label for="checkbox_7">Blog </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_8" name="sitesetting">
                                                    <label for="checkbox_8">Site Setting  </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_9" name="returnorder">
                                                    <label for="checkbox_9">Return Order</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1"  id="checkbox_10" name="review">
                                                    <label for="checkbox_10">Review</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_11" name="stock">
                                                    <label for="checkbox_11">Stock </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_12" name="orders">
                                                    <label for="checkbox_12">Orders  </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_13" name="reports">
                                                    <label for="checkbox_13">Reports </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_14" name="users">
                                                    <label for="checkbox_14">Users  </label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" value="1" id="checkbox_15" name="adminuserrole">
                                                    <label for="checkbox_15">Admin User Role</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right text-center">
                                    <input type="submit" class="btn btn-info rounded mb-5" value="Add Admin User">
                                </div>

                            </form>
                            <!-- /.form -->
                       </div>
                       <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
           
                </section>
            </div>
            
        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection