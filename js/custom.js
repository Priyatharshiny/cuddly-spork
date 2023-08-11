$(document).ready(function () {


        $(document).on("click",".addToCartBtn", function(){
            var id = $(this).attr("id");
            var title = $("#title"+id+"").val();
            var image_name = $("#image_name"+id+"").val();
            var price = $("#price"+id+"").val();
            var quantity = $("#quantity"+id+"").val();
            
            $.ajax({
                method:"POST",
                url: "add_to_cart.php",
                data: {
                    id:id, title:title, image_name:image_name, price:price, quantity:quantity
                },
                success: function (data){
                    if (data === "already_in_cart") {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error('Product is already in the cart');
                    } else if (data === "added_to_cart") {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('Product added to cart');
                    }

                    // alertify.set('notifier','position', 'top-right');
                    // alertify.success('Product added to cart');
                }
            }); 
        });

});