<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Thêm Admin</h1>

        <br />

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Tên đầy đủ:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name" </td>
                </tr>

                <tr>
                    <td>Tên</td>
                    <td>
                        <input type="text" name="Username" placeholder="Enter Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Mật Khẩu</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondery">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

<?php

//get data
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $user_name = $_POST['Username'];
    $password =md5($_POST['password']);

    //sql query 
    $sql ="INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$user_name',
        password='$password'
    ";

       $res = mysqli_query($conn, $sql);

       if($res==TRUE)
       {
        echo("Data Inserted");
        header("location:".SITEURL.'admin/manage-admin.php');

       }
       else
       {
        echo("Data Inserted");
        header("location:".SITEURL.'admin/manage-admin.php');
       }

}
?>