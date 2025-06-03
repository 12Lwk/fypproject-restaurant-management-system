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


      if (isset($_POST['card-pay-submit'])) {
        // Get data from order_items table
        $query = "SELECT Order_ID, Total_Amount FROM `order` WHERE Order_ID='$Order_ID'";
        $result = mysqli_query($conn, $query);
      
        // Store the data in the transaction table
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          $Amount = $row['Total_Amount'];
          $Bank_Type = $_POST['eCard'];
      
          $update = "UPDATE `order` SET Payment_Type = '$Bank_Type' WHERE Order_ID='$Order_ID'";
          if (mysqli_query($conn, $update)) {
            echo "Payment Type was updated successfully.";
          } else {
              echo "Error: " . $update . "<br>" . mysqli_error($conn);
          }


          $insert = "INSERT INTO `transaction` (Bank_Type, Amount, Order_ID) VALUES ('$Bank_Type', '$Amount', '$Order_ID')";
          if (mysqli_query($conn, $insert)) {

            echo "Transaction was successful.";
            header('Location: customer_feedback.php');
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
    <title>FPX Online Banking</title>
    <link rel="stylesheet" href="onlinebanking.css?v=<?php echo time(); ?>"> 
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
    <img class="fpx-icon" src="Photos/fpx_logo.png" alt="Touch-N-Go-icon"/>

    <form action="onlinebanking.php" method="post">

        <label for="phoneNumber">Bank:</label>
        <select id="eCard" name="eCard" required>
          <option value="" disabled selected>Select your bank</option>
          <option value="Ambank">Ambank</option>
          <option value="Bank Islam">Bank Islam</option>
          <option value="Citibank">Citibank</option>
          <option value="CIMBbank">CIMBbank</option>
          <option value="HSBC Bank">HSBC Bank</option>
          <option value="Hong Leong Bank">Hong Leong Bank</option>
          <option value="Public Bank">Public Bank</option>
          <option value="Maybank">Maybank</option>
        </select>
        
        <label for="phoneNumber">User ID:</label>
        <input type="text" id="accNumber" name="accNumber" placeholder="xxxxxxxxxxxxxxxx" required maxlength="20">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern=".{8,}" required>

        <input type="hidden" name="Order_ID" value="<?php echo $Order_ID; ?>">
        <button type="submit" name="card-pay-submit">Submit</button>

    </form>
</div>

<!--Command-->
    <script>

        function touchngo()
        {
            alert("Are you sure want to cancel?");
            window.location.href="transaction_option.php";
        }

        document.getElementById("accNumber").value = "";

    </script>
</body>

</HTML>