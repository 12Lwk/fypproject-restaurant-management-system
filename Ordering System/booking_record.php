<?php
    $username = "root";
    $password = "";
    $dbname = "fyp";
    
    $conn = mysqli_connect("localhost", $username, $password, $dbname);   

    

    if (isset($_GET['booking_id'])) {
        $booking_id = $_GET['booking_id'];

        $query = "SELECT * FROM `booking` WHERE `Booking_No` = '$booking_id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $booking = mysqli_fetch_assoc($result);

            $cust_name = $booking['Cust_Name'];
            $cust_email = $booking['Email'];
            $cust_contact = $booking['Cust_Contact'];
            $cust_pax = $booking['Pax'];
            $cust_date = $booking['Date'];
            $cust_time = $booking['Time'];
        } else {
            echo "Booking not found";
        }
    }
?>


<!DOCTYPE html>
<HTML>
<HEAD>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="booking_record.css?v=<?php echo time(); ?>">
    <link rel="website icon" type="png" href="Photos/logo.png">
    
    <title>Booking Form</title>
</HEAD>

<body>
<header>
        <nav>
            <div class="menu-wrapper">Customer Booking Form Submitted!</div> 
        </nav>
</header>
<div class="position">
<div class="container">
        <div id="booking_info">
        
        <h2>Booking Information</h2>
            <table>
                <tr>
                    <td>Booking No. :</td>
                    <td><?php echo $booking_id; ?></td>
                </tr>
                <tr>
                    <td> Name :</td>
                    <td><?php echo $cust_name; ?></td>
                </tr>
                <tr>
                    <td>Email Address : </td>
                    <td><?php echo $cust_email; ?></td>
                </tr>
                <tr>
                    <td>Contact Number:</td>
                    <td><?php echo $cust_contact; ?></td>
                </tr>
                <tr>
                    <td> Pax :</td>
                    <td><?php echo $cust_pax; ?></td>
                </tr>
                <tr>
                    <td> Date :</td>
                    <td><?php echo $cust_date; ?></td>
                </tr>
                <tr>
                    <td> Time :</td>
                    <td><?php echo $cust_time; ?></td>
                </tr>
            </table>
            <div class="btn-pst"><button class="back-btn" type="back" onclick="main()">Back to Main Page</button></div>

        </div>
    </div>
</div>

</body>

<script>
    function main()
    {
        window.location.href="mainpage.php";
    }
    
</script>

</HTML>