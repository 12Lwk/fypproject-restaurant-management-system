<?php
    $username = "root";
    $password = "";
    $dbname = "fyp";
    
    $conn = new mysqli("localhost", $username, $password, $dbname);  
    
    $Order_ID = $_GET['Order_ID'];
?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="website icon" type="png" href="Photos/logo.png">
    <title>Payment Option</title>
    <link rel="stylesheet" href="transaction_option.css?v=<?php echo time(); ?>"> 
</HEAD>

<body>
<header>
        <nav>
            <div class="menu-wrapper" onclick="window.location.assign('ordering_cart.php?Order_ID=<?php echo $Order_ID; ?>')">Back</div>
        </nav>
</header>
<div class="position">
<div class="welcome"><p>Please select your payment type</p></div>
    <!--Start-->
    <div class="container">
        <div class="box">
        <!--<div class="E-wallet">-->
            <button type="submit" name="payment_type" value="Touch-N-Go" onclick="window.location.href='eWallet.php?Order_ID=<?php echo $Order_ID; ?>'">
            <img class="eWallet-icon" src="Photos/ewalleticon.png" alt="eWallet-Icon"/>
            <div class="txt-pst">E-Wallet</div>
            </button>
        <!--</div>-->
        
        </div>

        <div class="box-2">
        <div class="middle"><p>Or</p></div>
        </div>

        <div class="box">
        <!--<div class="Online-Banking">-->
            <button type="submit" name="payment_type" value="Online-Banking" onclick="window.location.href='onlinebanking.php?Order_ID=<?php echo $Order_ID; ?>'">
            <img class="online-banking-icon" src="Photos/fpx_box_icon.png" alt="Online-Banking-Icon"/>
            <div class="txt-pst">Online Banking</div>
            </button>
        <!--</div>-->
        
        </div>
    </div>

</body>    

<!--Command-->
    <script>
        function touchngo()
        {
            window.location.href="ewallet.php";
        }
        function debcredcard()
        {
            window.location.href="onlinebanking.php";
        }
    </script>
</body>

</HTML>