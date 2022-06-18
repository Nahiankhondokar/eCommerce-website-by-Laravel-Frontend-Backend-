@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Sliders Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">All Sliders</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Image</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($slider as $data)
                                <tr>
                                    <td>
                                        <img style="width:60px; height: 60px;" src="{{ URL::to('') }}/media/brand/{{ $data -> slider_image }}" alt="">
                                    </td>
                                    <td>{{ $data -> title }}</td>
                                    <td>{{ $data -> desc }}</td>
                                    <td>

                                        @if($data -> status == true)
                                            <a href="{{ route('active.inactive.product', $data -> id) }}" class="badge badge-danger" title="Make it InActive">InActive </a>
                                            <i class="fa fa-thumbs-up badge badge-success" aria-hidden="true" title="Active"></i>
                                        @else 
                                            <a href="{{ route('active.inactive.product', $data -> id) }}" class="badge badge-success" title="Make it Active"> Active </a>
                                            <i class="fa fa-thumbs-down badge badge-danger" aria-hidden="true" title="InActive"></i>
                                        @endif

                                    </td>
                                    
                                    <td>
                                        <a href="{{ url('brand/edit/' . $data -> id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <a href="{{ url('brand/delete/' . $data -> id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                               @endforeach
                           </tbody>
                         </table>
                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->   
            
            </div>


            {{-- Slider Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Add Slider</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('slider.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf		

                                <div class="form-group">
                                    <h5> Slider Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="desc" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_image" class="form-control">
                                    </div>
                                    @error('slider_image')
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