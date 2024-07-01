<?php

    // Connection To the database ------------------------------------------------------------------------------
    $server = "localhost";
 $username = "if0_36811992";
 $password = "ifmayu1512";
 $database = "phpproj";
    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con)
    {
        echo "Database Error : Connection failed <br>".mysqli_connect_error();
    }

    // complete------------------------------------------------------------------------------------------------

else
{
    session_start();
    //User Login -----------------------------------------------------------------------------------------------

    if(isset($_POST['submit']))
    {
    
    
    $uname = (string) $_POST['username'];
    $pwd = (string) $_POST['password'];

       $connect = "SELECT * FROM `users` WHERE `Username` = '$uname'";
       $c_run = mysqli_query($con,$connect);
        $row = mysqli_fetch_array($c_run);
       $nu = mysqli_num_rows($c_run);
       
      
       if($con -> query($connect) == TRUE)
       {
        
                if($nu == 1)
                { 
                    
                    if($pwd == $row['Password'])
                    {
                        $cookie_name = 'Username';
                        $_SESSION['uname'] = $uname;
                        $_SESSION['Department'] = $row['Department'];
                        setcookie($cookie_name,$uname,time()+5555*60);
                        setcookie('Password',$pwd,time()+(5555*60));
                       header("location:../HTML/home.php?log=15");
                        
                    }
                    else
                    {
                        echo "<script></script>";
                        header("locaton:../index.php");
                    }
                }
                else
                {
                    header("location:../index.php?rn=p");
                    // echo "Invalid Username Enter Valid Username and try again..";
                }
       }
       else{
           echo "<label>ERROR  : $sql <br> $con->error</label>";
 
       echo $connect;

    }    
    }

    // New User-----------------------------------------------------------------------------------------------
    if(isset($_POST['csubmit']))
    {
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $id = $_POST['idno'];
       $post = $_POST['post'];
       $department = $_POST['Department'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $age = $_POST['age'];
       $uname = $_POST['username'];
       $pwd = $_POST['pwd'];    
       $cpwd = $_POST['cpwd'];

       $pimage = addslashes(file_get_contents($_FILES['profile']['tmp_name']));
       $city = $_POST['city'];
        //$_POST['profile'];
       $a = strlen($phone);

       // check The Lenth of Phone number ---------------------------------------------------------------------

       if($a == 10 || $a == 11)
       {
           // validate age------------------------------------------------------------------------------------
          if($age >= 15 && $age <= 95)
          {
           $connect = "SELECT * FROM `users` WHERE `Username` = '$uname' ";
           $c_run = mysqli_query($con,$connect);
           $row = mysqli_fetch_array($c_run);
           $nu = mysqli_num_rows($c_run);
           
            //  check the username is available or not --------------------------------------------------------

           if($nu != 1)
            {
                if($pwd == $cpwd)
                {

                    // inserting The value in database----------------------------------

               $sqlinsert = "INSERT INTO `phpproj`.`users` ( `Fname`, `Lname`, `Id`, `Post`, `Department`, `Phone`, `Email`, `Age`, `Username`, `Password`, `Profile`, `City`, `Date`) 
              VALUES 
              ( '$fname', '$lname', '$id', '$post', '$department', '$phone', '$email', '$age', '$uname', '$pwd', '$pimage', '$city', CURRENT_TIMESTAMP());";

                 if($con -> query($sqlinsert) == TRUE)
                 {  
                    $_SESSION['uname'] = $uname;
                    $_SESSION['Department'] = $department;
                    header("location:../HTML/home.php?log=15");
                 }
                 else{
                     $error = $con->error;
                     header("location:../HTML/Account.html?rn=$error");
                     echo "<label>ERROR  : $sql <br> $con->error</label>";
                 }
                }
                else
                {
                     // for invalid password
                    header("location:../HTML/Account.html?rn=p");
                }
            }
            else
            {
                // for invalid username
                header("location:../HTML/Account.html?rn=u");
            }


        } 
          else{
              // for invalid Age
            header("location:../HTML/Account.html?rn=a");
          }
       }
       else
       {    
           // for invalid mobile
        header("location:../HTML/Account.html?rn=m");
       }
  
  
}
}   
    $con->close();
    // connection close
?>
 