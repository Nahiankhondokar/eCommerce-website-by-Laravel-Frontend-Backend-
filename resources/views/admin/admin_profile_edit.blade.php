@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border text-center">
                     <h4 class="box-title "> Profile Update </h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form action="{{ route('admin.profile.update') }}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">		

                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" value="{{ $profile_edit -> name }}" name="name" class="form-control" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <input type="email" value="{{ $profile_edit -> email }}" name="email" class="form-control" data-validation-required-message="This field is required"> 
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="hidden" value="{{ $profile_edit -> profile_photo_path }}" name="old_file" class="form-control" >

                                                <input id="imgInput" type="file" name="new_file" class="form-control"> <br>

                                                <img id="imgShow" src="{{ (!empty( $profile_edit -> profile_photo_path )) ? url('media/admin/' . $profile_edit -> profile_photo_path) : url('media/no_image.jpg') }}" alt="" style="max-width: 100%; height: 250px; object-fit: cover;">

                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        
                                        <div class="text-xs-right text-center">
                                            <input type="submit" class="btn btn-info rounded mb-5" value="Update">
                                        </div>
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
        
        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection