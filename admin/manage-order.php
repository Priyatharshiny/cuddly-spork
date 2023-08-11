<?php include('partials/menuu.php');?>

    <!-- Main content section start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Order</h1>
                <br><br>

                <table cellspacing="5px">
                    <thead style="height: 50px;">
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Delivery Date</th>
                            <th>Delivery Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM `orders` ORDER BY delivery_date ASC";
                            $user_result = mysqli_query($conn, $query);
                            
                            $count = mysqli_num_rows($user_result);

                            $sn = 1; // Serial number
                    
                            if($count>0)
                            {
                                while($user_fetch = mysqli_fetch_assoc($user_result))
                                {
                                    $id = $user_fetch['id'];
                                ?> 
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $user_fetch['full_name']; ?></td>
                                        <td><?php echo $user_fetch['phone_no']; ?></td>
                                        <td><?php echo $user_fetch['delivery_date']; ?></td>
                                        <td><?php echo $user_fetch['address']; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/view-order-details.php?id=<?php echo $id; ?>" class="buttondesign green">View</a>                    
                                        </td>
                                    </tr>
                                <?php
                                }  
                            }
                            else
                            {   ?>
                                    <tr style="text-align: center;">
                                        <td colspan="6" class='error'>Order not Available</td>
                                    </tr>
                                <?php
                            }
                        ?> 
                    </tbody>               
                </table>
            </div>
        </div>
        <!-- Main content section ends -->