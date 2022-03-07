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
                     <h4 class="box-title "> Password Update </h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form action="{{ route('admin.password.update') }}"  method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">		

                                        <div class="form-group">
                                            <h5> Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" value="" name="current_pass" class="form-control"> <div class="help-block"></div></div>
                                        </div>

                                        <div class="form-group">
                                            <h5> New Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" value="" name="new_pass" class="form-control"> <div class="help-block"></div></div>
                                        </div>

                                        <div class="form-group">
                                            <h5> Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" value="" name="confirm_pass" class="form-control"> <div class="help-block"></div></div>
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