(function($){
    $(document).ready(function(){

        // instand img show beside the input tag 
        $('#imgInputLoad').change(function(e){
            e.preventDefault();
    
            let file_url = URL.createObjectURL(e.target.files[0]);
            $('#imgShowLoad').attr('src', file_url);

         
    
        });






    
    });
})(jQuery)