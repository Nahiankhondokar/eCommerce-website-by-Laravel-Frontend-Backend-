
<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="#"><i class="icon fa fa-user"></i>              
              @if(Session() -> get('language') == 'hindi')
                मेरा खाता
              @else
                My Account
              @endif  
            </a></li>
              <li><a href="{{ route('wishlist-product') }}"><i class="icon fa fa-heart"></i>
              @if(Session() -> get('language') == 'hindi')
              इच्छा-सूची
              @else
              Wishlist
              @endif 
                </a></li>
              <li><a href="{{ route('cart-product') }}"><i class="icon fa fa-shopping-cart"></i>
              @if(Session() -> get('language') == 'hindi')
              मेरी गाड़ी
              @else
              My Cart
              @endif
              </a></li>
              <li><a href="#orderTracking" data-toggle="modal"><i class="icon fa fa-check"></i>
                @if(Session() -> get('language') == 'hindi')
                मेरी गाड़ी
                @else
                Order Tracking
                @endif
                </a>
              </li>
              <li><a href="{{ route('view.checkout') }}"><i class="icon fa fa-check"></i>
              @if(Session() -> get('language') == 'hindi')
              मेरी गाड़ी
              @else
              Checkout
              @endif
              </a></li>

              @auth
              <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>User Profile</a></li>
              @else
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
              @if(Session() -> get('language') == 'hindi')
                लॉग इन/रजिस्टर
                @else
                Login/Register
                @endif
              </a></li>
              @endauth
              

            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
              @if(Session() -> get('language') == 'hindi')
                भाषा
              @else
                Language
              @endif
              </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @if(Session() -> get('language') == 'hindi')
                  <li><a href="{{ route('language.english') }}">English</a></li>
                  @else
                  <li><a href="{{ route('language.hindi') }}">हिन्दी</a></li>
                  @endif
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->

            @php
                $setting = App\Models\SiteSetting::find(1);
            @endphp

            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting -> logo) }}" alt="logo" width="150"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form action="{{ route('product.search') }}" method="POST">
                @csrf 

                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        @foreach($categories as $item)
                        <li class="menu-header">
                          @if(Session() -> get('language') == 'hindi') {{ $item -> category_name_hin }} @else {{ $item -> category_name_eng }} @endif
                        </li>
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." name="search"/>
                  <button class="search-button" type="submit" ></button> 
                </div>
              </form>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            
            <!-- ============== SHOPPING CART DROPDOWN ======================== -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count">
                  <span class="count" id="cartQty"></span></div>
                <div class="total-price-basket"> 
                  <span class="lbl">cart -</span> 
                  <span class="total-price"> 
                    <span class="sign">$</span>
                    <span class="value" id="cartSubTotal"></span> 
                  </span> 
                </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>

                  <div id="miniCart">


                  </div>


                  <div class="clearfix cart-total">
                    <div class="pull-right"> 
                      <span class="text">Sub Total : $</span>
                      <span class='price' id="cartSubTotal"></span> 
                    </div>
                    <div class="clearfix"></div>
                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{ url('/') }} data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                  @if(Session() -> get('language') == 'hindi') घर @else Home @endif
                  </a> </li>

                  {{-- Category show --}}
                  @php
                    $categories = App\Models\Category::orderBy('category_name_eng', 'ASC') -> get();
                  @endphp

                  @foreach ($categories as $item)
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if(Session() -> get('language') == 'hindi') {{ $item -> category_name_hin }} @else {{ $item -> category_name_eng }} @endif
                    
                  </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">

                            {{-- SubCategory show --}}
                            @php
                              $subcategories = App\Models\SubCategory::where('category_id', $item -> id) -> orderBy('subcategory_name_eng', 'ASC') -> get();
                            @endphp

                            @foreach($subcategories as $item)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                              <a href="{{ url('subcategory/product/'.$item -> id.'/'.$item -> subcategory_slug_eng) }}">
                                <h2 class="title">
                                  @if(Session() -> get('language') == 'hindi') {{ $item -> subcategory_name_hin }} @else {{ $item -> subcategory_name_eng }}@endif
                                </h2>
                              </a>
                             

                                {{-- Sub-SubCategory show --}}
                              @php
                              $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $item -> id) -> orderBy('subsubcategory_name_eng', 'ASC') -> get();
                              @endphp

                              @foreach ($subsubcategories as $item)
                              <ul class="links">
                                <li><a href="{{ url('subsubcategory/product/'.$item -> id.'/'.$item -> subsubcategory_slug_eng) }}">
                                  @if(Session() -> get('language') == 'hindi') {{ $item -> subsubcategory_name_hin }} @else {{ $item -> subsubcategory_name_eng }}@endif
                                  </a></li>
                              </ul>
                              @endforeach

                            </div>
                            <!-- /.col -->
                            @endforeach
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="frontend/assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach

                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>

                  <li class="dropdown  navbar-right special-menu"> <a href="{{ route('home.blog') }}">Blog </a> </li>

                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
  </header>


  <!-- order Tacking Modal -->
<div class="modal fade" centerd id="orderTracking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Tracking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.tracking') }}" method="POST">
          @csrf
          <input class="form-control" type="text" name="invoice" placeholder="Invoice Number"><br>
          <button type="submit" class="btn btn-info">Track Now</button>
        </form>
      </div>
    </div>
  </div>
</div>


