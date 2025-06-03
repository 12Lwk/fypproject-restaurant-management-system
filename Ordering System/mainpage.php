<?php
    $username = "root";
    $password = "";
    $dbname = "fyp";
    
    $conn = new mysqli("localhost", $username, $password, $dbname);   

?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="website icon" type="png" href="Photos/logo.png">
    <title>Main Page</title>
    <link rel="stylesheet" href="mainpage.css?v=<?php echo time(); ?>">
</HEAD>

<body>
<header>
        <nav>
            <div class="menu-wrapper">
                

                <div class="position-right">
                    <p class="booking-order" onclick="go_to_booking()">Reservation</p>
                    <div class=""bigger><span class="material-symbols-outlined">book</span></div>
                  
                </div>
            </div>
        </nav>
    </header>

    
    <!--Start-->
    <form action="code.php" method="post">
    <div class="welcome"><p>Welcome to APASIA Restaurant Ordering System</p></div>
    <div class="container">
        <div class="box">
        <!--<div class="dine-in-order">-->
            <button type="submit" name="order_type" value="Dine-In">
            <img class="dine-in-icon" src="Photos/Dine-in-icon.png" alt="Dine-in-icon"/>
            <div class="txt-pst">Dine-IN</div>
            </button>
        <!--</div>-->
        
        </div>

        <div class="box-2">
        <div class="middle"><p>Or</p></div>
        </div>

        <div class="box">
        <!--<div class="take-away-order">-->
            <button type="submit" name="order_type" value="Take-Away">
            <img class="take-away-icon" src="Photos/Take-away-icon.png" alt="Take-away-icon"/>
            <div class="txt-pst">Take-Away</div>
            </button>
        <!--</div>-->
        
        </div>
    </div>
</form>

<!--Command-->
    <script>
        function image_dinein()
        {
            window.location.href="dine_in_customer_info.php";
        }
        function image_takeaway()
        {
            window.location.href="takeaway_customer_info.php";
        }
        function go_to_booking()
        {
            let text = "Are you sure want to reserve a table?";   
            if (confirm(text) == true)
              {
                window.location.href="booking.php";
              }
        }
    </script>
</body>

</HTML>