(function($){
    $(document).ready(function(){

        // instand img show beside the input tag 
        $('#imgInputLoad').change(function(e){
            e.preventDefault();
    
            let file_url = URL.createObjectURL(e.target.files[0]);
            $('#imgShowLoad').attr('src', file_url);

        });



        // Add to cart modal manage
        $(document).on('click', '#cart_btn', function() {
            
            let id      = $('#update_id').val();
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
        });



    
    });
})(jQuery)