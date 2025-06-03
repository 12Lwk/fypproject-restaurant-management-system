<?php
    session_start();
    include('dbcon.php');

    if(isset($_POST['login-btn']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
        $login_query_run = mysqli_query($con,$login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'username'=>$username,
                'password'=>$password,
            ];

            $_SESSION['message'] = "Welcome to Admin Panel";
            header("Location: dashboard.php");
        }
        else
        {
            $_SESSION['message'] = "Invalid email or Password";
            header("Location: login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "You are not allowed to login";
        header("Location: login.php");
        exit(0);
    }


?>