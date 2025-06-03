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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="booking.css?v=<?php echo time(); ?>">
    <link rel="website icon" type="png" href="Photos/logo.png">
    
    <title>Booking Form</title>
</HEAD>

<body>
<header>
        <nav>
            <div class="menu-wrapper">Customer Booking Form</div> 
        </nav>
</header>
<div class="position">
<div class="container">
        <div class="wrapper">
            <div class="Cust-Info"><span>Booking Form</span></div>
            <form action="code.php" method="post">
                <div class="container">
                    <div class="data-entry">
                        <i class="fa fa-user-circle"></i>
                        <input type="text" placeholder="Customer Name" name="Cust_Name" required>
                    </div>
                    
                    <div class="data-entry">
                        <i class="fa fa-envelope"></i>
                        <input type="text" placeholder="Email Address" name="Cust_Email" required>
                    </div>

                    <div class="data-entry">
                        <i class="fa fa-phone"></i>
                        <input type="text" placeholder="Contact Number" name="Cust_Contact" required>
                    </div>
                </div>

                <div class="container">
                    <div class="data-entry">
                        <i class="fa fa-users"></i>
                        <input type="number" id="Cust_Pax" placeholder="Pax"name="Cust_Pax" required min="1">
                    </div>

                    <div class="data-entry">
                        <i class="fa fa-calendar"></i>
                        <input type="date" placeholder="Which date" name="Cust_Date" required>
                    </div>
                </div>

                <div class="container">
                    <div class="data-entry">
                        <i class="fa fa-clock-o"></i>
                        <input type="time" placeholder="What time" name="Cust_Time" id="timeInput" required>
                    </div>
                </div>
                <div class="data-entry button">
                        <button class="submit-btn" type="back" name="back_btn" onclick="backbutton()">Back</button>
                        <button class="submit-btn" type="submit" name="booking_submit_btn" onclick="return confirm('Are you sure you want to book?');">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>

</body>

<script>
    function backbutton()
    {
        window.location.href="mainpage.php";
    }

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.querySelector("input[name='Cust_Date']").setAttribute("min", today);

    document.getElementById("timeInput").addEventListener("change", function() 
    {
        let inputTime = new Date("January 1, 1970 " + this.value);
        let minTime = new Date("January 1, 1970 10:00 AM");
        let maxTime = new Date("January 1, 1970 8:00 PM");
        
        if (inputTime < minTime || inputTime > maxTime) {
        alert("Time must be between 10:00 AM and 8:00 PM");
        this.value = "";
        }
    });
</script>

</HTML>