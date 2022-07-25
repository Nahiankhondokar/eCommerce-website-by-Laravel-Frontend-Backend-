@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">


            {{-- Report Add form --}}
            <div class="col-md-4">
    
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Search By Date</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                            <form action="{{ route('report.show') }}" method="POST">
                                @csrf		

                                    <div class="form-group">
                                        <h5> Select Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                    
                                    <div class="text-xs-right text-center">
                                        <input type="submit" class="btn btn-info rounded mb-5" value="Search">
                                    </div>
                            </form>

                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
            
            </div>


            <div class="col-md-4">
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Search By Month & Year</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('report.month.year') }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5> Select Month <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="month" id="" class="form-control">
                                            <option value="">Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>

                                        </select>
                                    </div>
                                    @error('month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <h5> Select Year <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year" id="" class="form-control">
                                            <option value="">Select Year</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="text-xs-right text-center">
                                    <input type="submit" class="btn btn-info rounded mb-5" value="Search">
                                </div>
                        </form>

                       </div>
                   </div>
                   <!-- /.box-body -->
                </div>
            </div>


            <div class="col-md-4">
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Search By Year</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                        
                        <form action="{{ route('report.year') }}"  method="POST">
                            @csrf		

                                <div class="form-group">
                                    <h5> Select Year <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year" id="" class="form-control">
                                            <option value="">Select Year</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="text-xs-right text-center">
                                    <input type="submit" class="btn btn-info rounded mb-5" value="Search">
                                </div>
                        </form>

                       </div>
                   </div>
                   <!-- /.box-body -->
                </div>
            </div>


        </div>
    </div>
</div>

@endsection