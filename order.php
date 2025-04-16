<?php include('partials-front/menu.php'); ?>

    <?php 
        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];

            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                //GEt data
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                
            }
            else
            {
                header('location:'.SITEURL);
            }
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">HÃY ĐIỀN MẪU NÀY ĐỂ THƯỞNG THỨC MÓN YÊU THÍCH CỦA BẠN</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Sản phẩm</legend>

                    <div class="food-menu-img">
                      
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">VND<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Thông tin</legend>
                    <div class="order-label">Tên</div>
                    <input type="text" name="full-name" placeholder="Tên của bạn" class="input-responsive" required>

                    <div class="order-label">Sdt</div>
                    <input type="tel" name="contact" placeholder="084xxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="cafeshop@gmail.com" class="input-responsive" required>

                    <div class="order-label">Số bàn</div>
                    <textarea name="no" rows="1" placeholder="bàn của bạn" class="input-responsive" required></textarea>
                    <div class="order-label">Số lượng</div>
                        <input type="number" name="qty"class="input-responsive" required>
                    <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                if(isset($_POST['submit']))
                {

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $table_no = $_POST['no'];


                    //Save the Order in Databaase
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        table_no = '$table_no'
                    ";


                   $res2 = mysqli_query($conn, $sql);

                    if($res2==true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>

    <?php include('partials-front/footer.php'); ?>