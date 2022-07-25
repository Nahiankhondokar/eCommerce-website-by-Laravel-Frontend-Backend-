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
                      <h1 class="box-title ">Seo Setting Update</h1>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('seo.setting.update') }}"  method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">		

                                    <input type="hidden" value="{{ $seo -> id }}" name="update_id" class="form-control">

                                    <div class="form-group">
                                        <h5>Meta Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $seo -> meta_title }}" name="meta_title" class="form-control"> 
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $seo -> meta_keyword }}" name="meta_keyword" class="form-control"> 
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h5>Meta Author <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $seo -> meta_author }}" name="meta_author" class="form-control"> 
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h5>Meta Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $seo -> meta_discription }}" name="meta_discription" class="form-control"> 
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Google Analytics <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $seo -> google_analytics }}" name="google_analytics" class="form-control"> 
                                            <div class="help-block"></div>
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