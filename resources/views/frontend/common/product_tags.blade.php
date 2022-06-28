
@php
    $tag_eng = App\Models\Product::groupBy('product_tag_eng') -> select('product_tag_eng') -> get();
    $tag_hin = App\Models\Product::groupBy('product_tag_hin') -> select('product_tag_hin') -> get();
@endphp



        <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="tag-list">
                @if(Session() -> get('language') == 'hindi')
                    @foreach($tag_hin as $item)
                    <a class="item" href="{{ url('product/tag', $item -> product_tag_hin) }}">{{ str_replace(',', ' ', $item -> product_tag_hin) }}</a>
                    @endforeach
                @else
                    @foreach($tag_eng as $item)
                    <a class="item" href="{{ url('product/tag', $item -> product_tag_eng) }}">{{ str_replace(',', ' ', $item -> product_tag_eng) }}</a>
                    @endforeach
                @endif
                
              </div>
              <!-- /.tag-list -->
            </div>
            <!-- /.sidebar-widget-body -->
          </div>


