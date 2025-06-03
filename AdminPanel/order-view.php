<?php
      include("dbcon.php");
      include("authentication.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/3f156b6633.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <!--SideBar Nav-->
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
                <div> <a href="dashboard.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Admin Panel</span> </a>
                    <div class="nav_list"> <a href="dashboard.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="booking.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Bookings</span> </a> <a href="categories.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Categories</span> </a> <a href="order.php" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Orders</span> </a> <a href="product.php" class="nav_link"> <i class='bx bx-bowl-hot'></i> <span class="nav_name">Products</span> </a></div>
                    <a href="feedback.php" class="nav_link"> <i class='bx bxs-envelope' ></i> <span class="nav_name">Feedback</span> </a>
                    <a href="transaction.php" class="nav_link"> <i class='bx bx-credit-card'></i><span class="nav_name">Transaction</span> </a>

                </div>
                <a href="logout.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Sign Out</span>
                </a>
        </nav>
        </div>
        <!--Container Main start-->
       <div class="catheader"><h4 class="h3 mb-4 text-gray-800">Order</h4></div>
        <div class="height-200 bg-light">
                <!--Booking Table Data -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">View Order</h6>
                        </div>
                        <div class="col" align="right">
                            <button type="button" name="add_category" id="add_category" class="btn btn-succss btn-circle btn-sm">
                                <i class="fas fa-plus">
                                
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                <table id="example" class="table table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product_ID</th>
                            <th>qty</th>
                            <th>rate</th>
                            <th>amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                    if(isset($_GET['order-id']))
                    {
                        $order_no = $_GET['order-id'];
                        $order = "SELECT * FROM `order_items` WHERE Order_ID='$order_no'";
                        $order_run = mysqli_query($con, $order);
                    
                        if(mysqli_num_rows($order_run) > 0)
                        {
                            $product_qty = array();
                            $i = 1;
                            foreach($order_run as $row)
                            {
                                if(array_key_exists($row['Product_Name'], $product_qty))
                                {
                                    $product_qty[$row['Product_Name']] += $row['qty'];
                                }
                                else
                                {
                                    $product_qty[$row['Product_Name']] = $row['qty'];
                                }
                            }
                            foreach($product_qty as $product => $qty)
                            {
                                $amount = $qty * $row['rate'];
                                $total += $amount;
                                ?>
                                <tr>
                                    <td><?=$i; ?></td>
                                    <td><?=$product; ?></td>
                                    <td><?=$qty; ?></td>
                                    <td><?=number_format($row['rate'], 2); ?></td>
                                    <td><?=number_format($amount, 2); ?></td>
                                <?php
                                $i++;
                            }
                            
                        }
                    }
                    

                    ?> 

                     </tbody>
                     <td colspan="4">Total</td>
                     <td colspan="1"><?php echo number_format($total, 2) ?></td>
                </table>
                    </div>

                </div>
            </div>   
                                
    
                    
                                  
                </div>
      
                
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="admin.js"></script>
</body>
</html>