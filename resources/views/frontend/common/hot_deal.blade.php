<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div
      class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss"
    >

    @foreach($hotdeal as $item)
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image">
              <img src="{{ URL::to('') }}/media/admin/products/tham-nail/{{ $item -> product_thamnail }}" alt="" />
            </div>

            @php
            $amount = $item -> selling_price - $item -> discount_price;
            $discount = ($amount/$item -> selling_price) * 100;
            @endphp 

            @if($item -> discount_price !== NULL)
            <div class="sale-offer-tag">
              <span
                >{{ round($discount) }}%<br />
                off</span
              >
            </div>
            @endif

            <div class="timing-wrapper">
              <div class="box-wrapper">
                <div class="date box">
                  <span class="key">120</span>
                  <span class="value">DAYS</span>
                </div>
              </div>
              <div class="box-wrapper">
                <div class="hour box">
                  <span class="key">20</span>
                  <span class="value">HRS</span>
                </div>
              </div>
              <div class="box-wrapper">
                <div class="minutes box">
                  <span class="key">36</span>
                  <span class="value">MINS</span>
                </div>
              </div>
              <div class="box-wrapper hidden-md">
                <div class="seconds box">
                  <span class="key">60</span>
                  <span class="value">SEC</span>
                </div>
              </div>
            </div>
          </div>
          <!-- /.hot-deal-wrapper -->

          <div class="product-info text-left m-t-20">
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
          <!-- /.product-info -->

          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">
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
              </div>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
        </div>
      </div>
    @endforeach
    </div>
    <!-- /.sidebar-widget -->
  </div>