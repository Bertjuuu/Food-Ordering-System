<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the session is set of not
            {
                echo $_SESSION['add']; //Display the session Message if Set
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="Password" name="Password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="Submit" name="Submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 
    //Process the value from form and save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['Submit']))
    {
        //Button Clicked
        //"Button clicked";

        //1. Get the Data from form
        $full_name = $_POST['Full_name'];
        $username = $_POST['Username'];
        $password = md5($_POST['Password']); //Password Encryption with MD5
        
        //2. SQL Query to Save the Data into Database
        $sql = "INSERT INTO tbl_admin SET
            Full_name= '$full_name',
            Username= '$username',
            Password= '$password'
        ";

        //3. Execute queryand Save Data in Database
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); //Database Connection
        $db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error()); // Selecting Database

        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data inserted
            //echo "Data Inserted";
            //Create a session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Insert Data
            //echo "Failed to Insert Data";
                //Create a session Variable to Display Message
                $_SESSION['add'] = "Failed to Add Admin";
                //Redirect Page to Add Admin
                Header("location:".SITEURL.'admin/add-admin.php');
        }

    }

?>