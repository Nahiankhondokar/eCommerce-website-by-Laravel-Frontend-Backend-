@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- Brand Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Brand Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">

                        {{ $brand }}
                        
                        <form action="{{ url('brand/update/' . $brand -> id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf	
                            @method('PUT')	

                                <div class="form-group">
                                    <h5> Brand Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $brand -> brand_name_eng }}" name="eng_name" class="form-control">
                                    </div>
                                    @error('eng_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Brand Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $brand -> brand_name_hin }}" name="hin_name" class="form-control">
                                        <input type="hidden" value="{{ $brand -> id }}" name="update_id" class="form-control">
                                    </div>
                                    @error('hin_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <img id="imgLoad" style="width: 80px; height: 80px;" src="{{ URL::to('') }}/media/brand/{{ $brand -> brand_image }}" alt="">

                                        <input type="hidden" value="{{ $brand -> brand_image }}" name="brand_img_old" class="form-control">

                                        <input id="brandInput" type="file" name="brand_img_new" class="form-control">
                                    </div>
                                    @error('brand_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                
                                <div class="text-xs-right text-center">
                                    <input type="submit" class="btn btn-info rounded mb-5" value="Submit">
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