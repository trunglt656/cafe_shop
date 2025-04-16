<?php 
    //Include COnstants Page
    include('config/constants.php');


    if(isset($_GET['id']))
    {

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
       
        //3. Delete Food 
        $sql = "DELETE FROM tbl_food WHERE id='$id'";
        //Execute the Query
        $res = mysqli_query($conn, $sql);


        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //Failed to Delete
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        

    }
    else
    {

        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>