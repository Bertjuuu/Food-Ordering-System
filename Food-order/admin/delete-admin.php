<?php

    //Include constans.php file here
    include('../config/constant.php');

    //1. get the ID of admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==True)
    {
        //Query Executed Successfully and Admin Deleted
        // "Admin Deleted";
        //Create Session Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete admin
        //echo "Failed to Deleted Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to Manage admin page with message (succes/error)

?>