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


    // Toster
    if (Session::has('message')){

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
      
}


    // Sweet alert
    //   $(document).on('click', '#del_btn', function(e){
    //       e.preventDefault();

    //       let id = $(this).attr('update_id');


    //       swal({
    //         title: "Are you sure?",
    //         text: "Once deleted, you will not be able to recover this imaginary file!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //       })
    //       .then((willDelete) => {
    //         if (willDelete) {
              
    //             $.ajax({
    //                 url : 'delete/' + id,
    //                 success : function(data){
    //                     route('all.brand');
    //                 }
    //             });

    //         } else {
    //           swal("Your imaginary file is safe!");
    //         }
    //       });

    //   });





});