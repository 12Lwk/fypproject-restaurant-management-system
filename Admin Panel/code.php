<?php
include('dbcon.php');

if(isset($_POST['delete_booking']))
{
    $booking_no = $_POST['delete_booking'];

    $query = "DELETE FROM booking WHERE Booking_No='$booking_no'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: booking.php');
        exit(0);
    }
    else
    {
        header('Location: booking.php');
        exit(0);
    }
}

if(isset($_POST['delete_category']))
{
    $category_id = $_POST['delete_category'];

    $query = "DELETE FROM category WHERE Category_ID='$category_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: categories.php');
        exit(0);
    }
    else
    {
        header('Location: categories.php');
        exit(0);
    }
}

if(isset($_POST['delete_order']))
{
    $order_id = $_POST['delete_order'];

    $query = "DELETE FROM `order` WHERE order_ID='$order_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: order.php');
        exit(0);
    }
    else
    {
        header('Location: order.php');
        exit(0);
    }
}

if(isset($_POST['delete_product']))
{
    $product_id = $_POST['delete_product'];

    $query = "DELETE FROM product WHERE Product_ID='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: product.php');
        exit(0);
    }
    else
    {
        header('Location: product.php');
        exit(0);
    }
}




if(isset($_POST['add_booking']))
{
    $Cust_Name = $_POST['Cust_Name'];
    $Cust_Contact = $_POST['Cust_Contact'];
    $Pax = $_POST['Pax'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
    $Email = $_POST['Email'];
    
    $check_query = "SELECT * FROM booking WHERE Date='$Date' AND Time='$Time'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) 
    {
        echo "<script>
        alert('This date and time is already booked!');
        window.location.href='booking.php';
        </script>";
    } 
    else 
    {
        $query = "INSERT INTO booking (Cust_Name, Cust_Contact, Pax, Date, Time, Email) VALUES('$Cust_Name','$Cust_Contact','$Pax','$Date','$Time','$Email')"; 
        $query_run = mysqli_query($con, $query);
        header('Location: booking.php');
         exit(0);
    }
        
    
}


if(isset($_POST['add_category']))
{
    $Category_Name = $_POST['Category_Name'];

    $query = "INSERT INTO category (Category_Name) VALUES('$Category_Name')"; 
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: categories.php');
        exit(0);
    }
    else
    {
        header('Location: categories.php');
        exit(0);
    }
}

if(isset($_POST['add_order']))
{
    $Table_No = $_POST['Table_No'];
    $Cust_Name = $_POST['Cust_Name'];
    $Cust_Contact = $_POST['Cust_Contact'];
    $Order_Type = $_POST['Order_Type'];
    $Order_Date = $_POST['Order_Date'];
    $Payment_Type = $_POST['Payment_Type'];

    $query = "INSERT INTO `order` (Table_No, Cust_Name, Cust_Contact, Order_Type, Order_Date, Payment_Type) VALUES('$Table_No','$Cust_Name','$Cust_Contact','$Order_Type','$Order_Date','$Payment_Type')"; 
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: order.php');
        exit(0);
    }
    else
    {
        header('Location: order.php');
        exit(0);
    }
}

if(isset($_POST['add_product']))
{
    $Product_Name = $_POST['Product_Name'];
    $Product_Price = $_POST['Product_Price'];
    $Product_Category = $_POST['Product_Category'];
    $Product_Image = $_POST['Product_Image'];

    $query = "INSERT INTO product (Product_Name, Product_Price, Product_Category, Product_Image) VALUES('$Product_Name','$Product_Price','$Product_Category','$Product_Image')"; 
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header('Location: product.php');
        exit(0);
    }
    else
    {
        header('Location: product.php');
        exit(0);
    }
}




if(isset($_POST['update_booking']))
{
    $booking_no = $_POST['booking_no'];
    $Cust_Name = $_POST['Cust_Name'];
    $Cust_Contact = $_POST['Cust_Contact'];
    $Pax = $_POST['Pax'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
    $Email = $_POST['Email'];

    $check_query = "SELECT * FROM booking WHERE Date='$Date' AND Time='$Time' AND Booking_No != '$booking_no'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) 
    {
        echo "<script>
        alert('This date and time is already booked!');
        window.location.href='booking.php';
        </script>";
    } 
    else
    {
        $query = "UPDATE booking SET Cust_Name='$Cust_Name', Cust_Contact='$Cust_Contact', Pax='$Pax', Date='$Date', Time='$Time', Email='$Email'
                    WHERE Booking_No='$booking_no' ";
        $query_run = mysqli_query($con, $query);
        header('Location: booking.php');
        exit(0);
    }

    
}

if(isset($_POST['update_category']))
{
    $category_id = $_POST['Category_ID'];
    $Category_Name = $_POST['Category_Name'];
    

    $query = "UPDATE category SET Category_Name='$Category_Name' WHERE Category_ID='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Edit Successfully";
        header('Location: categories.php');
        exit(0);
    }
}

if(isset($_POST['update_order']))
{
    $order_id = $_POST['Order_ID'];
    $Table_No = $_POST['Table_No'];
    $Cust_Name = $_POST['Cust_Name'];
    $Cust_Contact = $_POST['Cust_Contact'];
    $Order_Type = $_POST['Order_Type'];
    $Order_Date = $_POST['Order_Date'];
    $Payment_Type = $_POST['Payment_Type'];
    

    $query = "UPDATE `order` SET Table_No='$Table_No', Cust_Name='$Cust_Name', Cust_Contact='$Cust_Contact', Order_Type='$Order_Type', Order_Date='$Order_Date', Payment_Type='$Payment_Type'
                WHERE Order_ID='$order_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Edit Successfully";
        header('Location: order.php');
        exit(0);
    }
}

if(isset($_POST['update_product']))
{
    $product_id = $_POST['Product_ID'];
    $Product_Name = $_POST['Product_Name'];
    $Product_Price = $_POST['Product_Price'];
    $Product_Category = $_POST['Product_Category']; 
    $Product_Image = $_POST['Product_Image'];   

    $query = "UPDATE product SET Product_Name='$Product_Name', Product_Price='$Product_Price', Product_Category='$Product_Category', Product_Image='$Product_Image'
                WHERE Product_ID='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Edit Successfully";
        header('Location: product.php');
        exit(0);
    }
}