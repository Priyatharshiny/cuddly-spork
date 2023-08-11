<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cart</title>
</head>
<body>
    <?php include('partials-front/menu.php'); ?>

    <section id="categories" class="categories">
        <div class="container">
            <div class="section-title">
            <h2>My Cart</h2>
            </div>

            <div class="main-content">
                <table border="3px" bordercolor="#cda45e" width="100%" cellpadding="20px" cellspacing="15px" style="text-align: center;">
                    <thead bgcolor="#cda45e" style="margin: 20px;">
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                        <?php

                            if(!empty($_SESSION['cart'])) {

                                foreach ($_SESSION['cart'] as $key => $value) { 
                                    $sr=$key+1;
                                ?>
                                    <tr>
                                        <td><?php echo $sr; ?></td>
                                        <td><?php echo $value['title']; ?></td>
                                        <td class="food-menu-img"><img src="<?php echo SITEURL; ?>images/food/<?php echo $value['image_name']; ?>"></td>
                                        <td><?php echo $value['price']; ?><input type="hidden" class="iprice" value="<?php echo $value['price']; ?>"></td>
                                        <td>
                                            <input type="number" class="iquantity" onchange="updateTotals()" name="quantity" value="<?php echo $value['quantity']; ?>" min="1" style="width: 40px;">
                                            <!-- <input type="number" class="iquantity" onchange="updateTotals()" name="quantity" id="quantity<?php echo $id ?>" value="<?php echo $value['quantity']; ?>" min="1" style="width: 40px;" disabled> -->
                                        
                                            <!-- <button class="buttondesign btnn" onclick="decrementValue(<?php echo $id ?>)">-</button>  
                                            <input type="number" name="quantity" id="quantity<?php echo $id ?>" value="1" min="1" style="width: 40px;" disabled>
                                            <button class="buttondesign btnn" onclick="incrementValue(<?php echo $id ?>)">+</button> -->
                                
                                        </td>
                                         
                                        <td class="itotal"></td>
                                        
                                        <td>
                                            <button class="buttondesign btnn remove" id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt pr-1" style="color: #ab0303;"></i></button>
                                        </td>
                                    </tr>

                                <?php }

                                ?>  
                                    <tr>
                                        <td colspan="4"></td>
                                        <td>Grand Total</td>
                                        <td id="gtotal"></td>
                                        <td>
                                            <button class="buttondesign btnn clearAll" id="<?php echo $value['id']; ?>">Clear All <i class='far fa-trash-alt pr-1' style="color: #ab0303;"></i></button>
                                        </td>
                                    </tr>
                                <?php 
                            }
                            else { ?>
                                <tr style="text-align: center;">
                                    <td colspan="7" class='error'>No Item Selected</td>
                                </tr>
                            <?php 
                            }
                        ?>
                </table>

                <br>
                <br>

                <?php if (!empty($_SESSION['cart'])) { ?>
                    <a href="deliveryDetails.php" class="buttondesign btnn" style="margin-left:900px;">Order Now</a>
                <?php } ?>

            </div>
        </div>

    </section>

    

    <script type="text/javascript">
        $(document).ready(function () {

            $(".remove").click(function(){
                var id = $(this).attr("id");

                var action = "remove";

                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {action:action, id:id},
                    success: function (data){
                        alertify.set('notifier','position', 'top-right');
                        alertify.success('Product removed from cart');
                        location.reload();
                        // alert("You have Remove item with ID"+id+"");
                    }
                }); 
            });

            $(".clearAll").click(function(){

                var action = "clear";

                $.ajax({
                    method: "POST",
                    url: "action.php",
                    data: {action:action},
                    success: function (data){
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(' All products removed from cart');
                        location.reload();
                    }
                }); 
            });

        });

       
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');
        // var gtotal=document.getElementsById('gtotal');
        

        function updateTotals()
        {
            // var gt = 0;
            for(i = 0; i < iprice.length; i++)
            {
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

                // gt += (iprice[i].value)*(iquantity[i].value);

              
            }
            // gtotal.innerText=gt;
        }

        updateTotals();


        // function incrementValue(id) {
        //     var input = document.getElementById('quantity' + id);
        //     input.stepUp();
        // }

        // function decrementValue(id) {
        //     var input = document.getElementById('quantity' + id);
        //     input.stepDown();
        // }

    </script>

</body>

<?php include('partials-front/footer.php'); ?>

</html>
