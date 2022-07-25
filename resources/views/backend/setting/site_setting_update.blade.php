@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 m-auto">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border text-center">
                      <h1 class="box-title ">Site Setting Update</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('site.setting.update') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">		

                                    <input type="hidden" value="{{ $setting -> id }}" name="update_id" class="form-control">

                                    <div class="form-group">
                                        <h5>Logo<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="logo" class="form-control"> 

                                            <input type="hidden" value="{{ $setting -> logo }}" name="old_logo" class="form-control"> 
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Phone One <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> phone_one }}" name="phone_one" class="form-control"> 
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Phone Two <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> phone_two }}" name="phone_two" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" value="{{ $setting -> email }}" name="email" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Company Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> company_name }}" name="company_name" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Company Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> company_address }}" name="company_address" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Facebook <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> facebook }}" name="facebook" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Twitter <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> twitter }}" name="twitter" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5> Linkdin <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> linkdin }}" name="linkdin" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>YouTube <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $setting -> youtube }}" name="youtube" class="form-control"> <div class="help-block"></div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-xs-right text-center">
                                        <input type="submit" class="btn btn-info round mb-5" value="Update">
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

            </div>
                <!-- col md 6 -->
        </div>
    </section>
    <!-- /.content -->
  </div>

@endsection