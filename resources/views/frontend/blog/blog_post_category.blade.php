@extends('frontend.main_muster')

@section('content')

@section('title')
Blog Category Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">

                    @foreach($blogPost as $post)
					<div class="blog-post  wow fadeInUp">
                        <a href="blog-details.html"><img class="img-responsive" src="{{ asset($post -> post_image) }}" alt=""></a>
                        <h1><a href="blog-details.html">
                            @if(Session() -> get('language') == 'hindi') {{ $post -> post_title_hin }} @else {{ $post -> post_title_eng }}@endif
                        </a></h1>
                        <span class="author">John Doe</span>
                        <span class="review">6 Comments</span>
                        <span class="date-time">{{ Carbon\Carbon::parse($post -> created_at) -> diffForHumans() }}</span>
                        <p>{!! Str::limit($post -> post_details_eng, 50) !!}</p>

                        <a href="{{ route('post.details', $post -> id) }}" class="btn btn-upper btn-primary read-more">read more</a>

                    </div>

                    @endforeach


    <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                            
        <div class="text-right">
            <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>	
                    <li class="active"><a href="#">2</a></li>	
                    <li><a href="#">3</a></li>	
                    <li><a href="#">4</a></li>	
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul><!-- /.list-inline -->
            </div><!-- /.pagination-container -->    
        </div><!-- /.text-right -->

    </div><!-- /.filters-container -->				
</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>
				<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Blog Category</h3>
	<div class="sidebar-widget-body m-t-10">
		
        <ul class="list-group list-group-flush">
            @foreach($blogCategory as $cat)
            <a href="{{ url('home/blog/category/post', $cat -> id) }}" class="list-group-item">{{ $cat -> blog_categroy_name_eng }}</a>
            @endforeach
        </ul>
        

	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						
			<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">					
			<a class="item" title="Phone" href="category.html">Phone</a>
			<a class="item active" title="Vest" href="category.html">Vest</a>
			<a class="item" title="Smartphone" href="category.html">Smartphone</a>
			<a class="item" title="Furniture" href="category.html">Furniture</a>
			<a class="item" title="T-shirt" href="category.html">T-shirt</a>
			<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
			<a class="item" title="Sneaker" href="category.html">Sneaker</a>
			<a class="item" title="Toys" href="category.html">Toys</a>
			<a class="item" title="Rose" href="category.html">Rose</a>
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>

		<!-- ============= BRANDS CAROUSEL ======
            
            
            ===== BRANDS CAROUSEL : END =============== -->	
        
        </div>
</div>


@endsection