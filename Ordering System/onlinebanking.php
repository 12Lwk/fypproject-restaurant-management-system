<?php
    $username = "root";
    $password = "";
    $dbname = "fyp";

    $conn = new mysqli("localhost", $username, $password, $dbname);   

    if (isset($_GET['Order_ID'])) {
      $Order_ID = mysqli_real_escape_string($conn, $_GET['Order_ID']);
  } elseif (isset($_POST['Order_ID'])) {
      $Order_ID = mysqli_real_escape_string($conn, $_POST['Order_ID']);
  } else {
      echo "Why erro again? Order_ID";
      exit();
  }
  
  if (isset($_POST['card-pay-submit'])) {
      $eCard = mysqli_real_escape_string($conn, $_POST['eCard']);
      $Acc_Number = mysqli_real_escape_string($conn, $_POST['accNumber']);
      $Pass_Word = mysqli_real_escape_string($conn, $_POST['password']);
  
      $query = "SELECT * FROM `transaction` WHERE Payment_Type ='$eCard' AND Acc_Number ='$Acc_Number' AND Pass_Word ='$Pass_Word'";
      $result = mysqli_query($conn, $query);
  
      if ($result) {
          if (mysqli_num_rows($result) > 0) {
              $query1 = "UPDATE `order` SET Payment_Type='$eCard' WHERE Order_ID='$Order_ID'";
  
              $result1 = mysqli_query($conn, $query1);
              if ($result1) {
                  header('Location: customer_feedback.php');
                  exit();
              } else {
                  echo "Error updating record: " . mysqli_error($conn);
                  exit();
              }
          } else {
              echo "Incorrect User ID, Password, or Bank.";
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
    <title>FPX Online Banking</title>
    <link rel="stylesheet" href="onlinebanking.css?v=<?php echo time(); ?>"> 
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