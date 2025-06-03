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
        // Get data from order_items table
        $query = "SELECT Order_ID, Total_Amount FROM `order` WHERE Order_ID='$Order_ID'";
        $result = mysqli_query($conn, $query);
      
        // Store the data in the transaction table
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          $Amount = $row['Total_Amount'];
          $Bank_Type = $_POST['eWallet'];

          $update = "UPDATE `order` SET Payment_Type = '$Bank_Type' WHERE Order_ID='$Order_ID'";
          if (mysqli_query($conn, $update)) {
            echo "Payment Type was updated successfully.";
          } else {
              echo "Error: " . $update . "<br>" . mysqli_error($conn);
          }
      
          $insert = "INSERT INTO `transaction` (Bank_Type, Amount, Order_ID) VALUES ('$Bank_Type', '$Amount', '$Order_ID')";
          if (mysqli_query($conn, $insert)) {
            header('Location: customer_feedback.php');
            echo "Transaction was successful.";
          } else {
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
          }
        } else {
          echo "Error: Order not found.";
        }
      
        // Close the database connection
        mysqli_close($conn);
      }
?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="website icon" type="png" href="Photos/logo.png">
    <title>E-Wallet</title>
    <link rel="stylesheet" href="ewallet.css?v=<?php echo time(); ?>"> 
</HEAD>

<script type="text/javascript">
    window.history.forward();
    function noBack() {
        window.history.forward();
     }
</script>

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