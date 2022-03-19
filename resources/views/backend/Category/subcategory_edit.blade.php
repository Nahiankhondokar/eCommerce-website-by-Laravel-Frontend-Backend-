@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- Brand Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">SubCategory Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('subcategory.update', $edit_data -> id) }}"  method="POST">
                            @csrf	
                            @method('PUT')	

                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control">

                                        <option selected disabled value="">Select Category</option>

                                        @foreach ($category as $item)
                                            <option value="{{ $item -> id }}" {{ ($item -> id == $edit_data -> category_id) ? 'selected' : '' }}>{{ $item -> category_name_eng }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                <a href=""></a></div>
                            </div>

                            <div class="form-group">
                                <h5> Category Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $edit_data -> subcategory_name_eng }}" name="eng_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5> Category Name Hindi <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $edit_data -> subcategory_name_hin }}" name="hin_name" class="form-control">
                                    
                                    <input type="hidden" value="{{ $edit_data -> id }}" name="update_id" class="form-control">
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