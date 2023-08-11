<?php

    // include constant files
    include('../config/constants.php');

    //echo "Delete employee Page";
    //Check whether the id is set or not
    if(isset($_GET['id']))
    {
        //Get the value and delete
        //echo "Get value and delete";
        $id = $_GET['id'];
       
        //Delete data from database
        $sql = "DELETE FROM employee WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        //Check whether data is deleted from database or not
        if($res==true)
        {
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Employee deleted successfully.</div>";
            //Redirect to manage employee
            header('location:'.SITEURL.'admin/manage-employee.php');
        }
        else
        {
            //Set error message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to delete employee.</div>";
            //Redirect to manage employee
            header('location:'.SITEURL.'admin/manage-employee.php');
        }

        //Redirect to manage supplier page with message
    }
    else
    {
        //Redirect to manage employee page
        header('location:'.SITEURL.'admin/manage-employee.php');
    }
?>