<?php include('partials-front/menu.php'); ?>

<style>
.buttondesign{
    padding: 8px 15px;
    font-size: 15px;
}
</style>


<section class="categories">
    <div class="section-title">
        <h2>MY ORDERS</h2>
        <p>Know Your Order History</p>
    </div>
    <div class="container">
    <div class="main-content">

        <?php
            if(isset($_SESSION['suc']))
            {
                echo $_SESSION['suc'];
                unset($_SESSION['suc']);
            }
            if(isset($_SESSION['fail']))
            {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            }
        ?>

        <table border="3px" bordercolor="#cda45e" width="100%" cellpadding="20px" cellspacing="15px" style="text-align: center;">

            <thead bgcolor="#cda45e" style="margin: 20px;">
            <tr>
                <th>S.N</th>
                <th>Product Name</th>
                <!-- <th>Product Image</th> -->
                <th>Price</th>
                <th>Qty</th>
                <th>Total Price</th>
                <th>Delivery Date</th>
                <th>Delivery Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

        <?php

            //Get all the orders from database
            $sql = "SELECT OF.title, OF.image_name, OF.price, OF.quantity, OF.total_price, OF.status, O.delivery_date, O.address FROM `orders` O INNER JOIN order_food OF ON o.id = OF.order_id";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);

            $sn = 1; // Serial number

            if($count>0)
            {
                //Order Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get all the order details
                    $title = $row['title'];
                    // $image_name = $row['image_name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $total_price = $row['total_price'];
                    $delivery_date = $row['delivery_date'];
                    $address = $row['address'];
                    $status = $row['status'];
                    
                    ?>
                    
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <!-- <td class="food-menu-img" ><img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"></td> -->
                        <td><?php echo $price; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $total_price; ?></td>
                        <td><?php echo $delivery_date ?></td>
                        <td><?php echo $address; ?></td>

                        <td>
                            <?php
                                if($status=="Ordered")
                                {
                                    echo "<label>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                    echo "<label style='color: orange; '>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                    echo "<label style='color: green; '>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                    echo "<label style='color: red; '>$status</label>";
                                }
                            ?>
                        </td>
                        <td>
                            <a class="buttondesign" href="feedback.php">Feedback</a>
                        </td>
                    </tr>

                    <?php
                }
            }
            else
            {   ?>
                    <tr style="text-align: center;">
                        <td colspan="9" class='error'>Order not Available</td>
                    </tr>
                <?php
            }
        ?>

        </table>
    </div>
    </div>

</section>


<?php include('partials-front/footer.php'); ?>

