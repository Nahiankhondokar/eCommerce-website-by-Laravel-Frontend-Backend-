@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- Brand Add form --}}

            <div class="col-md-4 m-auto">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Slider Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('slider.update', $slider -> id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf	
                            @method('PUT')	

                                <div class="form-group">
                                    <h5> Slider Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $slider -> title }}" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5> Slider Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $slider -> desc }}" name="desc" class="form-control">

                                        <input type="hidden" value="{{ $slider -> id }}" name="update_id" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5> Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <img id="imgLoad" style="width: 80px; height: 80px;" src="{{ URL::to('') }}/{{ $slider -> slider_img }}" alt="">

                                        <input type="hidden" value="{{ $slider -> slider_img }}" name="slider_img_old" class="form-control">

                                        <input id="brandInput" type="file" name="slider_img_new" class="form-control">
                                    </div>
                                    @error('slider_img_new')
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