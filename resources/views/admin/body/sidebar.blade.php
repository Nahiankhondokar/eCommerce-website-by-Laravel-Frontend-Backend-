 @php
   $prefix = Request::route() -> getPrefix();
   $route = Route::current() -> getName();
 @endphp
 
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  

        @php
            $brand      = (auth() -> guard('admin') -> user() -> brand == 1);
            $category   = (auth() -> guard('admin') -> user() -> category  == 1);
            $product    = (auth() -> guard('admin') -> user() -> product  == 1);
            $blog    = (auth() -> guard('admin') -> user() -> blog == 1);
            $slider     = (auth() -> guard('admin') -> user() -> slider == 1);
            $coupone    = (auth() -> guard('admin') -> user() -> coupone == 1);
            $shipping   = (auth() -> guard('admin') -> user() -> shipping == 1);
            $sitesetting = (auth() -> guard('admin') -> user() -> sitesetting == 1);
            $returnorder = (auth() -> guard('admin') -> user() -> returnorder == 1);
            $review     = (auth() -> guard('admin') -> user() -> review == 1);
            $stock      = (auth() -> guard('admin') -> user() -> stock == 1);
            $orders     = (auth() -> guard('admin') -> user() -> orders == 1);
            $reports    = (auth() -> guard('admin') -> user() -> reports == 1);
            $users      = (auth() -> guard('admin') -> user() -> users == 1);
            $adminuserrole = (auth() -> guard('admin') -> user() -> adminuserrole == 1);
        @endphp

        <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
          <a href="{{ url('/admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
          </a>
        </li>  
		  
      @if($brand)
      <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Brands</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.brand') ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
          <li><a href="calendar.html"><i class="ti-more"></i></a></li>
        </ul>
      </li> 
      @endif
		    
      @if($category)
      <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="mail"></i> <span>Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.category') ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
          <li class="{{ ($route == 'all.subcategory') ? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
          <li class="{{ ($route == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub -> SubCategory</a></li>
        </ul>
      </li>
      @endif

      @if($product)
      <li class="treeview {{ ($prefix == '/product') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="mail"></i> <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.product') ? 'active' : '' }}"><a href="{{ route('all.product') }}"><i class="ti-more"></i>Add Product</a></li>

          <li class="{{ ($route == 'manage.product') ? 'active' : '' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Product</a></li>
        </ul>
      </li>
      @endif

      @if($slider)
      <li class="treeview {{ ($prefix == '/') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="mail"></i> <span>Slider</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'slider.view') ? 'active' : '' }}"><a href="{{ route('slider.view') }}"><i class="ti-more"></i>Manage Slider</a></li>
        </ul>
      </li>
      @endif

      @if($coupone)
      <li class="treeview {{ ($prefix == '/coupone') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Coupones</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == '/manage-coupone') ? 'active' : '' }}"><a href="{{ route('manage-coupone') }}"><i class="ti-more"></i>Manage Coupone</a></li>
        </ul>
      </li> 
      @endif

      @if($shipping)
      <li class="treeview {{ ($prefix == '/shipping') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Shipping Area</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'manage-division') ? 'active' : '' }}">
            <a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a>
          </li>
          <li class="{{ ($route == 'manage-district') ? 'active' : '' }}">
            <a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a>
          </li>
          <li class="{{ ($route == 'manage-state') ? 'active' : '' }}">
            <a href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a>
          </li>
        </ul>
      </li> 
      @endif

      @if($blog)
      <li class="treeview {{ ($prefix == '/blog') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Blog Manage</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'blog.category.view') ? 'active' : '' }}">
            <a href="{{ route('blog.category.view') }}"><i class="ti-more"></i>Blog Category</a>
          </li>

          <li class="{{ ($route == 'post.add') ? 'active' : '' }}">
            <a href="{{ route('post.add') }}"><i class="ti-more"></i>Add Blog Post</a>
          </li>

          <li class="{{ ($route == 'post.list') ? 'active' : '' }}">
            <a href="{{ route('post.list') }}"><i class="ti-more"></i>List Blog Post</a>
          </li>
        </ul>
      </li> 
      @endif

      @if($sitesetting)
      <li class="treeview {{ ($prefix == '/siteSetting') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Setting Manage</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'site.setting') ? 'active' : '' }}">
            <a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a>
          </li>

          <li class="{{ ($route == 'seo.setting') ? 'active' : '' }}">
            <a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a>
          </li>

        
        </ul>
      </li> 
      @endif

      @if($returnorder)
        <li class="treeview {{ ($prefix == '/return') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Return Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'return.request') ? 'active' : '' }}">
              <a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a>
            </li>
            <li class="{{ ($route == 'all.approve.request') ? 'active' : '' }}">
              <a href="{{ route('all.approve.request') }}"><i class="ti-more"></i>All Approve Request</a>
            </li>
          </ul>
        </li> 
      @endif
		
      @if($review)
      <li class="treeview {{ ($prefix == '/review') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Review Manage</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'pendding.review') ? 'active' : '' }}">
            <a href="{{ route('pendding.review') }}"><i class="ti-more"></i>Pendding Review</a>
          </li>
          <li class="{{ ($route == 'all.approve.review') ? 'active' : '' }}">
            <a href="{{ route('all.approve.review') }}"><i class="ti-more"></i>All Approve Review</a>
          </li>
        </ul>
      </li> 
      @endif

      @if($stock)
      <li class="treeview {{ ($prefix == '/stock') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Stock</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'product.stock') ? 'active' : '' }}">
            <a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a>
          </li>
        </ul>
      </li> 
      @endif

      <li class="header nav-small-cap">User Interface</li>

      @if($orders)
      <li class="treeview {{ ($prefix == '/orders') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'pendding-order') ? 'active' : '' }}">
            <a href="{{ route('pendding-order') }}"><i class="ti-more"></i>Pendding Order</a>
          </li>

          <li class="{{ ($route == 'confirmed-order') ? 'active' : '' }}">
            <a href="{{ route('confirmed-order') }}"><i class="ti-more"></i>Confirmed Order</a>
          </li>

          <li class="{{ ($route == 'processing-order') ? 'active' : '' }}">
            <a href="{{ route('processing-order') }}"><i class="ti-more"></i>Processing Order</a>
          </li>

          <li class="{{ ($route == 'picked-order') ? 'active' : '' }}">
            <a href="{{ route('picked-order') }}"><i class="ti-more"></i>Picked Order</a>
          </li>

          <li class="{{ ($route == 'shipped-order') ? 'active' : '' }}">
            <a href="{{ route('shipped-order') }}"><i class="ti-more"></i>Shipped Order</a>
          </li>
          
          <li class="{{ ($route == 'delivered-order') ? 'active' : '' }}">
            <a href="{{ route('delivered-order') }}"><i class="ti-more"></i>Delivered Order</a>
          </li>

          <li class="{{ ($route == 'canceled-order') ? 'active' : '' }}">
            <a href="{{ route('canceled-order') }}"><i class="ti-more"></i>Canceled Order</a>
          </li>

        </ul>
      </li> 
      @endif

      @if($reports)
      <li class="treeview {{ ($prefix == '/reports') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>All Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all-reports') ? 'active' : '' }}">
            <a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a>
          </li>

        </ul>
      </li> 
      @endif

      @if($users)
      <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all-user') ? 'active' : '' }}">
            <a href="{{ route('all-user') }}"><i class="ti-more"></i>All Users</a>
          </li>
        </ul>
      </li> 
      @endif

      @if($adminuserrole)
      <li class="treeview {{ ($prefix == '/adminuserrole') ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Admin User Role</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all-admin-user') ? 'active' : '' }}">
            <a href="{{ route('all-admin-user') }}"><i class="ti-more"></i>All Admin User</a>
          </li>
        </ul>
      </li> 
      @endif



		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>  
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>