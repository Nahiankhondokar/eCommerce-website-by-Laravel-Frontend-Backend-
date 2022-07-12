<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  {{-- Toster css file --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	  
  
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->   

    @include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->

    @yield('content')

<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->

    @include('frontend.body.footer')

<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 




<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>


{{-- Sweet alert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Custom js file --}}
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

 {{-- Toster js file --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script>
   @if (Session::has('message'))

   let type = "{{ Session::get('alert-type', 'info') }}"

   switch(type){

     case 'info':
       toastr.info("{{ Session::get('message') }}");
       break;

     case 'success':
     toastr.success("{{ Session::get('message') }}");
     break;

     case 'warning':
       toastr.warning("{{ Session::get('message') }}");
       break;

     case 'error':
     toastr.error("{{ Session::get('message') }}");
     break;  


   }
     
   @endif
 </script>



<!-- Add to cart product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong id="pname"></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <img src="" alt="" style="width: 200px; height : 200px" id="pimage">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">Price : <strong id="pprice"></strong></li>
              <li class="list-group-item">Code : <strong id="pcode"></strong></li>
              <li class="list-group-item">Stock : <strong class="product_stock"></strong></li>
              <li class="list-group-item">Brand : <strong id="pbrand"></strong></li>
              <li class="list-group-item">Category : <strong id="pcategory"></strong></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="form-group" id="colorAreaHide">
              <label class="info-title control-label">Product Color <span>*</span></label>
              <select class="form-control" name="color" id="color">
                <option selected disabled>--Select Color--</option>
              </select>
            </div>

            <div class="form-group" id="sizeAreaHide">
              <label class="info-title control-label">Product Size <span>*</span></label>
              <select class="form-control" name="size" id="size">
                <option selected disabled>--Select Size--</option>
              </select>
            </div>

            <div class="form-group">
              <label>Quantity</label>
              <input type="number" class="form-control" id="qty" aria-describedby="emailHelp" min="1" value="1">
            </div>

            <input type="hidden" id="product_id">
            <button type="submit" id="modalbtn" class="btn btn-info" onclick="AddToCart()">Add to Cart</button>

          </div>
        </div>


      </div>
    </div>
  </div>
</div>


<script>
    $.ajaxSetup({
      headers : {
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  });


  // product add to cart modal
  function productView(id){
    $.ajax({
      type : 'GET',
      url : '/product/view/modal/' + id,
      dataType : 'json',
      success : function(data) {
        // alert(data);
        $('#pname').text(data.product.product_name_eng);
        $('#pcode').text(data.product.product_code);
        $('#pcategory').text(data.product.category.category_name_eng);
        $('#pbrand').text(data.product.brand.brand_name_eng);
        $('#product_id').val(id);
        $('#pimage').attr('src', '/media/admin/products/tham-nail/'+data.product.product_thamnail);

        // product price show
        if(data.product.discount_price == null){
          $('#pprice').text(data.product.selling_price);
        }else{
          $('#pprice').text(data.product.discount_price);
        }

        // product color  
        $('select[name="color"]').empty();
        $.each(data.colors, function(key, value){
          $('select[name="color"]').append('<option value="'+ value +'">'+ value.toUpperCase() +'</option>');

          if(data.colors == ''){
            $('#colorAreaHide').hide();
          }
        });

        // product size 
        $('select[name="size"]').empty();
        $.each(data.sizes, function(key, value){
          $('select[name="size"]').append('<option value="'+ value +'">'+ value.toUpperCase() +'</option>');

          if(data.sizes == ''){
            $('#sizeAreaHide').hide();
          }

        });


        // product stock
        if(data.product.product_qty > 0){
          $('.product_stock').text('In Stock');
          $('.product_stock').css('color', 'green');
        }else{
          $('.product_stock').text('Out Stock');
          $('.product_stock').css('color', 'red');
        }


        // submit button disabled
        if(data.product.product_qty == 0){
          $('button#modalbtn').css('pointer-events', 'none');
        }else{
          $('button#modalbtn').css('pointer-events', '')
        }

      } 
    });
  }
  

  // Add to cart modal manage
  function AddToCart(){

      let id      = $('#product_id').val();
      let name    = $('#pname').text();
      let color   = $('#color option:selected').text();
      let size    = $('#size option:selected').text();
      let qty     = $('#qty').val();

      $.ajax({
          url: '/cart/data/store/' + id,
          type : 'POST',
          dataType : 'json',
          data : {
              name : name , color : color, size : size, qty : qty
          },
          success : function(data){

            MiniCart();
              $('#closeModal').click();

              // Add to cart message 
              const Toster = Swal.mixin({
                  toster : true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
                })

              if($.isEmptyObject(data.error)){
                  Toster.fire({
                      type : 'success',
                      title : data.success
                  });
              }else{
                  Toster.fire({
                      type : 'error',
                      title : data.error
                  });
              }

          }
      });
  }

</script>


<script>

  // mini cart
function MiniCart(){
  $.ajax({
    url : '/product/mini/cart/',
    type : 'GET', 
    dataType : 'json', 
    success : function(data){
      
      $('span[id="cartQty"]').text(data.cart_qty);
      $('span[id="cartSubTotal"]').text(data.cart_total);

      let miniCart = '';
      $.each(data.carts, function(index, value){
        miniCart += `
                  <div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="image"> <a href="detail.html"><img src="/media/admin/products/tham-nail/${value.options.image}" alt=""></a> </div>
                      </div>
                      <div class="col-xs-7">
                        <h3 class="name"><a href="#">${value.name}</a></h3>
                        <div class="price">$ ${value.price} * ${value.qty}</div>
                      </div>
                      <div class="col-xs-1 action"> 
                        <button type="submit" onclick="miniCartRemove(this.id)" id="${value.rowId}"><i class="fa fa-trash"></i></button> 
                      </div>
                    </div>
                  </div>
                  <!-- /.cart-item -->
                  <div class="clearfix"></div>
                  <hr>`;
      });


      $('#miniCart').html(miniCart);

    }
  });
}
MiniCart();


// Remove product from minicart
function miniCartRemove(rowId){
  $.ajax({
    url : '/minicart/product-remove/' + rowId,
    type : 'GET', 
    success : function (data){
      MiniCart();

      const Toster = Swal.mixin({
        toster : true,
        position: 'top-end',
        icon: 'success',
        showConfirmButton: false,
        timer: 3000
      });

      if($.isEmptyObject(data.error)){
        Toster.fire({
          type : 'success',
          title : data.success
        });
      }else{
        Toster.fire({
          type : 'error',
          title : data.error
        });
      }

    }
  });
}

</script>


<script>

  // Add Wishlist product Manage
  function AddToWishlist(product_id){
    $.ajax({
      url : '/add-to-wishlist/' + product_id, 
      type : 'POST', 
      dataType : 'json', 
      success : function(data){
        
        const Toster = Swal.mixin({
          toster : true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        if($.isEmptyObject(data.error)){
          Toster.fire({
            type : 'success', 
            icon: 'success',
            title : data.success
          });
        }else{
          Toster.fire({
            type : 'error', 
            icon: 'error',
            title : data.error
          });
        }

      }
    });
  }
</script>


<script>
  // show wishlist product
  function Wishlist(){
    $.ajax({
      url : '/user/wishlist-product-show',
      type : 'GET', 
      dataType : 'json', 
      success : function(data){

        let body = '';
        $.each(data, function(index, value){
          body += `
          <tr>
            <td class="col-md-2"><img src="/media/admin/products/tham-nail/${value.product.product_thamnail}" alt="imga"></td>
            <td class="col-md-7">
                <div class="product-name"><a href="#">${value.product.product_name_eng}</a></div>
                <div class="rating">
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star non-rate"></i>
                    <span class="review">( 06 Reviews )</span>
                </div>
                <div class="price">
                    ${value.product.discount_price == null 
                    ? `<span>$ ${value.product.selling_price}</span>`
                    : `$ ${value.product.discount_price}
                    <span>$ ${value.product.selling_price}</span>`
                    }
                    
                </div>
            </td>
            <td class="col-md-2">
              <button
                class="btn btn-primary icon"
                type="button"
                title="Add Cart"
                data-toggle="modal" 
                data-target="#exampleModal"
                id="${value.product_id}"
                onclick="productView(this.id)"
              ><i class="fa fa-shopping-cart"></i> Add To Cart

              </button>
            </td>
            <td class="col-md-1 close-btn">
                <button type="submit" id="${value.id}" onclick="RemoveWishlist(this.id)" class=""><i class="fa fa-times"></i></button>
            </td>
          </tr>`;
        });


        $('#wishlist').html(body);

      }
    });
  }
  Wishlist();



  // Remove product from Wishlist
  function RemoveWishlist(id){
    $.ajax({
      url : '/user/wishlist/product-remove/' + id,
      type : 'GET', 
      success : function (data){
        Wishlist();

        const Toster = Swal.mixin({
          toster : true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        });

        if($.isEmptyObject(data.error)){
          Toster.fire({
            type : 'success',
            title : data.success
          });
        }else{
          Toster.fire({
            type : 'error',
            title : data.error
          });
        }

      }
    });
  }
</script>



<script>

  // show MyCart product
  function MyCart(){
    $.ajax({
      url : '/user/cart-product-show',
      type : 'GET', 
      dataType : 'json', 
      success : function(data){

        let body = '';
        $.each(data.carts, function(index, value){
          body += `
          <tr>
            <td class="col-md-2"><img src="/media/admin/products/tham-nail/${value.options.image}" alt="imga"></td>
            <td class="col-md-2">
                <div class="product-name"><a href="#">${value.name}</a></div>
                <div class="rating">
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star rate"></i>
                    <i class="fa fa-star non-rate"></i>
                    <span class="review">( 06 Reviews )</span>
                </div>
                <div class="price">
                  $ ${value.price}
                </div>
            </td>
            <td class="col-md-2">
              ${value.options.color == null 
              ? `<span class="badge badge-danger ">No Color</span>`
              : `<strong>${value.options.color}</strong>`
              }
            </td>
            <td class="col-md-2">
              ${value.options.size == null 
              ? `<span class="badge badge-danger">No Size</span>`
              : `<strong>${value.options.size}</strong>`
              }
            </td>
            <td class="col-md-2">
              ${value.qty > 1
                ? 
                `<button class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartProductDecrement(this.id)">-</button>`
                :
                `<button class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartProductDecrement(this.id)" disabled>-</button>`
              }
              <input type="text" min="1" max="100" style="width : 25px;" value="${value.qty}">
              <button class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartProductIncrement(this.id)">+</button>
            </td>
            <td class="col-md-2">
              <strong>$ ${value.subtotal}</stro>
            </td>
            <td class="col-md-1 close-btn">
                <button type="submit" id="${value.rowId}" onclick="RemoveMyCart(this.id)" class=""><i class="fa fa-times"></i></button>
            </td>
          </tr>`;
        });


        $('#cartPage').html(body);

      }
    });
  }
  MyCart();



  // Remove product from My Cart
  function RemoveMyCart(rowId){
    $.ajax({
      url : '/user/cart/product-remove/' + rowId,
      type : 'GET', 
      success : function (data){
        MyCart();
        MiniCart();
        CouponCalculation();
        
        // couple feild show validaiton
        if(data.emptyCart == 'done'){
          $('#couponFeild').show();
          $('#coupon_name').val('');
        }

        // toster show
        const Toster = Swal.mixin({
          toster : true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        });

        if($.isEmptyObject(data.error)){
          Toster.fire({
            type : 'success',
            title : data.success
          });
        }else{
          Toster.fire({
            type : 'error',
            title : data.error
          });
        }

      }
    });
  }
</script>


<script>

    // Cart product Increment
    function cartProductIncrement(rowId){
      $.ajax({
        url : '/cart-product-increment/' + rowId, 
        type : 'POST',
        data : 'json', 
        success : function(data){
          CouponCalculation();
          MyCart();
          MiniCart();
          

        }

      });
    }

    // Cart product decrement
    function cartProductDecrement(rowId){
      $.ajax({
        url : '/cart-product-decrement/' + rowId, 
        type : 'POST',
        data : 'json', 
        success : function(data){
          CouponCalculation();
          MyCart();
          MiniCart();
          

        }

      });
    }
</script>



<script>

  // Coupone Apply
  function CouponApply(){

    // coupone name
    let coupon_name = $('#coupon_name').val();

    $.ajax({
      url : '/coupon-apply',
      type : 'POST',
      dataType : 'json', 
      data : { coupon_name },
      success : function(data){
        CouponCalculation();
        $('#couponFeild').hide();
        
        const Toster = Swal.mixin({
          toster : true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        if($.isEmptyObject(data.error)){
          Toster.fire({
            type : 'success', 
            icon: 'success',
            title : data.success
          });
        }else{
          Toster.fire({
            type : 'error', 
            icon: 'error',
            title : data.error
          });
        }

      }

    });
  }

  // Coupon Calculation
  function CouponCalculation(){
    $.ajax({
      url : '/coupon-calculation',
      success : function(data){
        if(data.total){
          $('#couponAmount').html(`
                  <tr>
                      <th>
                          <div class="cart-sub-total" style="display: flex; justify-content: space-between;">
                              Subtotal<span class="inner-left-md">$ ${ data.total }</span>
                          </div>
                          <div class="cart-grand-total" style="display: flex; justify-content: space-between;">
                              Grand Total<span class="inner-left-md">$ ${ data.total }</span>
                          </div>
                      </th>
                  </tr>`)
        }else{
          $('#couponAmount').html(`
                <tr>
                    <th>
                      <button type="submit" title="coupon delete" onclick="CouponRemove()">&times;</button>
                      <div class="cart-sub-total" style="display: flex; justify-content: space-between;">
                            Coupon<span class="inner-left-md">$ ${ data.coupon_name }</span>
                            
                        </div>
                        <div class="cart-sub-total" style="display: flex; justify-content: space-between;">
                            Discount<span class="inner-left-md">${ data.coupon_discount } %</span>
                        </div>
                        <div class="cart-sub-total" style="display: flex; justify-content: space-between;">
                            Subtotal<span class="inner-left-md">$ ${ data.subtotal }</span>
                        </div>
                        <div class="cart-grand-total" style="display: flex; justify-content: space-between;">
                          Discount Amount<span class="inner-left-md">$ ${ data.discount_amount }</span>
                        </div>
                        <div class="cart-grand-total" style="display: flex; justify-content: space-between;">
                            Grand Total<span class="inner-left-md text-success">$ ${ data.total_amount }</span>
                        </div>
                    </th>
                </tr>`)
        }
      }
    });
  }
  CouponCalculation();


  // Coupon Remove
  function CouponRemove(){
    $.ajax({
      url : '/coupon-remove', 
      success : function(data){
        CouponCalculation();
        $('#couponFeild').show();
        $('#coupon_name').val('');

        // Sweet alert
        const Toster = Swal.mixin({
          toster : true,
          position : 'top-end',
          showConfirmButton : false,
          timer : 3000
        });

        if($.isEmptyObject(data.error)){
          Toster.fire({
            type : 'success', 
            icon : 'success',
            title : data.success
          });
          
        }else{
          Toster.fire({
            type : 'error', 
            icon : 'error',
            title : data.error
          });
        }

      }
    });
  }

</script>

</body>
</html>