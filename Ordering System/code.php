<?php
    session_start();
    $username = "root";
    $password = "";
    $dbname = "fyp";

    $conn = new mysqli("localhost", $username, $password, $dbname);   

    if(isset($_POST['order_type']))
    {
        $order_type = $_POST['order_type'];
        $_SESSION['order_type'] = $order_type;
        header('Location: dine_in_customer_info.php');        
    }

    if(isset($_POST['submit_btn']))
    {
        $cust_name = $_POST['Cust_Name'];
        $cust_contact = $_POST['Cust_Contact'];
        $table_no = $_POST['Table_No'];
        $order_type = $_SESSION['order_type'];
        $Order_Date = date("Y-m-d");
        $_SESSION['cust_name'] = $cust_name;

        $query = "INSERT INTO `order` (Order_Type, Cust_Name, Cust_Contact, Table_No, Order_Date) VALUES('$order_type','$cust_name', '$cust_contact', '$table_no', '$Order_Date')";
        $query_run = mysqli_query($conn, $query);

        $select_orderid = "SELECT Order_ID FROM `order` WHERE CUST_NAME = '$cust_name'";
        $Order_ID_result = mysqli_query($conn, $select_orderid);
        $Order_ID_row = mysqli_fetch_assoc($Order_ID_result);
        $Order_ID = $Order_ID_row['Order_ID'];
       
        header('Location: Restaurant_Order_Menu.php?Order_ID='.$Order_ID);

    }

    if(isset($_POST['add_to_cart'])){
        $cust_name = $_SESSION['cust_name'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = 1;
        
        
        $select_orderid = "SELECT Order_ID FROM `order` WHERE CUST_NAME = '$cust_name'";
        $Order_ID_result = mysqli_query($conn, $select_orderid);
        $Order_ID_row = mysqli_fetch_assoc($Order_ID_result);
        $Order_ID = $Order_ID_row['Order_ID'];

        header('Location: Restaurant_Order_Menu.php?Order_ID='.$Order_ID);
  
        $select_cart = mysqli_query($conn, "SELECT * FROM `order_items` WHERE Product_Name = '$product_name' AND Product_ID = '$product_id'");
  
        $_SESSION['Order_ID'] = $Order_ID;

       
        $insert_product = mysqli_query($conn, "INSERT INTO `order_items`(Product_Name, rate, qty, Order_ID)
        VALUES ('$product_name','$product_price','$product_quantity', '$Order_ID')");
        $message[] = 'product added to cart successfully!';
       
    }

    /*if(isset($_POST['payment_type']))
    {
       
        $payment_type = $_POST['payment_type'];
        $Order_ID = $_GET['Order_ID'];
        $query = "UPDATE `order` SET Payment_Type = '$payment_type' WHERE Order_ID = '$Order_ID'";
        $query_run = mysqli_query($conn, $query);
            
        
            //$query = "INSERT INTO `order` (Order_Type) VALUES('$order_type')";
     }*/

    if(isset($_POST['submit_feedback_btn'])) {
        
        $feedback = $_POST['feedback'];
        $email = $_POST['email'];

        $query = "INSERT INTO `feedback` (Cust_Description, Cust_Email) VALUES ('$feedback', '$email')";
        $query_run = mysqli_query($conn, $query);

        header('Location: mainpage.php');
    }

    if(isset($_POST['booking_submit_btn'])) {
        $cust_name = $_POST['Cust_Name'];
        $cust_email = $_POST['Cust_Email'];
        $cust_contact = $_POST['Cust_Contact'];
        $cust_pax = $_POST['Cust_Pax'];
        $cust_date = $_POST['Cust_Date'];
        $cust_time = $_POST['Cust_Time'];

        $duplicate_check_query = "SELECT * FROM `booking` WHERE `Cust_Name` = '$cust_name' AND `Email` = '$cust_email' AND `Cust_Contact` = '$cust_contact' AND `Date` = '$cust_date' AND `Time` = '$cust_time'";
        $duplicate_check_query_run = mysqli_query($conn, $duplicate_check_query);

        if(mysqli_num_rows($duplicate_check_query_run) > 0) {

        } else {
            $query = "INSERT INTO `booking` (Cust_Name, Email, Cust_Contact, Pax, Date, Time) 
            VALUES ('$cust_name', '$cust_email', '$cust_contact', '$cust_pax', '$cust_date', '$cust_time')";
            $query_run = mysqli_query($conn, $query);

            /*Send the booking information by email*/
            $toEmail = $_POST["1201202644@student.mmu.edu.my"];

            $to = $cust_email;
            $subject = "New Booking Confirmation";
            $message = "Dear " . $cust_name . ",\n\n";
            $message .= "This email confirms your booking. Please find the details below:\n\n";
            $message .= "Name: " . $cust_name . "\n";
            $message .= "Email: " . $cust_email . "\n";
            $message .= "Contact Number: " . $cust_contact . "\n";
            $message .= "Pax: " . $cust_pax . "\n";
            $message .= "Date: " . $cust_date . "\n";
            $message .= "Time: " . $cust_time . "\n\n";
            $message .= "If you need to make any changes, please don't hesitate to reach out to us.\n\n";
            $message .= "Thank you for choosing us!\n\n";
            /*sender*/
            $headers = $toEmail;
            mail($to,$subject,$message,$headers);

            $booking_id = mysqli_insert_id($conn);

            header("Location: booking_record.php?booking_id=$booking_id");
        }
    } 
