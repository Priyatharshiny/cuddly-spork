<?php
    include('partials/menuu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Employee</h1><br><br>

        <?php
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the id and all other details
                //echo "Getting the data";
                $id = $_GET['id'];
                //Create SQL query to get all other details
                $sql = "SELECT * FROM employee WHERE id=$id";
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
                    $salary = $row['salary'];
                }
                else
                {
                    //Redirect to manage employee with session message
                    $_SESSION['no-employee-found'] = "<div class='error'>Employee not found</div>";
                    header('location:'.SITEURL.'admin/manage-employee.php');
                }
            }
            else
            {
                //Redirect to manage employee
                header('location:'.SITEURL.'admin/manage-employee.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table cellspacing="5px" class="tbl-50">
                <tr>
                    <td>Employee Name:</td>
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
                    <td>Salary:</td>
                    <td>
                        <input type="number" name="salary" value="<?php echo $salary; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Employee" class="buttondesign green">
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
                $salary = $_POST['salary'];

                //3. Update the database
                $sql2= "UPDATE employee SET
                    name = '$name',
                    phone_no = '$phone_no',
                    address = '$address',
                    salary = '$salary'
                    WHERE id = $id
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //Redirect to manage employee with message
                //Check whether executed or not
                if($res2==true)
                {
                    //employee updated
                    $_SESSION['update'] = "<div class='success'>Employee Updated Successfully.</div>";
                    //header('location:'.SITEURL.'admin/manage-employee.php');
                    ?>
                    <script>
                        window.location.href='http://localhost/Sprinkles/admin/manage-employee.php';
                    </script>
                    <?php
                }
                else
                {
                    //Failed to update employee
                    $_SESSION['update'] = "<div class='error'>Failed to update employee.</div>";
                    header('location:'.SITEURL.'admin/manage-employee.php');
                }
            }
        ?>

    </div>
</div>

