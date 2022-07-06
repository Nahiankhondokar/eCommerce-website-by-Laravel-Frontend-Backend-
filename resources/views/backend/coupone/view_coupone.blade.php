@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">

            {{-- All Category Show Table --}}
            <div class="col-md-8">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Coupone List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Discount</th>
                                   <th>Validity</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($coupone as $data)
                                <tr>
                                    <td>{{ $data -> coupone_name }}</td>
                                    <td>{{ $data -> coupone_discount }} %</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($data -> coupone_validity) -> format('D, d F Y') }}
                                    </td>
                                    <td>
                                        @if($data -> coupone_validity >= Carbon\Carbon::now() -> format('Y-m-d'))
                                            <a href="#" class="badge badge-success" title="Make it Active"> Valid </a>
                                        @else 
                                            <a href="#" class="badge badge-danger" title="Make it InActive">InValid </a>
                                        @endif
                                    </td>
                                    <td width="25%">
                                        <a href="{{ route('coupone.edit', $data -> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                        <a id="delete" href="{{ url('/coupone/delete/' . $data -> id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                     <h3 class="box-title">Coupone Add</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('coupone.store') }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5> Coupone Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupone_name" class="form-control">
                                    </div>
                                    @error('coupone_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Coupone Discount (%)<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupone_discount" class="form-control">
                                    </div>
                                    @error('coupone_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5> Coupone Validity Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="coupone_validity" class="form-control" min="{{ Carbon\Carbon::now() -> format('Y-m-d') }}">
                                    </div>
                                    @error('coupone_validity')
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