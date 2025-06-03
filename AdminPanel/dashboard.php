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
    <title>Dashboard</title>
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
                    <div class="nav_list"> <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="booking.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Bookings</span> </a> <a href="categories.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Categories</span> </a> <a href="order.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Orders</span> </a> <a href="product.php" class="nav_link"> <i class='bx bx-bowl-hot'></i> <span class="nav_name">Products</span> </a></div>
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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
        </div>
        
        <div class="catheader"><h4 class="h3 mb-4 text-gray-800">Dashboard</h4></div>
        <?php include('message.php'); ?>
        
        <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Booking</div>
                                        <?php
                                            $total_booking = "SELECT * FROM booking";
                                            $result = $con->query($total_booking);
                                            $row_count = $result->num_rows;
                                        ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row_count;?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Categories</div>
                                    <?php
                                            $total_categories = "SELECT * FROM category";
                                            $result = $con->query($total_categories);
                                            $row_count = $result->num_rows;
                                        ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row_count;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Orders</div>
                                        <?php
                                            $total_order = "SELECT * FROM `order`";
                                            $result = $con->query($total_order);
                                            $row_count = $result->num_rows;
                                        ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row_count;?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Products</div>
                                    <?php
                                            $total_product = "SELECT * FROM product";
                                            $result = $con->query($total_product);
                                            $row_count = $result->num_rows;
                                        ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row_count;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!--Booking Table Data -->
        

    <!--Booking Table Data Ends-->
        
        <!--Container Main end-->
    <!--SideBar Nav Ends-->

    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    


    <script>
        function logout() {
            localStorage.removeItem("user");
            // Redirect the user to the login page or show a success message
            window.location.replace("http://localhost/fyp/Admin%20Panel/login.php");
        }
    </script>
</body>
</html>