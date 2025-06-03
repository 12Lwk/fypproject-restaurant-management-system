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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Order</h6>
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
                    <?php
                    if(isset($_GET['order-id']))
                    {
                        $order_no = $_GET['order-id'];
                        $order = "SELECT * FROM `order` WHERE Order_ID='$order_no'";
                        $order_run = mysqli_query($con, $order);

                        if(mysqli_num_rows($order_run) > 0)
                        {
                            foreach($order_run as $order)
                            {
                            ?>

                        
                                
    
                    <form action="code.php" method="POST">
                        <input type="hidden" name="Order_ID" value="<?=$order['Order_ID'];?>" >


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Table No</label>
                                <input type="text" name="Table_No" value="<?=$order['Table_No'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Customer Name</label>
                                <input type="text" name="Cust_Name" value="<?=$order['Cust_Name'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Customer Contact</label>
                                <input type="text" name="Cust_Contact" value="<?=$order['Cust_Contact'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Order Type</label>
                                <input type="text" name="Order_Type" value="<?=$order['Order_Type'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Date</label>
                                <input type="date" name="Order_Date" value="<?=$order['Order_Date'];?>" class="form-control" min=<?php echo date('Y-m-d'); ?> max="">                           
                             </div>
                             <div class="col-md-6 mb-3">
                                <label for="">Type of Payment</label>
                                <input type="text" name="Payment_Type" value="<?=$order['Payment_Type'];?>" class="form-control">
                            </div>
                                

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="update_order" class="btn btn-primary">Update</button>

                            </div>

                        </div>

                    </form>

                    <?php
                            }
                        }
                        else
                        {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }

                    }
                        
                    ?>
                                  
                </div>
      
                
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="admin.js"></script>
</body>
</html>