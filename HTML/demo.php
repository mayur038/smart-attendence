<?php 
   $server = "localhost";
   $username = "if0_36811992";
   $password = "ifmayu1512";
   $database = "phpproj";

    $con = mysqli_connect($server,$username,$password,$db);
    if(!$con)
    {
        echo " faild".mysqli_connect_error($con);
    }
    else
    {
        if(isset($_POST['submit']))
        {
        $name = (string)$_POST['name'];
        $phone =(integer) $_POST['phone'];
        $address =(string) $_POST['address'];
        $profile = addslashes(file_get_contents($_FILES['profile']['tmp_name']));
        
        $query = "INSERT INTO `employee`(`name`, `phone`, `address`, `image`, `date`) VALUES ('$name','$phone','$address','$profile',CURRENT_TIMESTAMP())";
        $query_run = mysqli_query($con,$query);


        if(!$query_run)
        {
            echo "insertion faileed.".mysqli_error($con);
        }
        else
        {
            session_start();
            setcookie("demoname",$name,time()+232*10);
        }

        }
        else
        {
            header("location:demo.html");
        }
        $con -> close();

    }






?>