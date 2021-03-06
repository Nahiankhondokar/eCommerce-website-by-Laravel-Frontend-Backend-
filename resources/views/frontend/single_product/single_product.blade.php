@extends('frontend.main_muster')

@section('content')

@section('title')
{{ $single_product -> product_name_eng }}
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->







<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
</div>		
  
    
    
<!-- ========= HOT DEALS ================== -->
@include('frontend.common.hot_deal')
<!-- ================ HOT DEALS: END ================= -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>
    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
		<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
				<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
					<div class="product-item-holder size-big single-product-gallery small-gallery">

						<div id="owl-single-product">


							@foreach ($img as $m) 
								<div class="single-product-gallery-item" id="slide{{ $m }}">
									<a data-lightbox="image-1" data-title="Gallery" href="assets/images/products/p8.jpg">
								<img class="img-responsive" alt="" src="{{ URL::to('') }}/media/admin/products/gallery/{{ $m }}" data-echo="{{ URL::to('') }}/media/admin/products/gallery/{{ $m }}"/>  
								</a>           
							</div><!-- /.single-product-gallery-item -->         
							@endforeach 




						</div><!-- /.single-product-slider -->


						<div class="single-product-gallery-thumbs gallery-thumbs">


							<div id="owl-single-product-thumbnails">
								@foreach($img as $m)
								<div class="item">
									<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $m }}">
										<img class="img-responsive" width="85" alt="" src="{{ URL::to('') }}/media/admin/products/gallery/{{ $m }}" data-echo="{{ URL::to('') }}/media/admin/products/gallery/{{ $m }}" />
									</a>
								</div>
								@endforeach
							</div><!-- /#owl-single-product-thumbnails -->

					
						</div><!-- /.gallery-thumbs -->

					</div><!-- /.single-product-gallery -->
				</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name" id="pname">
                                @if(Session() -> get('language') == 'hindi') {{ $single_product -> product_name_hin }}  @else {{ $single_product -> product_name_eng }} @endif  
                            </h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{{ $single_product -> short_desc_eng }} 
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">

                                        @if($single_product -> discount_price == NULL)
                                        <span class="price"> ${{ $single_product -> selling_price }} </span>
                                        @else
                                        <span class="price"> ${{ $single_product -> discount_price }} </span>
                                            <span class="price-before-discount"><del>$ {{ $single_product -> selling_price }}</del></span>
                                        @endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->
							<br>

							{{-- =========== Product color & Size =========== --}}
							<div class="product-size-color">
								<div class="row">

									{{-- when no sizes available --}}
									@if($single_product -> product_size_eng == null)
									
									@else
									<div class="col-md-6">
										<div class="form-group">
											<label class="info-title control-label">Product Size <span>*</span></label>
											<select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
												<option selected disabled>--Select Size--</option>
												@foreach($product_size_eng as $item)
												<option value="{{ $item }}">{{ ucwords($item) }}</option>
												@endforeach
											</select>
										</div>
									</div>
									@endif


									{{-- when no color available --}}
									@if($single_product -> product_color_eng == null)

									@else
									<div class="col-md-6">
										<div class="form-group">
											<label class="info-title control-label">Product Color <span>*</span></label>
											<select class="form-control unicase-form-control selectpicker" id="color">
												<option selected disabled>--Select Color--</option>
												@foreach($product_color_eng as $item)
												<option value="{{ $item }}">{{ ucwords($item) }}</option>
												@endforeach
											</select>
										</div>
									</div>
									@endif
								</div>
							</div>
							<hr>
							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" id="qty" value="1" min="1">
							              </div>
							            </div>
									</div>

									<input type="hidden" id="product_id" value="{{ $single_product -> id }}"> 

									<div class="col-sm-7">
										<button type="submit" class="btn btn-primary" onclick="AddToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_inline_share_toolbox"></div>

            
							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
                                            @if(Session() -> get('language') == 'hindi') {!! $single_product -> long_desc_eng !!}  @else {!! $single_product -> long_desc_eng !!} @endif  
                                        </p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											@php
												$reviews = App\Models\Review::where('product_id', $single_product -> id) -> latest() -> limit(5) -> get();
											@endphp

											<div class="reviews">
												@foreach($reviews as $item)
												
												@if($item -> status == 0)
												<b>No Review yet</b>
												@else
												<div class="review">
													<div class="row">
														<div class="col-md-3">
															<img src="{{ (!empty( $item -> user -> profile_photo_path )) ? url('media/frontend/' . $item -> user -> profile_photo_path) : url('media/no_image.jpg') }}" class="card-img-top" style="border-radius: 50%; width: 50px; height: 50px; object-fit: cover;" ounded alt="">
															<b>{{ ucwords($item -> user -> name) }}</b>
														</div>
														<div class="col-md-9">
	
														</div>
													</div>
													<div class="review-title"><span class="summary">{{ $item -> summary }}</span><span class="date"><i class="fa fa-calendar"></i><span>{{ Carbon\Carbon::parse($item -> created_at) -> diffForHumans() }}</span></span></div>
													<div class="text">{{ $item -> comment }}</div>
												</div>
												@endif

												@endforeach
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										<hr>
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
											</div><!-- /.review-table -->
											
											@guest
											<p><b> You have to login first for the product review. <a href="{{ route('login') }}">login</a></b></p>
											@else
											<div class="review-form">
												<div class="form-container">
													<form action="{{ route('review.store') }}" class="cnt-form" method="POST">
														@csrf


														<input type="hidden" name="product_id" value="{{ $single_product -> id }}">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputSummary">Product Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="Product Summary" name="summary">
																	@error('summary')
																	<span class="text-danger">{{ $message }}</span>
																	@enderror
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Product Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="Review" name="comment"></textarea>
																	@error('comment')
																	<span class="text-danger">{{ $message }}</span>
																	@enderror
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->
											@endguest

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
		</div><!-- /.product-tabs -->

				<!-- ================= UPSELL PRODUCTS ============= -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Related Products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	    	
		@foreach($related_product as $item)
		<div class="item item-carousel">
			<div class="products">
				
				<div class="product">		
					<div class="product-image">
						<div class="image">
							<a href="detail.html">
								<img  src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}" alt="">
							</a>
						</div><!-- /.image -->			

						@php
						$amount = $item -> selling_price - $item -> discount_price;
						$discount = ($amount/$item -> selling_price) * 100;
						@endphp

						@if($item -> discount_price == NULL)
						<div class="tag new"><span>new</span></div>
						@else
						<div class="tag hot"><span>{{ round($discount) }}%</span></div>
						@endif          		   
					</div><!-- /.product-image -->
						
					
					<div class="product-info text-left">
						<h3 class="name">
							<a href="{{ url('single/product/'.$item -> id.'/'.$item-> product_slug_eng) }}">
								@if(Session() -> get('language') == 'hindi') {{ $item -> product_name_hin }}  @else {{ $item -> product_name_eng }} @endif
							  </a>
						</h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							@if($item -> discount_price == NULL)
							<span class="price"> ${{ $item -> selling_price }} </span>
							@else
							<span class="price"> ${{ $item -> discount_price }} </span>
							  <span class="price-before-discount">$ {{ $item -> selling_price }}</span>
							@endif				
						</div><!-- /.product-price -->
						
					</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
						<div class="action">
							<ul class="list-unstyled">
								<li class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
															
								</li>
								
								<li class="lnk wishlist">
									<a class="add-to-cart" href="detail.html" title="Wishlist">
											<i class="icon fa fa-heart"></i>
									</a>
								</li>

								<li class="lnk">
									<a class="add-to-cart" href="detail.html" title="Compare">
										<i class="fa fa-signal"></i>
									</a>
								</li>
							</ul>
						</div><!-- /.action -->
					</div><!-- /.cart -->
				</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		@endforeach

	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
    </div>




	<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62df8b6973625adf"></script>



@endsection