@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- Brand Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Category Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('category.update', $edit_data -> id) }}"  method="POST">
                            @csrf	
                            @method('PUT')	

                                <div class="form-group">
                                    <h5> Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $edit_data -> category_name_eng }}" name="eng_name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5> Category Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $edit_data -> category_name_hin }}" name="hin_name" class="form-control">
                                        
                                        <input type="hidden" value="{{ $edit_data -> id }}" name="update_id" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5> Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <input type="text" value="{{ $edit_data -> category_icon }}" name="category_icon" class="form-control">

                                    </div>
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