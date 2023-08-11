<?php include('partials/menuu.php');?>
<style>
.col-4 a{color: black;}
.col-4:hover{background-color: var(--lightwhite);}
</style>
        <!-- Main content section start -->
        <div class="main-content paddings">
            <div class="wrapper">
                <h1>DASHBOARD</h1><br>

                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-category.php">

                    <?php
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count rows
                        $count =  mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1><br>
                    CATEGORIES
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-food.php">

                    <?php
                        $sql1 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count rows
                        $count1 =  mysqli_num_rows($res1);
                    ?>

                    <h1><?php echo $count1; ?></h1><br>
                    PRODUCTS
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-suppliers.php">

                    <?php
                        $sql2 = "SELECT * FROM suppliers";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count rows
                        $count2 =  mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1><br>
                    SUPPLIERS
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-employee.php">

                    <?php
                        $sql3 = "SELECT * FROM employee";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count rows
                        $count3 =  mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1><br>
                    EMPLOYEES
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-customer.php">

                    <?php
                        $sql4 = "SELECT * FROM users";
                        //Execute Query
                        $res4 = mysqli_query($conn, $sql4);
                        //Count rows
                        $count4 =  mysqli_num_rows($res4);
                    ?>

                    <h1><?php echo $count4; ?></h1><br>
                    CUSTOMERS
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-order.php">

                    <?php
                        $sql5 = "SELECT * FROM orders";
                        //Execute Query
                        $res5 = mysqli_query($conn, $sql5);
                        //Count rows
                        $count5 =  mysqli_num_rows($res5);
                    ?>

                    <h1><?php echo $count5; ?></h1><br>
                    TOTAL ORDERS
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/feedback.php">

                    <?php
                        $sql6 = "SELECT * FROM feedback";
                        //Execute Query
                        $res6 = mysqli_query($conn, $sql6);
                        //Count rows
                        $count6 =  mysqli_num_rows($res6);
                    ?>

                    <h1><?php echo $count6; ?></h1><br>
                    FEEDBACK
                </div>
                <div class="col-4 text-center">
                <a href="http://localhost/Sprinkles/admin/manage-order.php">

                    <?php
                        //Create Sql Query to get revenue generated
                        //Aggrigate function in SQl
                        $sql7 = "SELECT SUM(total_price) AS Total FROM order_food WHERE status='Delivered'";

                        //Execute the query
                        $res7 = mysqli_query($conn, $sql7);

                        //Get the value
                        $row7 = mysqli_fetch_assoc($res7);

                        //Get the total revenue
                        $total_revenue = $row7['Total'];
                    ?>

                    <h1><?php echo $total_revenue; ?></h1><br>
                    TOTAL REVENUE
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main content section ends -->
