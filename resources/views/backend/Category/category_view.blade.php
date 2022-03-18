@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Category List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Category Icon</th>
                                   <th>Category Eng</th>
                                   <th>Category Hin</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($category as $data)
                                <tr>
                                    <td><i class="{{ $data -> category_icon }}"></i></td>
                                    <td>{{ $data -> category_name_eng }}</td>
                                    <td>{{ $data -> category_name_hin }}</td>
                                    {{-- <td>
                                        <img style="width:60px; height: 60px;" src="{{ URL::to('') }}/media/Category/{{ $data -> category_icon }}" alt="">
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('category.edit', $data -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                        <a id="delete" href="{{ url('category/delete/' . $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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


            {{-- Category Add form --}}

            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Category Add</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('category.store') }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5> Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="eng_name" class="form-control">
                                    </div>
                                    @error('eng_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Category Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="hin_name" class="form-control">
                                    </div>
                                    @error('hin_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control">
                                    </div>
                                    @error('category_icon')
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