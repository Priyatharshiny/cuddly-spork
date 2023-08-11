<?php
    include('partials/menuu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Supplier</h1><br><br>

        <?php
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the id and all other details
                //echo "Getting the data";
                $id = $_GET['id'];
                //Create SQL query to get all other details
                $sql = "SELECT * FROM suppliers WHERE id=$id";
                //Execute the query
                $res = mysqli_query($conn,$sql);
                //Count the rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $name = $row['name'];
                    $phone_no = $row['phone_no'];
                    $address = $row['address'];
                }
                else
                {
                    //Redirect to manage supplier with session message
                    $_SESSION['no-supplier-found'] = "<div class='error'>Supplier not found</div>";
                    header('location:'.SITEURL.'admin/manage-suppliers.php');
                }
            }
            else
            {
                //Redirect to manage category
                header('location:'.SITEURL.'admin/manage-suppliers.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table cellspacing="5px" class="tbl-50">
                <tr>
                    <td>Supplier Name:</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="tel" name="phone_no" value="<?php echo $phone_no; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <!-- <input type="text" name="address" value="<?php echo $address; ?>"> -->
                    
                        <textarea name="address" rows="3" value="<?php echo $address; ?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Supplier" class="buttondesign green">
                    </td>
                </tr>
            </table>

        </form>

        <?php
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //1.Get all the values from our form
                $id = $_POST['id'];
                $name = $_POST['name'];
                $phone_no = $_POST['phone_no'];
                $address = $_POST['address'];

                //3. Update the database
                $sql2= "UPDATE suppliers SET
                    name = '$name',
                    phone_no = '$phone_no',
                    address = '$address'
                    WHERE id = $id
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //Redirect to manage supplier with message
                //Check whether executed or not
                if($res2==true)
                {
                    //Supplier updated
                    $_SESSION['update'] = "<div class='success'>Supplier Updated Successfully.</div>";
                    //header('location:'.SITEURL.'admin/manage-suppliers.php');
                    ?>
                    <script>
                        window.location.href='http://localhost/Sprinkles/admin/manage-suppliers.php';
                    </script>
                    <?php
                }
                else
                {
                    //Failed to update supplier
                    $_SESSION['update'] = "<div class='error'>Failed to update supplier.</div>";
                    header('location:'.SITEURL.'admin/manage-suppliers.php');
                }
            }
        ?>

    </div>
</div>

