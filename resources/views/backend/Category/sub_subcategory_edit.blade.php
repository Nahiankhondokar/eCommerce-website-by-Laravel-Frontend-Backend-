@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- Brand Add form --}}

            <div class="col-md-8 m-auto">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Sub - SubCategory Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('subcategory.update', $subsubcat -> id) }}"  method="POST">
                            @csrf	
                            @method('PUT')	

                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control">

                                        <option selected disabled value="">Select Category</option>

                                        @foreach ($category as $item)
                                            <option value="{{ $item -> id }}" {{ ($item -> id == $subsubcat -> category_id) ? 'selected' : '' }}>{{ $item -> category_name_eng }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                <a href=""></a></div>
                            </div>

                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control">

                                        <option selected disabled value="">Select SubCategory</option>

                                        @foreach ($subcategory as $item)
                                            @if($item -> id == $subsubcat -> subcategory_id)
                                                <option value="{{ $item -> id }}" selected>{{ $item -> subcategory_name_eng }}</option>
                                            @else
                                                <option value="{{ $item -> id }}">{{ $item -> subcategory_name_eng }}</option>
                                            @endif
                                        @endforeach
                                        
                                    </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                <a href=""></a></div>
                            </div>

                            <div class="form-group">
                                <h5> Category Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $subsubcat -> subsubcategory_name_eng }}" name="eng_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5> Category Name Hindi <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $subsubcat -> subsubcategory_name_hin }}" name="hin_name" class="form-control">
                                    
                                    <input type="hidden" value="{{ $subsubcat -> id }}" name="update_id" class="form-control">
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