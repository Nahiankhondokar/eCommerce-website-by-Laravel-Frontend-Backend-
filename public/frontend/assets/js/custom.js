(function($){
    $(document).ready(function(){

        // instand img show beside the input tag 
        $('#imgInputLoad').change(function(e){
            e.preventDefault();
    
            let file_url = URL.createObjectURL(e.target.files[0]);
            $('#imgShowLoad').attr('src', file_url);

        });



        // ===================== Shipping Division, District Manage ==================
    $(document).on('change', '#DivisionSelect', function(){

        let division_id = $(this).val();
        $.ajax({
          url : '/shipping/division/ajax/' + division_id,
          success : function(data){
            
            $('select#LoadDistrick').empty();
            $('select#LoadState').empty();
            for (item of data) {
              $('select#LoadDistrick').append(`<option value="${ item.id }">${ item.district_name }</option>`);
            }
  
          }
        });
  
      });

// ===================== Shipping State Manage ==================
      $(document).on('change', '#LoadDistrick', function(){

        let district_id = $(this).val();
        $.ajax({
          url : '/shipping/district/ajax/' + district_id,
          success : function(data){
            
            $('select#LoadState').empty();
            for (item of data) {
              $('select#LoadState').append(`<option value="${ item.id }">${ item.state_name }</option>`);
            }
  
          }
        });
  
      });
        


    
    });
})(jQuery)