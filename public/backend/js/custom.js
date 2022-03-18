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








});