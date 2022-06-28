<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">


        @foreach($categories as $item)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $item -> category_icon }}" aria-hidden="true"></i>
          @if(Session() -> get('language') == 'hindi') {{ $item -> category_name_hin }} @else {{ $item -> category_name_eng }} @endif  
        </a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">

              {{-- SubCategory show --}}
            @php
              $subcategories = App\Models\SubCategory::where('category_id', $item -> id) -> orderBy('subcategory_name_eng', 'ASC') -> get();
            @endphp

              @foreach($subcategories as $item)
                <div class="col-sm-12 col-md-3">
                  
                  <h2 class="title">
                    @if(Session() -> get('language') == 'hindi') {{ $item -> subcategory_name_hin }} @else {{ $item -> subcategory_name_eng }}@endif
                    </h2>

                     {{-- Sub-SubCategory show --}}
                    @php
                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $item -> id) -> orderBy('subsubcategory_name_eng', 'ASC') -> get();
                    @endphp
                  
                  @foreach ($subsubcategories as $item)
                  <ul class="links list-unstyled">
                    <li><a href="#"></a>
                      @if(Session() -> get('language') == 'hindi') {{ $item -> subsubcategory_name_hin }} @else {{ $item -> subsubcategory_name_eng }}@endif
                    </li>
                  
                  </ul>
                  @endforeach
                </div>
                @endforeach

              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        @endforeach
    

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-4">
                  <ul>
                    <li><a href="#">Gaming</a></li>
                    <li><a href="#">Laptop Skins</a></li>
                    <li><a href="#">Apple</a></li>
                    <li><a href="#">Dell</a></li>
                    <li><a href="#">Lenovo</a></li>
                    <li><a href="#">Microsoft</a></li>
                    <li><a href="#">Asus</a></li>
                    <li><a href="#">Adapters</a></li>
                    <li><a href="#">Batteries</a></li>
                    <li><a href="#">Cooling Pads</a></li>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-4">
                  <ul>
                    <li><a href="#">Routers &amp; Modems</a></li>
                    <li><a href="#">CPUs, Processors</a></li>
                    <li><a href="#">PC Gaming Store</a></li>
                    <li><a href="#">Graphics Cards</a></li>
                    <li><a href="#">Components</a></li>
                    <li><a href="#">Webcam</a></li>
                    <li><a href="#">Memory (RAM)</a></li>
                    <li><a href="#">Motherboards</a></li>
                    <li><a href="#">Keyboards</a></li>
                    <li><a href="#">Headphones</a></li>
                  </ul>
                </div>
                <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="frontend/assets/images/banners/banner-side.png" /></a> </div>
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>