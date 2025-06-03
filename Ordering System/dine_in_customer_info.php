<!DOCTYPE html>
<HTML lang="en" dir="ltr">
<HEAD>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="Photos/logo.png">
    <title>Customer Info</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="dine_in_customer_info.css?v=<?php echo time(); ?>">  
</HEAD>

<body>
    <div class="panel"></div>

    <div class="container">
        <div class="wrapper">
            <div class="Cust-Info"><span>Customer Info</span></div>
            <form action="code.php" method="post">
            <p class="txt-tn">Customer Name:</p>
                <div class="data-entry">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Enter Name" name="Cust_Name" required>
                </div>

                <p class="txt-tn">Contact Number:</p>
                <div class="data-entry">
                    <i class="fa fa-phone"></i>
                    <input type="text" placeholder="Enter Phone Number(60+)" name="Cust_Contact" required>
                </div>


                <p class="txt-tn">Table Number:</p>
                <div class="data-entry">
                    <i class="fa fa-cutlery"></i>
                    <!--<input type="text" placeholder="Table Number" name="Table_No" required>-->
                    <input type="text" placeholder="Enter TA For takeaway" name="Table_No" required>
                </div>

                <div class="data-entry button">
                    <button class="submit-btn" type="submit" name="submit_btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

<style>
    
</style>

</HTML>