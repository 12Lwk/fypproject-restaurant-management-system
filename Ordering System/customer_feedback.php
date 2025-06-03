<?php
    session_start();
    $username = "root";
    $password = "";
    $dbname = "fyp";
    
    $conn = new mysqli("localhost", $username, $password, $dbname);   
?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="ordering_cart.css">-->
    <link rel="stylesheet" href="customer_feedback.css?v=<?php echo time(); ?>">
    <link rel="website icon" type="png" href="Photos/logo.png">
    
    <title>Feedback</title>
</HEAD>

<body>
<header>
        <nav>
            <div class="menu-wrapper">Customer Feedback</div> 
        </nav>
</header>

<div class="blank-zone"><p class="message">Your Order has been sucessfully submitted!</p></div>

<form action="code.php" method="post" class="feedback-box">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email address" required>

    <label for="feedback">Feedback:</label>
    <textarea id="feedback" name="feedback" placeholder="Please take a minute to comment on your experience with us to date." required></textarea>
    
    <input type="submit" name="submit_feedback_btn" >
</form>

</div>

</body>

</HTML>