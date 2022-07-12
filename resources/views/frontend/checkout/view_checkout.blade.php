@extends('frontend.main_muster')

@section('content')

@section('title')
CheckOut Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">

                <form class="register-form" action="{{ route('store.checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">		
                                            
                                            <!-- guest-login -->			
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="checkout-subtitle"><strong>Shipping Address</strong></h4>

                                                <!-- radio-form  -->
                                                
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ Auth::user() -> name }}" required name="shipping_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Email <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ Auth::user() -> email }}" required name="shipping_email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Phone <span>*</span></label>
                                                        <input type="number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ Auth::user() -> phone }}" required name="shipping_phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                                                        <input type="number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required name="post_code">
                                                    </div>
                                                <!-- radio-form  -->
                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                
                                                <div class="form-group">
                                                    <h5><b>Division Name <span class="text-danger">*</span></b> </h5>
                                                    <select name="division_id" class="form-control" id="DivisionSelect">
                                                        <option value="" selected disabled>-Select Divison-</option>
                                                        @foreach($divisions as $data)
                                                            <option value="{{ $data -> id }}">{{ ucwords($data -> division_name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('division_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                                <div class="form-group">
                                                    <h5><b>District Name <span class="text-danger">*</span></b> </h5>
                                                    <select name="district_id" id="LoadDistrick" class="form-control">
                
                                                        
                                                        
                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                                <div class="form-group">
                                                    <h5><b>State Name <span class="text-danger">*</span></b></h5>
                                                    <div class="controls">
                                                        <select name="state_id" class="form-control" id="LoadState">
                                                            
                                                        </select>
                                                    </div>
                                                    @error('state_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <h5><b>Notes <span class="text-danger">*</span></b> </h5>
                                                    <div class="controls">
                                                        <textarea name="" id="" cols="30" rows="3" placeholder="Notes"></textarea>
                                                    </div>
                                                    @error('state_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                
                                            </div>	
                                            <!-- already-registered-login -->		
                                        
                                        </div>			
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                                                    
                            
                        </div><!-- /.checkout-steps -->
                    </div>


                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

                                            @foreach($carts as $item)
                                            <li>
                                                <img src="/media/admin/products/tham-nail/{{ $item -> options -> image }}" alt="" style="width: 50px; height: 50px;">

                                            <span>Quantity : <strong>{{ $item -> qty }}</strong></span>
                                            <span>Color : <strong>{{ $item -> options -> color }}</strong></span>
                                            <span>Size : <strong>{{ $item -> options -> size }}</strong></span>
                                            <hr>
                                            </li>

                                            @endforeach

                                            <li>
                                                @if(Session::has('coupon'))

                                                    <span>Coupon Name : <strong> {{ Session::get('coupon')['coupon_name'] }} {{ Session::get('coupon')['coupon_discount'] }}%</strong></span>
                                                    <hr>
                                                    <span>Discount : <strong>$ {{ Session::get('coupon')['discount_amount'] }}</strong></span>
                                                    <hr>
                                                    <span>Grand Total : <strong>$ {{ Session::get('coupon')['total_amount'] }}</strong></span>

                                                @else
                                                    <span>SubTotal : <strong>$ {{ $cart_amount }}</strong></span>
                                                    <hr>
                                                    <span>Grand Total : <strong>$ {{ $cart_amount }}</strong></span>
                                                @endif
                                            </li>

                                            
                                        </ul>		
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- checkout-progress-sidebar -->				
                    </div>

                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{ asset('frontend/assets/images/payments/5.png') }}" alt="">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Submit</button>
                                </div>
                            </div>
                        </div> 
                        <!-- checkout-progress-sidebar -->				
                    </div>

                </form>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->

        <!-- =============== BRANDS CAROUSEL ============== -->
        {{-- @include('frontend.body.brands') --}}
        <!-- ======= BRANDS CAROUSEL : END =========== -->

	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection