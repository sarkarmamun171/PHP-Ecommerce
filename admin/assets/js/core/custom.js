$(document).ready(function(){
    $("delete_product_btn").click(function(e){
       e.preventDefault();
       var id = $(this).val();
       alert(id);

       swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method:"POST",
                url:add_category_data.php,
                data:
                datatype:
                success:function(reponse){

                }
            });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    });
});