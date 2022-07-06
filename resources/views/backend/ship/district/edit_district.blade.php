@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">district List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>District Name</th>
                                    <th>Division Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($district as $data)
                                 <tr>
                                     <td>{{ ucwords($data -> district_name) }}</td>
                                     <td>{{ $data -> division -> division_name }}</td>
                                     <td>
                                         <a href="{{ route('district.edit', $data -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
 
                                         <a id="delete" href="{{ url('shipping/district/delete/' . $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                     <h3 class="box-title">district Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('district.update', $edit_data -> id) }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5> Division Name <span class="text-danger">*</span></h5>
                                    <select name="division_id" id="" class="form-control">
                                        <option value="" disabled>-Select Divison-</option>
                                        @foreach($division as $data)
                                            @if($edit_data -> division_id == $data -> id)
                                            <option selected value="{{ $data -> id }}">{{ $data -> division_name }}</option>
                                            @else
                                            <option value="{{ $data -> id }}">{{ $data -> division_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('district_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> district Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district_name" class="form-control" value="{{ $edit_data -> district_name }}">
                                    </div>
                                    @error('district_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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