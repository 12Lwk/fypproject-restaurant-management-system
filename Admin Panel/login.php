<?php
    session_start();
    include('dbcon.php');
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
    <!-- Header !-->
    <body id="body-pd">
    <header class="header" id="header">
        <h4>Restaurant Management System</h4>
        </header>
    </body>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
             <?php include('message.php'); ?>
                <div class = "col-md-5">
                    <div class = "card">
                        <div class = "card-header">
                            <h4>Login</h4>
                        </div>
                        <div class ="card-body">
                            <form action="logincode.php" method="post">
                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username" required placeholder="Enter Username" class="form-control">
                                </div>
                                <div class ="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                                </div>
                                <div class = "form-group mb-2 mt-4">
                                    <button type="submit" name="login-btn" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    
</body>
</html>