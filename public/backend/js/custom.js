$(document).ready(function(){


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



    // Sub Category Show
    $(document).on('change', '#SubCategorySelect', function(){

      let cat_id = $(this).val();

      $.ajax({
        url : 'ajax/' + cat_id,
        success : function(data){

          $('#subcategory').empty();

            /**
             *  System 01 
             *  array data
             *  Array Map
             */
          //  data.map( (val) => {
          //   $('#subcategory')
          //   .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          //  });





            /**
             *  System 02 
             *  array data
             *  Array forof
             */
          for(val of data){
            $('#subcategory')
            .append('<option value="'+ val.id +'">'+ val.subcategory_name_eng + '</option>');
          }



          /**
           *  System 03 
           *  json data
           *  if you want to use this 03 system you have to add Type : "GET", or dataType : "json"
           *  This is foreach loop system in javaScript
           */
            
          // $.each(data, function(key, value){
          //   $('#subcategory')
          //   .append('<option value="'+ value.id +'">'+ value.subcategory_name_eng + '</option>');
          // });

          

        }
      });

    });







});