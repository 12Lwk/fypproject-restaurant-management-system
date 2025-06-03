<?php
session_start();
$username = "root";
$password = "";
$dbname = "fyp";

$conn = new mysqli("localhost", $username, $password, $dbname); 

require 'C:\xampp\htdocs\phpmailer\vendor\autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['booking_submit_btn'])) {
    $cust_name = $_POST['Cust_Name'];
    $cust_email = $_POST['Cust_Email'];
    $cust_contact = $_POST['Cust_Contact'];
    $cust_pax = $_POST['Cust_Pax'];
    $cust_date = $_POST['Cust_Date'];
    $cust_time = $_POST['Cust_Time'];

    $query = "INSERT INTO `booking` (Cust_Name, Email, Cust_Contact, Pax, Date, Time) 
    VALUES ('$cust_name', '$cust_email', '$cust_contact', '$cust_pax', '$cust_date', '$cust_time')";
    $query_run = mysqli_query($conn, $query);

    // Include the PHPMailer library
    require 'C:\xampp\htdocs\phpmailer\vendor\autoload.php';

    // Create a new instance of the PHPMailer class
    $mail = new PHPMailer(true);

    // Configure the mail server and other settings
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true; 
    $mail->Username = 'fyprestaurantproject22@gmail.com';
    $mail->Password = 'phbbtzcqsvfkmnrx';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the recipient's email address and name
    $mail->addAddress($cust_email, $cust_name);

    // Set the subject and body of the email
    $mail->Subject = 'Booking Confirmation';
    $mail->Body = "Dear $cust_name, \n\nYour booking is confirmed. \nDetails: \nName: $cust_name \nContact: $cust_contact \nPax: $cust_pax \nDate: $cust_date \nTime: $cust_time \n\nThank you for booking with us.\n\nBest Regards.";

    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));

    // Send the email
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent'; 
        $booking_id = mysqli_insert_id($conn);
        header("Location: booking_record.php?booking_id=$booking_id");
        //header("Location: mainpage.php");*/
    }
}

?>
