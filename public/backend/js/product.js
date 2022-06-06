(function($){
    $(document).ready(function(){


    // Select 2
    // $('.product_tag_select').select2();


    // ===================== Product Add Category Manage ==================

    /**
     *  Sub Category Show in Product Add Form.
     *  Product insert form.
     */
     $(document).on('change', '#CategorySelectProduct', function(){

      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'ajax/' + cat_id,
        success : function(data){
   
          $('#subcategoryShow').empty();

            /**
             *  System 01 
             *  array data
             *  Array Map
             */
          //  data.map( (val) => {
          //   $('#subcategoryShow')
          //   .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          //  });


            /**
             *  System 02 
             *  array data
             *  Array forOf
             */
          for(val of data){
            $('#subcategoryShow')
            .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          }



          /**
           *  System 03 
           *  json data
           *  if you want to use this 03 system you have to add Type : "GET", or dataType : "json"
           *  This is foreach loop system in javaScript
           *  Ariyan vai use this system
           */
            
          // $.each(data, function(key, value){
          //   $('#subcategoryShow')
          //   .append('<option value="'+ value.id +'">'+ value.subcategory_name_eng + '</option>');
          // });

          

        }
      });

    });



      /**
     *  Sub Category Show in product add form.
     *  product insert form.
     */
      $(document).on('change', '#productcat', function(){

      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'porduct/subcat/ajax/' + cat_id,
        success : function(data){
          $('#productsubcat').empty();
          $('#productsubsubcat').empty();

            /**
             *  System 02 
             *  array data
             *  Array forOf
             */
          for(val of data){
            $('#productsubcat')
            .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          }

        }
      });

    });


      /**
     *  Sub-subCategory Show in product add form.
     *  product insert form.
     */
    $(document).on('change', '#productsubcat', function(){

      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'porduct/subsubcat/ajax/' + cat_id,
        success : function(data){
          $('#productsubsubcat').empty();

            /**
             *  System 02 
             *  array data
             *  Array forOf
             */
          for(val of data){
            $('#productsubsubcat')
            .append('<option value="'+ val.id +'">'+ val.subsubcategory_name_eng + '</option>');
          }

        }
      });

    });
            


    /**
     *  Product Thambnai show beside the input tag
     *  Product Form
     */
    $('#productThambnail').change(function(e){
        $('#thambnail_selector').hide();
        $('#productThumbClose').css('display', 'block');
        let img_url = URL.createObjectURL(e.target.files[0]);
        $('#productThambShow').attr('src', img_url);

    });


    /**
     *  Product Thambnail change system
     */
    $(document).on('click', '#productThumbClose', function(){
        $('#thambnail_selector').show();
        $('#productThambShow').attr('src', '');
        $('#productThumbClose').css('display', 'none');
    });



    /**
     *  Product GAllery img setUp
     */ 
    $(document).on('change', '#productGallery', function(e){

      $('#gallery_selector').hide();
      $('#productGalleryClose').show();
      for( let i =0; i < e.target.files.length; i++){
          let gal_url = URL.createObjectURL(e.target.files[i]);
          $('#productGalleryShow').append(`<img style="width: 60px" src="${gal_url}" alt="">`);
      }

      $('#productGalleryShow').css('display', 'block');

    });


    /**
     *  Product Thambnail change system
     */
    $(document).on('click', '#productGalleryClose', function(){
        $('#gallery_selector').show();
        $('#productGalleryShow').css('display', 'none');
        $('#productGalleryClose').hide();
        $('#productGalleryShow img').hide();
    });
  


    

});
})(jQuery)
