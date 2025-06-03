<?php
    $username = "root";
    $password = "";
    $dbname = "fyp";

    $conn = new mysqli("localhost", $username, $password, $dbname);   

    if (isset($_GET['Order_ID'])) {
        $Order_ID = $_GET['Order_ID'];
      } elseif (isset($_POST['Order_ID'])) {
        $Order_ID = $_POST['Order_ID'];
      } else {
        echo "Why the Order ID got error";
        exit;
      }

    if (isset($_POST['ewallet-pay-submit'])) {
        $eWallet = mysqli_real_escape_string($conn, $_POST['eWallet']);
        $accNumber = mysqli_real_escape_string($conn, $_POST['accNumber']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $query = "SELECT * FROM `transaction` WHERE Payment_Type ='$eWallet' AND Acc_Number ='$accNumber' AND Pass_Word ='$password'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['Payment_Type'] == $eWallet && $row['Acc_Number'] == $accNumber && $row['Pass_Word'] == $password) {
                    }
                }

                $query1 = "SELECT Order_ID FROM `order` WHERE Order_ID = $Order_ID";
                $result1 = mysqli_query($conn, $query1);
                if ($result1) {
                    $order_id = mysqli_fetch_assoc($result1)['Order_ID'];

                    $query2 = "UPDATE `order` SET Payment_Type='$eWallet' WHERE Order_ID='$Order_ID'";

                    $result2 = mysqli_query($conn, $query2);

                    header('Location: customer_feedback.php');
                }
            } else {
                echo "Incorrect Phone Number, Password, or E-wallet. ";
            }
        } else {
            echo "Query error: " . mysqli_error($conn);
        }
    }  
?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="website icon" type="png" href="Photos/logo.png">
    <title>E-Wallet</title>
    <link rel="stylesheet" href="ewallet.css?v=<?php echo time(); ?>"> 
</HEAD>

<body>
<header>
        <nav>
            <div class="menu-wrapper" onclick="window.location.assign('transaction_option.php?Order_ID=<?php echo $Order_ID; ?>')">Back</div> 
        </nav>
</header>

</body>   

<div class="container">
    
    <div class="icon">
    <img class="touch-n-go-icon" src="Photos/touch-n-go.png" alt="Touch-N-Go-icon"/>
    <img class="boost-icon" src="Photos/boost.png" alt="Touch-N-Go-icon"/>
    <img class="touch-n-go-icon" src="Photos/grabpay.png" alt="Touch-N-Go-icon"/></div>

    <form action="ewallet.php" method="post">

        <label for="eWallet">E-wallet:</label>
        <select id="eWallet" name="eWallet" required>
            <option value="" disabled selected>Select your e-wallet</option>
            <option value="Touch n Go">Touch n Go</option>
            <option value="Boost">Boost</option>
            <option value="Grab Pay">Grab Pay</option>
        </select>
            
        <label for="accNumber">Phone Number:</label>
        <input type="text" id="accNumber" name="accNumber" placeholder="60+" required maxlength="10">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern=".{8,}" required>

        <input type="hidden" name="Order_ID" value="<?php echo $Order_ID; ?>">
        <button type="submit" name="ewallet-pay-submit">Submit</button>

    </form>
</div>


</body>

</HTML>