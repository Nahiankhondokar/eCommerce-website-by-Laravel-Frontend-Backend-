(function($){
    $(document).ready(function(){


    // Select 2
    // $('.product_tag_select').select2();


    // ===================== Product Add Category Manage ==================

    /**
     *  Different way to add subcategoy based on the category.
     *  
     */
    //  $(document).on('change', '#CategorySelectProduct', function(){

    //   let cat_id = $(this).val();
    //   // alert(cat_id);
    //   $.ajax({
    //     url : 'product/subcat/ajax/' + cat_id,
    //     success : function(data){

   
    //       $('#subcategoryShow').empty();

    //         /**
    //          *  System 01 
    //          *  array data
    //          *  Array Map
    //          */
    //       //  data.map( (val) => {
    //       //   $('#subcategoryShow')
    //       //   .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
    //       //  });


    //         /**
    //          *  System 02 
    //          *  array data
    //          *  Array forOf
    //          */
    //       for(val of data){
    //         $('#subcategoryShow')
    //         .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
    //       }



    //       /**
    //        *  System 03 
    //        *  json data
    //        *  if you want to use this 03 system you have to add Type : "GET", or dataType : "json"
    //        *  This is foreach loop system in javaScript
    //        *  Ariyan vai use this system
    //        */
            
    //       // $.each(data, function(key, value){
    //       //   $('#subcategoryShow')
    //       //   .append('<option value="'+ value.id +'">'+ value.subcategory_name_eng + '</option>');
    //       // });

          

    //     }
    //   });

    // });



    /**
     *  Category -> subcategory -> subsubcategory
     *  Sub Category Show in product add form.
     *  product insert form.
     */
    $(document).on('change', '.productcat', function(){

      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'product/subcat/ajax/' + cat_id,
        success : function(data){
          // alert(data);
          $('.productsubcat').empty();
          $('.productsubsubcat').empty();

            /**
             *  System 02 
             *  array data
             *  Array forOf
             */
          for(val of data){
            $('.productsubcat')
            .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          }

        }
      });

    });

  /**
   *  Global function for Category manage
   */
    // categoryManage();
    // function categoryManage(productsubcat, productsubsubcat){
    //   let cat_id = $(this).val();
    //   // alert(cat_id);
    //   $.ajax({
    //     url : 'product/subcat/ajax/' + cat_id,
    //     success : function(data){
    //       // alert(data);
    //       $(`.${productsubcat}`).empty();
    //       $(`.${productsubsubcat}`).empty();

    //         /**
    //          *  System 02 
    //          *  array data
    //          *  Array forOf
    //          */
    //       for(val of data){
    //         $(`.${productsubcat}`)
    //         .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
    //       }

    //     }
    //   });
    // }


      /**
     *  Sub-subCategory Show in product add form.
     *  product insert form.
     */
    $(document).on('change', '.productsubcat', function(){

      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'product/subsubcat/ajax/' + cat_id,
        success : function(data){
          $('.productsubsubcat').empty();

            /**
             *  System 02 
             *  array data
             *  Array forOf
             */
          for(val of data){
            $('.productsubsubcat')
            .append('<option value="'+ val.id +'">'+ val.subsubcategory_name_eng + '</option>');
          }

        }
      });

    });
            


    /**
     *  Product Thambnai show beside the input tag
     *  Product Form
     */
    $('.product_thambnail').change(function(e){

      // img type 
      let img_type = e.target.files[0].type;
      // img validaiton
      if(img_type == 'image/png' || img_type == 'image/jpeg' || img_type == 'image/jpg'){

        $('.thambnail_selector').hide();
        $('.productThumbClose').css('display', 'block');
        let img_url = URL.createObjectURL(e.target.files[0]);
        $('.productThambShow').attr('src', img_url);

      }else{
        swal('Only png/ jpeg/ jpg files are allow');
      }



    });


    /**
     *  Product Thambnail change system
     */
    $(document).on('click', '.productThumbClose', function(){
        $('.thambnail_selector').show();
        $('.productThambShow').attr('src', '');
        $('.productThumbClose').css('display', 'none');
    });



    /**
     *  Product GAllery img setUp
     */ 
    $(document).on('change', '.productGallery', function(e){


      for( let i =0; i < e.target.files.length; i++){
        // img type 
        let img_type = e.target.files[i].type;

        // img validation
        if(img_type == 'image/png' || img_type == 'image/jpeg' || img_type == 'image/jpg'){

          $('.gallery_selector').hide();
          $('.productGalleryClose').show();
          let gal_url = URL.createObjectURL(e.target.files[i]);
          $('.productGalleryShow').append(`<img style="width: 60px" src="${gal_url}" alt="">`);
            
        }else{
          swal('Only png/ jpeg/ jpg files are allow');
        }


        // console.log(img_type);

      }

      $('.productGalleryShow').css('display', 'block');

    });


    /**
     *  Product Gallery change system
     */
    $(document).on('click', '.productGalleryClose', function(){
        $('.gallery_selector').show();
        $('.productGalleryShow').css('display', 'none');
        $('.productGalleryClose').hide();
        $('.productGalleryShow img').hide();
    });
  

    /**
     *  Single Product View
     */
    $(document).on('click', '#product_view', function(e){
      e.preventDefault();

      // product id 
      let product_id = $(this).attr('view_id');

      $.ajax({
        url : 'view/' + product_id,
        success : function(data){

          $('#single_product_modal #Eng').text(data.product_name_eng);
          $('#single_product_modal #Category').text(data.category_id);
          $('#single_product_modal #Code').text(data.product_code);
          $('#single_product_modal #Quentity').text(data.product_qty);
          $('#single_product_modal #Tag').text(data.product_tag_eng);
          $('#single_product_modal #Size').text(data.product_size_eng);
          $('#single_product_modal #Color').text(data.product_color_eng);
          $('#single_product_modal #Selling').text(data.selling_price);
          $('#single_product_modal #Discount').text(data.discount_price);
          $('#single_product_modal img#Thambnail').attr('src', '/media/admin/products/thambnail/'+data.product_thamnail);

          $('#single_product_modal').modal('show');
        }
      });


            




    });




    // =============== Product Edit view category manage ===================
    /**
     *  Category -> subcategory -> subsubcategory
     *  Sub Category Show in product add form.
     *  product insert form.
     */
     $(document).on('change', '.productcatEdit', function(){

      $('#productsubcategoryItem select').removeAttr("style");
      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'subcat/ajax/' + cat_id,
        success : function(data){
          // alert(data);
          $('.productsubcatEdit').empty();
          $('.productsubsubcatEdit').empty();

            /**
             *  System 02 
             *  array data
             *  Array forOf
             */
          for(val of data){
            $('.productsubcatEdit')
            .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          }

        }
      });

    });



      /**
     *  Sub-subCategory Show in product add form.
     *  product insert form.
     */
      $(document).on('change', '.productsubcatEdit', function(){

        $('#productsubsubcategoryItem select').removeAttr("style");
        let cat_id = $(this).val();
        // alert(cat_id);
        $.ajax({
          url : 'subsubcat/ajax/' + cat_id,
          success : function(data){
            $('.productsubsubcatEdit').empty();
  
              /**
               *  System 02 
               *  array data
               *  Array forOf
               */
            for(val of data){
              $('.productsubsubcatEdit')
              .append('<option value="'+ val.id +'">'+ val.subsubcategory_name_eng + '</option>');
            }
  
          }
        });
  
      });



    // =============== Product Edit view images manage ===================

      
    /**
     *  Product Thambnai show beside the input tag
     *  Product Edit Form
     */
    $('.product_thambnail').change(function(e){

      // img type 
      let img_type = e.target.files[0].type;
      // img validaiton
      if(img_type == 'image/png' || img_type == 'image/jpeg' || img_type == 'image/jpg'){

        $('.thambnail_selector').hide();
        $('.productThumbClose').css('display', 'block');
        let img_url = URL.createObjectURL(e.target.files[0]);
        $('.productThambShow').attr('src', img_url);

      }else{
        swal('Only png/ jpeg/ jpg files are allow');
      }



    });


    /**
     *  Product Thambnail change system
     *  product Edit form
     */
    $(document).on('click', '.productThumbClose', function(){
        // $('.thambnail_selector').show();
        $('.productThambShow').attr('src', '');
        $('.thambnail_selector').css('display', 'block');
    });



    /**
     *  Product GAllery img setUp
     *  product edit form
     */ 
    $(document).on('change', '.productGalleryEdit', function(e){

      // gallery selector 
      $('.gallery_selectorEdit').css('display', 'none');
      $('.productGalleryCloseEdit').show();

      // for loop for getting single gallery image
      for(let i = 0; i < e.target.files.length; i++){

        // img type 
        let img_type = e.target.files[i].type;

        // img validation
        if(img_type == 'image/png' || img_type == 'image/jpeg' || img_type == 'image/jpg'){

          let gal_url = URL.createObjectURL(e.target.files[i]);
          $('.productGalleryShowEdit').append(`<img style="width: 60px" src="${gal_url}" alt="">`);
            
        }else{
          swal('Only png/ jpeg/ jpg files are allow');
        }

      }

      $('.productGalleryShowEdit').css('display', 'block');

    });


    /**
     *  Product Gallery change system
     */
    $(document).on('click', '.productGalleryCloseEdit', function(){
        $('.gallery_selectorEdit').css('display', 'block');
        $('.productGalleryShowEdit img').css('display', 'none');
        $('.productGalleryCloseEdit').hide();
        $('#product_previous_gallery').css('display', 'none');

    });
  
              

    

});
})(jQuery)


