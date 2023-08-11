<?php include('partials/menuu.php');?>

<?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?><br><br>

<div class="main-content">
    <div class="wrapper">
        <h1>Order Details</h1><br><br>

        <?php
            //Check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the order details
                $id = $_GET['id'];

                //Get all the details based on id
                //SQL Query to get the order details
                // $sql = "SELECT * FROM tbl_order WHERE id=$id";
                $sql = "SELECT * FROM orders WHERE id=$id";
                // $sql = "SELECT OF.title, OF.image_name, OF.price, OF.quantity, OF.total_price, O.full_name, O.phone_no, O.delivery_date, O.address FROM `order` O INNER JOIN order_food OF ON O.id = OF.order_id WHERE O.id=$id";
            
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count the rows
                // $count = mysqli_num_rows($res);

                while($row = mysqli_fetch_assoc($res))
                {
                    //Details Available
                    // $title = $row['title'];
                    // $image_name = $row['image_name'];
                    // $price = $row['price'];
                    // $quantity = $row['quantity'];
                    // $total_price = $row['total_price'];
                    $full_name = $row['full_name'];
                    $phone_no = $row['phone_no'];
                    $delivery_date = $row['delivery_date'];
                    $address = $row['address'];
                }
            }
            else
            {
                //Redirect to manage order page
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>

        
            <p><b>Order ID:</b> <?php echo $id; ?></p>
            <br>
            <p><b>Customer Name:</b> <?php echo $full_name; ?></p>
            <br>
            <p><b>Phone Number:</b> <?php echo $phone_no; ?></p>
            <br>
            <p><b>Delivery Date:</b> <?php echo $delivery_date; ?></p>
            <br>
            <p><b>Delivery Address:</b> <?php echo $address; ?></p>
            <br><br>
           
            <table cellspacing="5px" class="tbl-50">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                        // $sql = "SELECT OF.title, OF.image_name, OF.price, OF.quantity, OF.total_price, OF.status, O.full_name, O.phone_no, O.delivery_date, O.address FROM `orders` O INNER JOIN order_food OF ON O.id = OF.order_id WHERE O.id=$id";
                        $sql = "SELECT * FROM order_food WHERE order_id=$id";
                                    
                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        // Count the rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; // Serial number
                        
                            while($row=mysqli_fetch_assoc($res))
                            {
                                
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $total_price = $row['total_price'];
                                $status = $row['status'];
                                // $full_name = $row['full_name'];
                                // $phone_no = $row['phone_no'];
                                // $delivery_date = $row['delivery_date'];
                                // $address = $row['address'];
                                    
                                ?>
                                    <tr>

                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td class="food-menu-img"><img src="../images/food/<?php echo $image_name; ?>" style="width: 120px; height:170px; "></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $total_price; ?></td>
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
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="buttondesign green">Update</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                    ?>
                </tbody>
            </table>
      
    </div>
</div>
