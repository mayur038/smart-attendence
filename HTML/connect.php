<?php
     $server = "localhost";
     $username = "if0_36811992";
     $password = "ifmayu1512";
     $database = "phpproj";

    $con = mysqli_connect($server,$uname,$pass,$dvb);

    if(!$con)
    {
        echo mysqli_connect_error($con);
    }
    else
    {
        session_start();
        $_SESSION['connect'] = 1;  
        $_SESSION['uid'] = 1;  

        if(isset($_POST['send']))
        {
            $email = $_POST['name'];
            $message = $_POST['message'];
            $date = getdate();
            $insert = "INSERT INTO `contact`(`name`, `email`, `date`) VALUES ('$email','$message','$date')";
            $insert_1 = mysqli_query($con,$insert);

            if(!$insert_1)
            {
                echo mysqli_error($con);
            }
            else
            {
                header("location:Test1.php?sd=1");
            }
        }

    }
?>