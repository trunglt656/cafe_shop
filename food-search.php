<?php include('partials-front/menu.php'); ?>

<section class="food-search text-center">
    <div class="container">
        <?php 


            $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        ?>


        <h2>Sản phẩm <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>



<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Danh sách</h2>

        <?php 


            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    
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

                            <a href="#" class="btn btn-primary">Đặt ngay</a>
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