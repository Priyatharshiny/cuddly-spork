<?php include('partials/menuu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Employee</h1><br><br>

        <!-- To check whether the Session is set or not -->

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <!-- Add employee form starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table cellspacing="5px" class="tbl-50">
                <tr>
                    <td>Employee Name:</td>
                    <td><input type="text" name="name" placeholder="Employee Name" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="tel" name="phone_no" placeholder="Employee Phone Number" class="input-responsive" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <textarea name="address" rows="3" placeholder="Employee Address" class="input-responsive" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Salary:</td>
                    <td><input type="number" name="salary" placeholder="Rs. " class="input-responsive" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Employee" class="buttondesign green">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add employee form ends -->

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
                $salary = $_POST['salary'];

                //2.Create SQL to get insert employee into database
                $sql = "INSERT INTO employee SET
                name ='$name',
                phone_no = '$phone_no',
                address = '$address',
                salary = '$salary'
                ";

                //3.Execute the query and save in database
                $res = mysqli_query($conn, $sql);

                //4.Check whether the query executed or not and data added or not
                if($res==TRUE)
                {
                    //Query executed and employee added
                    $_SESSION['add'] = "<div class='success'>Employee added successfully.</div>";
                    //Redirect to manage employee page
                    //header('location:'.SITEURL.'admin/manage-employee.php');
                    ?>
                    <script>
                        window.location.href='http://localhost/Sprinkles/admin/manage-employee.php';
                    </script>
                    <?php
                }
                else
                {
                    //Failed to add employee
                    $_SESSION['add'] = "<div class='error'>Failed to add employee.</div>";
                    //Redirect to manage employee page
                    header('location:'.SITEURL.'admin/add-employee.php');
                }
            }
        ?>

        <!-- Database Connection ends -->
    </div>
</div>
