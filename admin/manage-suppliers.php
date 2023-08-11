<?php include('partials/menuu.php');?>

        <!-- Main content section start -->
        <div class="main-content">
            <div class="wrapper">
                <div class="main-headers">
                <h1>Manage Supplier</h1>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['no-supplier-found']))
            {
                echo $_SESSION['no-supplier-found'];
                unset($_SESSION['no-supplier-found']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        ?>
        <a href="<?php echo SITEURL; ?>admin/add-suppliers.php" class="buttondesign">Add Supplier</a>
    </div><br>
<table cellspacing="5px" >
    <thead style="height: 50px;">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Supplier Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <?php
        //Query to get all suppliers from database
        $sql = "SELECT * FROM suppliers";

        //Execute query
        $res = mysqli_query($conn,$sql);

        //count rows
        $count = mysqli_num_rows($res);

        //Create serial number
        $sn = 1;

        //Check whether we have data in database or not
        if($count>0)
        {
            //We have data in database
            //Get data and display
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $name = $row['name'];
                $phone_no = $row['phone_no'];
                $address = $row['address'];
                ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $phone_no; ?></td>
                <td><?php echo $address; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-suppliers.php?id=<?php echo $id; ?>" class="buttondesign green">Update Supplier</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-suppliers.php?id=<?php echo $id; ?>" class="buttondesign red">Delete Supplier</a>
                </td>
            </tr>

                <?php
            }
        }
        else
        {
            //We do not have data
            //We will display the message inside table
            ?>

            <tr>
                <td colspan="6"><div class="error">Suppliers Details not Available</div></td>
            </tr>

            <?php
        }
    ?>


</table>
            </div>
        </div>
        <!-- Main content section ends -->