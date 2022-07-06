$(document).ready(function(){


  // Sweet alert for delete button
  $(document).on('click', '#delete', function(e){
    e.preventDefault();

    let link = $(this).attr('href');

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // alert(window.location.href);
          window.location.href = link;
          swla(
            'Delete !',
            'Your file has been Deleted',
            'success'
          );

      } else {
        swal("Your imaginary file is safe!");
      }
    });

  });
  
  
  


  // ===================== Tag or Category Manage ==================

    // image show beside the input tag
    $('#imgInput').change(function(e){

        let reader = new FileReader();
        reader.onload = function(e){
            $('#imgShow').attr('src', e.target.result);
        }

        reader.readAsDataURL(e.target.files['0']);

    });


    // image show beside the input tag for Brand
    $('#brandInput').change(function(e){

        let reader = new FileReader();
        reader.onload = function(e){
            $('#imgLoad').attr('src', e.target.result);
        }

        reader.readAsDataURL(e.target.files['0']);

    });


    /**
     *  Sub Category Show.
     *  Sub-subCategory insert form.
     */
    $(document).on('change', '#CategorySelect', function(){

      let cat_id = $(this).val();
      // alert(cat_id);
      $.ajax({
        url : 'ajax/' + cat_id,
        success : function(data){
          // alert(data);
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
     *  Sub Categroy Show in Sub-Subcategory Edit Page
     *  Sub-SubCategory Update form
     */
    $(document).on('change', '#CategorySelectUpdate', function(){

      let cat_id = $(this).val();
      let subsubCatId = $('#subsubcat').attr('idId');


      $.ajax({
        url : '/category/sub/sub/edit/ajax-update/'+ subsubCatId +'/' + cat_id,
        success : function(data){


          $('#subcategoryShowUpdate').empty();

            /**
             *  System 01 
             *  array data
             *  Array for of
             */
          for(val of data){
            $('#subcategoryShowUpdate')
            .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          }

        }
      });

    });



    // ===================== Shipping Division, District, State Manage ==================

    $(document).on('change', '#DivisionSelect', function(){

      let division_id = $(this).val();
      $.ajax({
        url : '/shipping/division/ajax/' + division_id,
        success : function(data){
          
          $('select#LoadDistrick').empty();
          for (item of data) {
            $('select#LoadDistrick').append(`<option value="${ item.id }">${ item.district_name }</option>`);
          }

        }
      });


    });



});