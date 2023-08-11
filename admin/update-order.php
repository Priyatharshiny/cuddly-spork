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
        <h1>Update Order</h1><br><br>

        <?php
            //Check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the order details
                $id = $_GET['id'];

                //Get all the details based on id
                //SQL Query to get the order details
                // $sql = "SELECT * FROM tbl_order WHERE id=$id";
                $sql = "SELECT * FROM `order_food` WHERE order_id=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count the rows
                $count = mysqli_num_rows($res);

                if($count>=1)
                {
                    //Details Available
                    $row = mysqli_fetch_assoc($res);

                    $title = $row['title'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $total_price = $row['total_price'];
                    $status = $row['status'];
                }
                else
                {
                    //Detail not available
                    //Redirect to manage order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //Redirect to manage order page
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>

        <form action="" method="POST">
            <table cellspacing="5px" class="tbl-50">
                <tr>
                    <td>Product Name</td>
                    <td><?php echo $title; ?></td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td><?php echo $price; ?></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td><?php echo $quantity; ?></td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td><?php echo $total_price; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){ echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){ echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){ echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){ echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="buttondesign green">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            //Check whether update button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the values from form
                $id = $_POST['id'];
                // $price = $_POST['price'];
                // $quantity = $_POST['quantity'];
                // $total_price = $_POST['total_price'];
                $status = $_POST['status'];

                //Update the values
                $sql2 = "UPDATE order_food SET
                    status = '$status'
                    WHERE order_id=$id
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //Check whether updated or not
                //And Redirect to Manage Order With Message
                if($res2==TRUE)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
                    //header('location:'.SITEURL.'admin/manage-order.php');
                    ?>
                    <script>
                        window.location.href='http://localhost/Sprinkles/admin/view-order-details.php?id=<?php echo $id; ?>';
                    </script>
                    <?php
                }
                else
                {
                    //Failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to update order</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>

    </div>
</div>
