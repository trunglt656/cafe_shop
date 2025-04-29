<?php include('partials-front/menu.php'); ?>

<section class="food-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Tìm kiếm sản phẩm.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>



<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Menu</h2>

        <?php 
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

            $res=mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    
                    ?>
                    
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                          
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"><?php echo $price; ?> VND</p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Đặt hàng</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Không tìm thấy.</div>";
            }
        ?>

        

        

        <div class="clearfix"></div>

        

    </div>

</section>

<?php include('partials-front/footer.php'); ?>