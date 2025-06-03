<?php
    $username = "root";
    $password = "";
    $dbname = "fyp";
    
    $conn = new mysqli("localhost", $username, $password, $dbname);   
?>

<!--BODY-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <title>Order Menu</title>
    <link rel="website icon" type="png" href="Photos/logo.png">
    <link rel="stylesheet" href="Restaurant_Order_Menu.css?v=<?php echo time(); ?>">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section id="header"></section>
    <header>
        <nav>
            <div class="menu-wrapper">
                
                <div class="position-right">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <?php
                        $Order_ID = $_GET['Order_ID'];
                        $select_cart = mysqli_query($conn, "SELECT * FROM  `order_items` WHERE Order_ID = '$Order_ID'");
                        $total_items = mysqli_num_rows($select_cart);
                        echo '<a href="ordering_cart.php?Order_ID='.$Order_ID.'" class="cart">'.$total_items.'</a>';

                        ?>
                </div>
            </div>
        </nav>
    </header>    

    <main>       
          <div class="order-menu">
          <div class="menu-grid">
          <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `product`");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            
          ?>
            
          <form action="code.php" method="post">

            
                
                <div class="menu-item">
                    <img class="food-photos" src="Food_Pic/<?php echo $fetch_product['Product_Image']; ?>" alt="">
                    <h4><?php echo $fetch_product['Product_Name']; ?></h4>
                    <div class="price">RM <?php echo number_format((float)$fetch_product['Product_Price'], 2, '.', ''); ?></div>

                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_Image']?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_Name']?>"> 
                    <input type="hidden" name="product_price" value="<?php echo (float)$fetch_product['Product_Price']?>">

                    <input type="submit" class="add_btn" value="add to cart" name="add_to_cart">
                </div>   
                
            
        </form>
        
        <?php
                };
            };
        ?>
        </div>
        </div>
    </main>

    <!--Floating Go Top Button-->
    <button id="go-top-btn" onclick="location.href='#header'">^</button>

    <!--footer-->
    <footer>        
    </footer>
</body>
</html>
                