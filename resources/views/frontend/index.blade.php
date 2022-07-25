@extends('frontend.main_muster')

@section('content')

@section('title')
Home Online Shop
@endsection


<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.common.verticle_navigation')
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== --> 

        <!-- ================ HOT DEALS =========== -->
        @include('frontend.common.hot_deal')
        <!-- ======== HOT DEALS: END ===================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div
              class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs"
            >

            
              <div class="item">
                <div class="products special-product">
                  @foreach($specialoffer as $item)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="{{ url('single/product/'.$item -> id.'/'.$item-> product_slug_eng) }}">
                                @if(Session() -> get('language') == 'hindi') {{ $item -> product_name_hin }}  @else {{ $item -> product_name_eng }} @endif
                              </a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              @if($item -> discount_price == NULL)
                                <span class="price"> ${{ $item -> selling_price }} </span>
                              @else
                              <span class="price"> ${{ $item -> selling_price }} </span>
                              <span class="price-before-discount">${{ $item -> discount_price }}</span>
                              @endif
                              {{-- <span class="price"> $450.99 </span> --}}
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  @endforeach
                </div>
              </div>
            

            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->


        <!-- ============================================== PRODUCT TAGS ============================================== -->
        @include('frontend.common.product_tags')
        <!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->


        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div
              class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs"
            >
              <div class="item">
                <div class="products special-product">
                  @foreach($specialdeal as $item)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="{{ url('single/product/'.$item -> id.'/'.$item-> product_slug_eng) }}">
                                @if(Session() -> get('language') == 'hindi') {{ $item -> product_name_hin }}  @else {{ $item -> product_name_eng }} @endif
                              </a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              @if($item -> discount_price == NULL)
                                <span class="price"> ${{ $item -> selling_price }} </span>
                              @else
                              <span class="price"> ${{ $item -> selling_price }} </span>
                              <span class="price-before-discount">${{ $item -> discount_price }}</span>
                              @endif
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div
          class="sidebar-widget newsletter wow fadeInUp outer-bottom-small"
        >
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  placeholder="Subscribe to our newsletter"
                />
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
        @include('frontend.common.testimonial')
        <!-- ============================================== Testimonials: END ============================================== -->

        <div class="home-banner">
          <img src="assets/images/banners/LHS-banner.jpg" alt="Image" />
        </div>
      </div>
      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

            @foreach($slider as $item)
            <div class="item"
              style="background-image: url({{ asset($item -> slider_img) }})">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">Top Brands</div>
                  <div class="big-text fadeInDown-1">New Collections</div>
                  <div class="excerpt fadeInDown-2 hidden-xs">
                    <span
                      >Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit.</span
                    >
                  </div>
                  <div class="button-holder fadeInDown-3">
                    <a
                      href="index.php?page=single-product"
                      class="btn-lg btn btn-uppercase btn-primary shop-now-button"
                      >Shop Now</a
                    >
                  </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
            @endforeach


          </div>
          <!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items</h6>
                </div>
              </div>
              <!-- .col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.info-boxes-inner -->
        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div
          id="product-tabs-slider"
          class="scroll-tabs outer-top-vs wow fadeInUp"
        >
          <div class="more-info-tab clearfix">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul
              class="nav nav-tabs nav-tab-line pull-right"
              id="new-products-1"
            >
              <li class="active">
                <a
                  data-transition-type="backSlide"
                  href="#all"
                  data-toggle="tab"
                  >All</a
                >
              </li>
              @foreach($categories as $item)
              <li>
                <a
                  data-transition-type="backSlide"
                  href="#category{{ $item -> id }}"
                  data-toggle="tab"
                  >{{ $item -> category_name_eng }}</a
                >
              </li>
              @endforeach
              {{-- <li>
                <a
                  data-transition-type="backSlide"
                  href="#laptop"
                  data-toggle="tab"
                  >Electronics</a
                >
              </li>
              <li>
                <a
                  data-transition-type="backSlide"
                  href="#apple"
                  data-toggle="tab"
                  >Shoes</a
                >
              </li> --}}

            </ul>
            <!-- /.nav-tabs -->
          </div>

          <div class="tab-content outer-top-xs">

            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                  data-item="4">

                  @foreach($products as $item)

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="detail.html"
                              ><img
                                src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                                alt=""
                            /></a>
                          </div>
                          <!-- /.image -->
                          @php
                              $amount = $item -> selling_price - $item -> discount_price;
                              $discount = ($amount/$item -> selling_price) * 100;
                          @endphp

                          @if($item -> discount_price == NULL)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->

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

                          </div>
                          <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">

                              <li class="add-cart-button btn-group">
                                <button
                                  class="btn btn-primary icon"
                                  type="button"
                                  title="Add Cart"
                                  data-toggle="modal" 
                                  data-target="#exampleModal"
                                  id="{{ $item -> id }}"
                                  onclick="productView(this.id)"
                                ><i class="fa fa-shopping-cart"></i>
                                </button>
                                <button
                                  class="btn btn-primary cart-btn"
                                  type="button"
                                >
                                  Add to cart
                                </button>
                              </li>

                              
                                <button 
                                  type="button"
                                  class="btn btn-primary"
                                  title="Wishlist"
                                  id="{{ $item -> id }}"
                                  onclick="AddToWishlist(this.id)"
                                >
                                  <i class="fa fa-heart"></i>
                                </button>
                            

                              <li class="lnk">
                                <a
                                  data-toggle="tooltip"
                                  class="add-to-cart"
                                  href="detail.html"
                                  title="Compare"
                                >
                                  <i
                                    class="fa fa-signal"
                                    aria-hidden="true"
                                  ></i>
                                </a>
                              </li>

                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->

                  @endforeach

                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->


            {{-- Searching Product by category --}}
            @foreach($categories as $item)
            <div class="tab-pane" id="category{{ $item -> id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                  data-item="4">

                  @php
                      $catWiseProduct = App\Models\Product::where('category_id', $item -> id) -> orderBy('id', 'DESC') -> get();
                  @endphp

                  @forelse($catWiseProduct as $item)

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="detail.html"
                              ><img
                                src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                                alt=""
                            /></a>
                          </div>
                          <!-- /.image -->

                          @php
                              $amount = $item -> selling_price - $item -> discount_price;
                              $discount = ($amount/$item -> selling_price) * 100;
                          @endphp

                          @if($item -> discount_price == NULL)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->

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

                          </div>
                          <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button
                                  data-toggle="tooltip"
                                  class="btn btn-primary icon"
                                  type="button"
                                  title="Add Cart"
                                >
                                  <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button
                                  class="btn btn-primary cart-btn"
                                  type="button"
                                >
                                  Add to cart
                                </button>
                              </li>
                              <li class="lnk wishlist">
                                <a
                                  data-toggle="tooltip"
                                  class="add-to-cart"
                                  href="detail.html"
                                  title="Wishlist"
                                >
                                  <i class="icon fa fa-heart"></i>
                                </a>
                              </li>
                              <li class="lnk">
                                <a
                                  data-toggle="tooltip"
                                  class="add-to-cart"
                                  href="detail.html"
                                  title="Compare"
                                >
                                  <i
                                    class="fa fa-signal"
                                    aria-hidden="true"
                                  ></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->

                  @empty
                  <h5 class="text-danger">No Product Found</h5>

                  @endforelse

                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            @endforeach

          
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image">
                  <img
                    class="img-responsive"
                    src="assets/images/banners/home-banner1.jpg"
                    alt=""
                  />
                </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image">
                  <img
                    class="img-responsive"
                    src="assets/images/banners/home-banner2.jpg"
                    alt=""
                  />
                </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============= FEATURED PRODUCTS ============== -->


        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(Session() -> get('language') == 'hindi') {{ $skip_category_0 -> category_name_hin }}  @else {{ $skip_category_0 -> category_name_eng }} @endif
          </h3>
          <div
            class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs"
          >

          @foreach($skip_product_0 as $item)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image">
                    <a href="detail.html"
                      ><img
                        src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                        alt=""
                    /></a>
                  </div>
                  <!-- /.image -->

                  @php
                      $amount = $item -> selling_price - $item -> discount_price;
                      $discount = ($amount/$item -> selling_price) * 100;
                  @endphp

                  @if($item -> discount_price == NULL)
                  <div class="tag new"><span>new</span></div>
                  @else
                  <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                  @endif
                </div>
                <!-- /.product-image -->

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

                  </div>
                  <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button
                          data-toggle="tooltip"
                          class="btn btn-primary icon"
                          type="button"
                          title="Add Cart"
                        >
                          <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button
                          class="btn btn-primary cart-btn"
                          type="button"
                        >
                          Add to cart
                        </button>
                      </li>
                      <li class="lnk wishlist">
                        <a
                          data-toggle="tooltip"
                          class="add-to-cart"
                          href="detail.html"
                          title="Wishlist"
                        >
                          <i class="icon fa fa-heart"></i>
                        </a>
                      </li>
                      <li class="lnk">
                        <a
                          data-toggle="tooltip"
                          class="add-to-cart"
                          href="detail.html"
                          title="Compare"
                        >
                          <i
                            class="fa fa-signal"
                            aria-hidden="true"
                          ></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->
              </div>
              <!-- /.product -->
            </div>
            <!-- /.products -->
          </div>
          <!-- /.item -->
          @endforeach

          </div>
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->



        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(Session() -> get('language') == 'hindi') {{ $skip_category_1 -> category_name_hin }}  @else {{ $skip_category_1 -> category_name_eng }} @endif
          </h3>
          <div
            class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs"
          >

          @foreach($skip_product_1 as $item)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image">
                    <a href="detail.html"
                      ><img
                        src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                        alt=""
                    /></a>
                  </div>
                  <!-- /.image -->

                  @php
                      $amount = $item -> selling_price - $item -> discount_price;
                      $discount = ($amount/$item -> selling_price) * 100;
                  @endphp

                  @if($item -> discount_price == NULL)
                  <div class="tag new"><span>new</span></div>
                  @else
                  <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                  @endif
                </div>
                <!-- /.product-image -->

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

                  </div>
                  <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button
                          data-toggle="tooltip"
                          class="btn btn-primary icon"
                          type="button"
                          title="Add Cart"
                        >
                          <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button
                          class="btn btn-primary cart-btn"
                          type="button"
                        >
                          Add to cart
                        </button>
                      </li>
                      <li class="lnk wishlist">
                        <a
                          data-toggle="tooltip"
                          class="add-to-cart"
                          href="detail.html"
                          title="Wishlist"
                        >
                          <i class="icon fa fa-heart"></i>
                        </a>
                      </li>
                      <li class="lnk">
                        <a
                          data-toggle="tooltip"
                          class="add-to-cart"
                          href="detail.html"
                          title="Compare"
                        >
                          <i
                            class="fa fa-signal"
                            aria-hidden="true"
                          ></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->
              </div>
              <!-- /.product -->
            </div>
            <!-- /.products -->
          </div>
          <!-- /.item -->
          @endforeach

          </div>
          <!-- /.home-owl-carousel -->
        </section>



        <!-- ============================================== FEATURED PRODUCTS : END 
          ============================================== -->


        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image">
                  <img
                    class="img-responsive"
                    src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}"
                    alt=""
                  />
                </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">
                      New Mens Fashion<br />
                      <span class="shopping-needs">Save up to 40% off</span>
                    </h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->


        {{-- ================ Brands Product ================= --}}
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(Session() -> get('language') == 'hindi') {{ $skip_brand_1 -> brand_name_hin }}  @else {{ $skip_brand_1 -> brand_name_eng }} @endif
          </h3>
          <div
            class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs"
          >

          @foreach($skip_brand_product_1 as $item)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image">
                    <a href="detail.html"
                      ><img
                        src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}"
                        alt=""
                    /></a>
                  </div>
                  <!-- /.image -->

                  @php
                      $amount = $item -> selling_price - $item -> discount_price;
                      $discount = ($amount/$item -> selling_price) * 100;
                  @endphp

                  @if($item -> discount_price == NULL)
                  <div class="tag new"><span>new</span></div>
                  @else
                  <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                  @endif
                </div>
                <!-- /.product-image -->

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

                  </div>
                  <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button
                          data-toggle="tooltip"
                          class="btn btn-primary icon"
                          type="button"
                          title="Add Cart"
                        >
                          <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button
                          class="btn btn-primary cart-btn"
                          type="button"
                        >
                          Add to cart
                        </button>
                      </li>
                      <li class="lnk wishlist">
                        <a
                          data-toggle="tooltip"
                          class="add-to-cart"
                          href="detail.html"
                          title="Wishlist"
                        >
                          <i class="icon fa fa-heart"></i>
                        </a>
                      </li>
                      <li class="lnk">
                        <a
                          data-toggle="tooltip"
                          class="add-to-cart"
                          href="detail.html"
                          title="Compare"
                        >
                          <i
                            class="fa fa-signal"
                            aria-hidden="true"
                          ></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->
              </div>
              <!-- /.product -->
            </div>
            <!-- /.products -->
          </div>
          <!-- /.item -->
          @endforeach

          </div>
          <!-- /.home-owl-carousel -->
        </section>



        <!-- ============================================== BEST SELLER ============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div
              class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs"
            >
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p20.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p21.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p22.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p23.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p24.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p25.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p26.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                              <a href="#">
                                <img
                                  src="assets/images/products/p27.jpg"
                                  alt=""
                                />
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name">
                              <a href="#">Floral Print Buttoned</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                              <span class="price"> $450.99 </span>
                            </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== BEST SELLER : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">

              @foreach($blogPost as $post)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image">
                      <a href="{{ route('post.details', $post -> id) }}"
                        ><img
                          src="{{ asset($post -> post_image) }}"
                          alt=""
                      /></a>
                    </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name">
                      <a href="#"
                        > @if(Session() -> get('language') == 'hindi') {{ $post -> post_title_hin }} @else {{ $post -> post_title_eng }}@endif</a
                      >
                    </h3>
                    <span class="info"
                      >{{ Carbon\Carbon::parse($post -> created_at) -> diffForHumans() }}
                    </span>
                    <p class="text">
                      {!! Str::limit($post -> post_details_eng, 50) !!}
                    </p>
                    <a href="{{ route('post.details', $post -> id) }}" class="lnk btn btn-primary">Read more</a>
                  </div>
                  <!-- /.blog-post-info -->
                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->
            @endforeach
            </div>
            <!-- /.owl-carousel -->
          </div>
          <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div
            class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs"
          >
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"
                        ><img src="assets/images/products/p19.jpg" alt=""
                      /></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="detail.html">Floral Print Buttoned</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price"> $450.99 </span>
                      <span class="price-before-discount">$ 800</span>
                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button
                            class="btn btn-primary icon"
                            data-toggle="dropdown"
                            type="button"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                          <button
                            class="btn btn-primary cart-btn"
                            type="button"
                          >
                            Add to cart
                          </button>
                        </li>
                        <li class="lnk wishlist">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Wishlist"
                          >
                            <i class="icon fa fa-heart"></i>
                          </a>
                        </li>
                        <li class="lnk">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Compare"
                          >
                            <i class="fa fa-signal" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"
                        ><img src="assets/images/products/p28.jpg" alt=""
                      /></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="detail.html">Floral Print Buttoned</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price"> $450.99 </span>
                      <span class="price-before-discount">$ 800</span>
                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button
                            class="btn btn-primary icon"
                            data-toggle="dropdown"
                            type="button"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                          <button
                            class="btn btn-primary cart-btn"
                            type="button"
                          >
                            Add to cart
                          </button>
                        </li>
                        <li class="lnk wishlist">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Wishlist"
                          >
                            <i class="icon fa fa-heart"></i>
                          </a>
                        </li>
                        <li class="lnk">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Compare"
                          >
                            <i class="fa fa-signal" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"
                        ><img src="assets/images/products/p30.jpg" alt=""
                      /></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="detail.html">Floral Print Buttoned</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price"> $450.99 </span>
                      <span class="price-before-discount">$ 800</span>
                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button
                            class="btn btn-primary icon"
                            data-toggle="dropdown"
                            type="button"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                          <button
                            class="btn btn-primary cart-btn"
                            type="button"
                          >
                            Add to cart
                          </button>
                        </li>
                        <li class="lnk wishlist">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Wishlist"
                          >
                            <i class="icon fa fa-heart"></i>
                          </a>
                        </li>
                        <li class="lnk">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Compare"
                          >
                            <i class="fa fa-signal" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"
                        ><img src="assets/images/products/p1.jpg" alt=""
                      /></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="detail.html">Floral Print Buttoned</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price"> $450.99 </span>
                      <span class="price-before-discount">$ 800</span>
                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button
                            class="btn btn-primary icon"
                            data-toggle="dropdown"
                            type="button"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                          <button
                            class="btn btn-primary cart-btn"
                            type="button"
                          >
                            Add to cart
                          </button>
                        </li>
                        <li class="lnk wishlist">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Wishlist"
                          >
                            <i class="icon fa fa-heart"></i>
                          </a>
                        </li>
                        <li class="lnk">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Compare"
                          >
                            <i class="fa fa-signal" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"
                        ><img src="assets/images/products/p2.jpg" alt=""
                      /></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="detail.html">Floral Print Buttoned</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price"> $450.99 </span>
                      <span class="price-before-discount">$ 800</span>
                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button
                            class="btn btn-primary icon"
                            data-toggle="dropdown"
                            type="button"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                          <button
                            class="btn btn-primary cart-btn"
                            type="button"
                          >
                            Add to cart
                          </button>
                        </li>
                        <li class="lnk wishlist">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Wishlist"
                          >
                            <i class="icon fa fa-heart"></i>
                          </a>
                        </li>
                        <li class="lnk">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Compare"
                          >
                            <i class="fa fa-signal" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"
                        ><img src="assets/images/products/p3.jpg" alt=""
                      /></a>
                    </div>
                    <!-- /.image -->

                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name">
                      <a href="detail.html">Floral Print Buttoned</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      <span class="price"> $450.99 </span>
                      <span class="price-before-discount">$ 800</span>
                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button
                            class="btn btn-primary icon"
                            data-toggle="dropdown"
                            type="button"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                          <button
                            class="btn btn-primary cart-btn"
                            type="button"
                          >
                            Add to cart
                          </button>
                        </li>
                        <li class="lnk wishlist">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Wishlist"
                          >
                            <i class="icon fa fa-heart"></i>
                          </a>
                        </li>
                        <li class="lnk">
                          <a
                            class="add-to-cart"
                            href="detail.html"
                            title="Compare"
                          >
                            <i class="fa fa-signal" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->
          </div>
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div
          id="brand-slider"
          class="owl-carousel brand-slider custom-carousel owl-theme"
        >
          <div class="item m-t-15">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand1.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item m-t-10">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand2.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand3.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand4.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand5.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand6.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand2.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand4.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand1.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img
                data-echo="assets/images/brands/brand5.png"
                src="assets/images/blank.gif"
                alt=""
              />
            </a>
          </div>
          <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->
    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>


@endsection