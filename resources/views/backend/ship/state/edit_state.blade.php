@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">State List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>District Name</th>
                                   <th>Division Name</th>
                                   <th>State Name</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($state as $data)
                                <tr>
                                    <td>{{ ucwords($data -> division -> division_name) }}</td>
                                    <td>{{ ucwords($data -> district -> district_name) }}</td>
                                    <td>{{ ucwords($data -> state_name) }}</td>
                                    <td>
                                        <a href="{{ route('state.edit', $data -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                        <a id="delete" href="{{ url('shipping/state/delete/' . $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                     <h3 class="box-title">State Update</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('state.update', $edit_data -> id) }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5> Division Name <span class="text-danger">*</span></h5>
                                    <select name="division_id" id="" class="form-control">
                                        <option value="" selected disabled>-Select Divison-</option>
                                        @foreach($division as $data)
                                            <option value="{{ $data -> id }}" {{ $data -> id == $edit_data -> division_id ? 'selected' : '' }} >{{ ucwords($data -> division_name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> District Name <span class="text-danger">*</span></h5>
                                    <select name="district_id" id="" class="form-control">
                                        <option value="" selected disabled>-Select District-</option>
                                        @foreach($district as $data)
                                            <option value="{{ $data -> id }}" {{ $data -> id == $edit_data -> district_id ? 'selected' : '' }}>{{ ucwords($data -> district_name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> State Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="state_name" class="form-control" value="{{ $edit_data -> state_name }}">
                                    </div>
                                    @error('state_name')
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