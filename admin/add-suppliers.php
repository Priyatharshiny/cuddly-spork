<?php include('partials/menuu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Supplier</h1><br><br>

        <!-- To check whether the Session is set or not -->

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <!-- Add Supplier form starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table cellspacing="5px" class="tbl-50">
                <tr>
                    <td>Supplier Name:</td>
                    <td><input type="text" name="name" placeholder="Supplier Name" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="tel" name="phone_no" placeholder="Supplier Phone Number" class="input-responsive" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <textarea name="address" rows="3" placeholder="Supplier Address" class="input-responsive" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Supplier" class="buttondesign green">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add Supplier form ends -->

        <!-- Database Connection Starts -->

        <?php
            //Check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the value from the form
                $name = $_POST['name'];
                $phone_no = $_POST['phone_no'];
                $address = $_POST['address'];

                //2.Create SQL to get insert Supplier into database
                $sql = "INSERT INTO suppliers SET
                name ='$name',
                phone_no = '$phone_no',
                address = '$address'
                ";

                //3.Execute the query and save in database
                $res = mysqli_query($conn, $sql);

                //4.Check whether the query executed or not and data added or not
                if($res==TRUE)
                {
                    //Query executed and supplier added
                    $_SESSION['add'] = "<div class='success'>Supplier added successfully.</div>";
                    //Redirect to manage supplier page
                    //header('location:'.SITEURL.'admin/manage-suppliers.php');
                    ?>
                    <script>
                        window.location.href='http://localhost/Sprinkles/admin/manage-suppliers.php';
                    </script>
                    <?php
                }
                else
                {
                    //Failed to add supplier
                    $_SESSION['add'] = "<div class='error'>Failed to add supplier.</div>";
                    //Redirect to manage supplier page
                    header('location:'.SITEURL.'admin/add-suppliers.php');
                }
            }
        ?>

        <!-- Database Connection ends -->
    </div>
</div>
