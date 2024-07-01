<?php
// connect---------------------
$server = "localhost";
$uname = "root";
$pass = "";
$db = "phpproj";

$con = mysqli_connect($server,$uname,$pass,$db);

    if(!$con)
    {
        echo "error".mysqli__connect_error($con);
    }
    else
    {
        session_start();
        if(isset($_POST['login']))
        {
            $username = (string) $_POST['uname'];
            $password =  (string) $_POST['pass'];

            $query = "select * from users where `Username` = '$username'";
            $run = mysqli_query($con,$query);
            $row = mysqli_num_rows($run);
            $data = mysqli_fetch_array($run);

            if($row == 1)
            {
                if($password == $data['Password'])
                {
                        $_SESSION['uname'] = $username;
                        $_SESSION['pass'] = $password;

                        echo "Login success <br>".$username ."".$password;
                        $sub_query = "INSERT INTO `log`( `uname`, `pass`, `time`) VALUES ('$username','$password',CURRENT_TIMESTAMP())";
                        $sub_query_run = mysqli_query($con,$sub_query);
                        if(! $sub_query_run)
                        {
                            echo "".mysqli_error($con);
                        }
                        else
                        {
                            echo "inserted in log table";
                        }

                    }
                else{
                    echo "Invalid password";
                }
            }
            else
            {
                echo "login failed";
            }
        }
        else
        {
            header("location:login.html");
        }
    }
?>