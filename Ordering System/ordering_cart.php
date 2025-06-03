<?php
    session_start();
    $username = "root";
    $password = "";
    $dbname = "fyp";
    
    $conn = new mysqli("localhost", $username, $password, $dbname);  

    if(isset($_GET['delete'])){
        $delete_product_name = $_GET['delete'];
    
        $delete_query = mysqli_query($conn, "DELETE FROM `order_items` WHERE Product_Name = '$delete_product_name'");
    }
?>



<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="ordering_cart.css">-->
    <link rel="stylesheet" href="ordering_cart.css?v=<?php echo time(); ?>">
    <link rel="website icon" type="png" href="Photos/logo.png">
    
    <title>Order Cart</title>
</HEAD>

<body>
<!--Panel Cart-->
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
<!--End Panel Cart-->

<div class="container">
    <section class="shopping-cart">

        <h1 class="heading">Welcome to Ordering Cart</h1>
        
        <table>

            <thead>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </thead>

    <tbody>
    <?php
    if(isset($_GET['Order_ID'])){
    $Order_ID = $_GET['Order_ID'];

    $select_cart = mysqli_query($conn, "SELECT * FROM  `order_items` WHERE Order_ID = '$Order_ID'");

    $products = array();

    $grand_total = 0;

    if(mysqli_num_rows($select_cart) > 0)
    {
        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            // check if the product name is not in the array, if not add it
            if (!array_key_exists($fetch_cart['Product_Name'], $products)) {
                $products[$fetch_cart['Product_Name']] = array(
                    'qty' => $fetch_cart['qty'],
                    'rate' => $fetch_cart['rate'],
                    'sub_total' => $fetch_cart['qty'] * $fetch_cart['rate']
                );
            } else {
                $products[$fetch_cart['Product_Name']]['qty'] += $fetch_cart['qty'];
                $products[$fetch_cart['Product_Name']]['sub_total'] += $fetch_cart['qty'] * $fetch_cart['rate'];
            }
            
            
            
        }

        foreach($products as $product_name => $details){
            ?>
            <tr>
                <td><?php echo $product_name; ?></td>
                <td>RM <?php echo number_format((float)$details['rate'], 2, '.', ''); ?></td>
                <td><?php echo $details['qty']; ?></td>
                <td>RM <?php echo number_format((float)$details['sub_total'], 2, '.', ''); ?></td>
                <td><a href="ordering_cart.php?delete=<?php echo $product_name; ?>&Order_ID=<?php echo $Order_ID; ?>" onclick="return confirm('are you sure you want to delete this item?') ? location.reload() : false;" class="delete-btn"><i class="fa fa-trash-o" style="font-size:24px"></i>delete all</a>
                </td>
            </tr>
            <?php
                $grand_total += $details['sub_total'];

                    };
                };
            }
                ?>
                <tr>
                    <?php
                        $Order_ID = $_GET['Order_ID'];

                        $query = "UPDATE `order` SET Total_Amount = '$grand_total' WHERE Order_ID = '$Order_ID'";

                        mysqli_query($conn, $query);
                    ?>
                    <td></td>
                    <td></td>
                    <div class="position_total">
                    <td>Grand total : </td>
                    <td>RM <?php echo number_format((float)$grand_total, 2, '.', ''); ?></td>
                    <td></td>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="Restaurant_Order_Menu.php?Order_ID=<?php echo $Order_ID; ?>" class="btn done_btn" style="margin-top: 0;">Back</a></td>
                    <td><a href="transaction_option.php?Order_ID=<?php echo $Order_ID; ?>" class="btn done_btn" style="margin-top: 0;" onclick="return confirm('Are you sure you want to order?');">Done</a></td>
                    <td></td>
                </tr>
            </tbody>
        </tbody>

        </table>

    </section>

</div>
</body>

</HTML>