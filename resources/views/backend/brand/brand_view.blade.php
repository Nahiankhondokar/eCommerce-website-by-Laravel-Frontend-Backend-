@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Brand Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Brand List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Brand Eng</th>
                                   <th>Brand Hin</th>
                                   <th>Brand img</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($brand as $b)
                                <tr>
                                    <td>{{ $b -> brand_name_eng }}</td>
                                    <td>{{ $b -> brand_name_hin }}</td>
                                    <td>
                                        <img style="width:60px; height: 60px;" src="{{ URL::to('') }}/media/brand/{{ $b -> brand_image }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ url('brand/edit/' . $b -> id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <a href="{{ url('brand/delete/' . $b -> id) }}" class="btn btn-sm btn-danger">Delete</a>
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


            {{-- Brand Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Brand Add</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('brand.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf		

                                <div class="form-group">
                                    <h5> Brand Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="eng_name" class="form-control">
                                    </div>
                                    @error('eng_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Brand Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="hin_name" class="form-control">
                                    </div>
                                    @error('hin_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_img" class="form-control">
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