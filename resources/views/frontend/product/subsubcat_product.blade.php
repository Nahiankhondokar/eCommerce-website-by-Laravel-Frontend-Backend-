@extends('frontend.main_muster')

@section('content')

@section('title')
Sub-subcategory wise Product
@endsection



<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="#">Home</a></li>
          @foreach($subsubcat as $item)
          <li class=''><a href="">{{ $item -> category -> category_name_eng }}</a></li>
          <li class=''><a href="">{{ $item -> subcategory -> subcategory_name_eng }}</a></li>
          <li class='active'><a href="">{{ $item -> subsubcategory_name_eng }}</a></li>
          @endforeach
          {{-- <li class='active'>Handbags</li> --}}
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'> 
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.common.verticle_navigation')
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter"> 
              <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <h3 class="section-title">shop by</h3>
                <div class="widget-header">
                  <h4 class="widget-title">Category</h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">

                    @foreach($categories as $item)

                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapse{{ $item -> id }}" data-toggle="collapse" class="accordion-toggle collapsed"> {{ $item -> category_name_eng }} </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapse{{ $item -> id }}" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            @php
                                $subsubcategory = App\Models\SubCategory::where('category_id', $item -> id) -> orderBy('subcategory_name_eng', 'DESC') -> get();
                            @endphp
                            @foreach($subsubcategory as $item)
                            <li><a href="{{ url('subcategory/product/'.$item -> id.'/'.$item -> subcategory_slug_eng) }}">{{ $item -> subcategory_name_eng }}</a></li>
                            @endforeach
                          </ul>
                        </div>
                        <!-- /.accordion-inner --> 
                      </div>
                      <!-- /.accordion-body --> 
                    </div>
                    <!-- /.accordion-group -->
                
                    @endforeach
                    
                  </div>
                  <!-- /.accordion --> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
              
              <!-- ============================================== PRICE SILDER============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Price Slider</h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" class="price-slider" value="" >
                  </div>
                  <!-- /.price-range-holder --> 
                  <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== PRICE SILDER : END ============================================== --> 
              <!-- ============================================== MANUFACTURES============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Manufactures</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    <li><a href="#">Forever 18</a></li>
                    <li><a href="#">Nike</a></li>
                    <li><a href="#">Dolce & Gabbana</a></li>
                    <li><a href="#">Alluare</a></li>
                    <li><a href="#">Chanel</a></li>
                    <li><a href="#">Other Brand</a></li>
                  </ul>
                  <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== MANUFACTURES: END ============================================== --> 
              <!-- ============================================== COLOR============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Colors</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    <li><a href="#">Red</a></li>
                    <li><a href="#">Blue</a></li>
                    <li><a href="#">Yellow</a></li>
                    <li><a href="#">Pink</a></li>
                    <li><a href="#">Brown</a></li>
                    <li><a href="#">Teal</a></li>
                  </ul>
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== COLOR: END ============================================== --> 
              <!-- ============================================== COMPARE============================================== -->
              <div class="sidebar-widget wow fadeInUp outer-top-vs">
                <h3 class="section-title">Compare products</h3>
                <div class="sidebar-widget-body">
                  <div class="compare-report">
                    <p>You have no <span>item(s)</span> to compare</p>
                  </div>
                  <!-- /.compare-report --> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== COMPARE: END ============================================== --> 
              <!-- ============= PRODUCT TAGS ===================== -->

              @include('frontend.common.product_tags');

              <!-- ============= END PRODUCT TAGS ===================== -->
              <!-- /.sidebar-widget --> 
            <!----------- Testimonials------------->

                @include('frontend.common.testimonial');
              
              <!-- =============== Testimonials: END =============== -->
              
              <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
            </div>
            <!-- /.sidebar-filter --> 
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'> 
          <!-- ================ SECTION ??? HERO ==================== -->
          
          <div id="category" class="category-carousel hidden-xs">
            <div class="item">
              <div class="image"> <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
              <div class="container-fluid">
                <div class="caption vertical-top text-left">
                  <div class="big-text"> Big Sale </div>
                  <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                  <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
          </div>
          

          @foreach($subsubcat as $item)
          <span class="badge badge-info" style="background: #00457e">{{ $item -> category -> category_name_eng }}</span> <i class="fa fa-arrow-right" aria-hidden="true"></i>

          <span class="badge badge-info" style="background: #008a35">{{ $item -> subcategory -> subcategory_name_eng }}</span> <i class="fa fa-arrow-right" aria-hidden="true"></i>

          <span class="badge badge-primary" style="background: #99009e">{{ $item -> subsubcategory_name_eng }}</span>
          @endforeach
       
       
          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div>


          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">

                {{--============= Product Grad View Start ==========--}}

              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">

                    @foreach($subsubcat_product as $item)

                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="detail.html">
                                <img  src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}" alt=""></a> 
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
                                <span class="price"> ${{ $item -> selling_price }} </span>
                                <span class="price-before-discount">${{ $item -> discount_price }}</span>
                                @endif
                            </div>
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                  <!-- /.row --> 
                </div>
                <!-- /.category-product --> 
                
              </div>
              <!-- /.tab-pane -->
              
              {{--============= Product List View Start ==========--}}
              <div class="tab-pane "  id="list-container">
                <div class="category-product">

                @foreach($subsubcat_product as $item)

                  <div class="category-product-inner wow fadeInUp">
                    <div class="products">
                      <div class="product-list product">
                        <div class="row product-list-row">

                          <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                              <div class="image"> <img src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}" alt=""> </div>
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->

                          <div class="col col-sm-8 col-lg-8">
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
                              <div class="description m-t-10">
                                @if(Session() -> get('language') == 'hindi') {{ $item -> short_desc_hin }}  @else {{ $item -> short_desc_eng }} @endif
                              </div>
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                  </ul>
                                </div>
                                <!-- /.action --> 
                              </div>
                              <!-- /.cart --> 
                              
                            </div>
                            <!-- /.product-info --> 
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-list-row -->
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
                      <!-- /.product-list --> 
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.category-product-inner -->
                
                @endforeach
                  
                </div>
                <!-- /.category-product --> 
              </div>
              <!-- /.tab-pane #list-container --> 
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="pagination-container">


                  {{-- {{ $subcat_product -> links(); }} --}}



                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right --> 
              
            </div>
            <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
          <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item--> 
          </div>
          <!-- /.owl-carousel #logo-slider --> 
        </div>
        <!-- /.logo-slider-inner --> 
        
      </div>
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.body-content --> 


@endsection