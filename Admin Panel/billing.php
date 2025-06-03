<?php
    session_start();
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
    <title>Billing</title>
</head>
<body>

    <!--SideBar Nav-->
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Admin Panel</span> </a>
                    <div class="nav_list"> <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="http://localhost/fyp/Admin%20Panel/booking.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Bookings</span> </a> <a href="categories.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Categories</span> </a> <a href="order.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Orders</span> </a> <a href="product.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Products</span> </a> <a href="billing.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Billing</span> </a> </div>
                    <a href="#" class="nav_link"> <i class='bx bxs-envelope' ></i> <span class="nav_name">Feedback</span>
                </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
       <div class="catheader"><h4 class="h3 mb-4 text-gray-800">Billing Management</h4></div>
        <div class="height-200 bg-light">
                <!--Booking Table Data -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-primary">Bill List</h6>
                        </div>
                        <div class="col" align="right">
            
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                <table id="example" class="table table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Table Number</th>
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Order Time</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM product";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $row)
                            {
                                ?>
                                <tr>
                                    <td><?=$row['Product_ID']; ?></td>
                                    <td><?=$row['Product_Name']; ?></td>
                                    <td><?=$row['Product_Price']; ?></td>
                                    <td><?=$row['Product_Category']; ?></td>
                                    <td><a href="product-edit.php?product-id=<?=$row['Product_ID'];?>" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form action="code.php" method="POST">
                                        <button type="submit" name="delete_product" value="<?=$row['Product_ID'];?>" class="btn btn-success">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }

                        }
                        else
                        {
                             ?>
                             <tr>
                                <td colspan="6">No Record Found</td>
                             </tr>

                             <?php
                        }

                    ?>
                    </tbody>
                </table>
                    </div>

                </div>
            </div>
    <!--Booking Table Data Ends-->
        </div>
        <!--Container Main end-->
    <!--SideBar Nav Ends-->

    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="admin.js"></script>
</body>
</html>