<?php
    $server = "localhost";
    $username = "if0_36811992";
    $password = "ifmayu1512";
    $database = "phpproj";

    $connect = mysqli_connect($server,$username,$password,$database);
    
    if(!$connect)
    {
        echo "connection failed".mysqli_connect_error($connect);
    }
    // end if connect
    else
    { //1  
        session_start();

            // code for student insertion
        if(isset($_POST["student-insert"]))
        { //2
           $enroll =(int) $_POST['sno'];
           $name = (string)$_POST['sname'];
           $sem =(int) $_POST['sem'];
           $col =(string)strtoupper( $_POST['scollage']);
           $department = $_SESSION['Department'];

            $sti_query = "INSERT INTO `student`(`Enrollment`, `Name`, `sem`,`Department`, `Collage`, `Date`)
            VALUES ('$enroll','$name','$sem','$department','$col', CURRENT_TIMESTAMP())";
            $sqlquery = mysqli_query($connect,$sti_query);
            if(!$sqlquery)
            { //3
               // echo "insertion failed";
               $eror = mysqli_error($connect);
               header("location:../html/home.php?rn=fl&log=15");

            } //2
            else
            { //3
                //echo "row inserted  ";
                header("location:../html/home.php?rn=ri&log=15");
            } //2
        }//1
        // code for student insertion is ended
        else if(isset($_POST['logout']))
        {
            
            { 
                session_destroy();
                $connect->close();
                header("location:../index.php?lo=1");
            }
        }
        // code for edit user
        else if(isset($_POST['edit']))
        {
            $user = $_SESSION['uname'];

           header("location:../html/Edituser.php");
        }
        // code for edit user is ended
        // code for logout
        else if(isset($_POST['logout']))
        {

            session_destroy();
            header("location:../html/index.html?lg=s");
        }
        // code for logout is ended
        // code for update User info
        else if(isset($_POST['Updateuser']))
        {
            $user = $_SESSION['uname'];
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
           
            $city = $_POST['city'];


            $query = "UPDATE `users` SET 
            `Fname`='$fname',`Lname`='$lname',
            `Id`='$id',`Post`='$post',
            `Department`='$department',`Phone`='$phone',
            `Email`='$email',`Age`='$age',
            `Username`='$uname',`Password`='$pwd',
            `City`='$city',
            `Date`= CURRENT_TIMESTAMP() WHERE `Username` = '$user'";
            $result = mysqli_query($connect,$query);
            if(!$result)
            {
                  header("location:../html/home.php?update=0&log=15");
            }
            else
            {
                $_SESSION['uname'] = $uname;
                header("location:../html/home.php?update=1&log=15");
            }
        }
     /*   else if(isset($_GET['return']))
        {
            $enroll = $_GET['return'];
            echo $enroll;
        }
     else if(isset($_POST['present'] or isset($_POST['absent'])))
        {
            $date = date("d_m_y");
            $department = $_SESSION['Department'];

            $g = "select * from `users`";
            $result = mysqli_query($query);

            if(!$result)
            {
                echo mysqli_error($connect);
            }
            else
            {
                echo $result;
            }
        }*/
        // code for update User info is ended
       elseif(isset($_POST['present']))
       {
           echo "present";
       }
        else
        {
           // echo "click on save button";
           if(isset($_SESSION['uname']))
                {
                    header("location:../html/home.php?rn=sc&log=15");
                }
                else
                {
                    header("location:../index.php");
                }
          
        }
    }

?>