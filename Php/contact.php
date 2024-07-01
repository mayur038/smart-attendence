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
 else
 {
     if(isset($_POST['suggesr']))
     {
         $name = $_POST['name'];
         $collage = $_POST['cname'];
         $email = $_POST['email'];
         $msg = $_POST['suggestion'];

         $qry = "INSERT INTO `contact`(`name`, `collage`, `email`, `suggestion`, `date`) VALUES ('$name','$collage','$email','$msg',CURRENT_TIMESTAMP())";
         $qry_run = mysqli_query($connect,$qry);
         if(!$qry_run)
         {
             echo mysqli_error($connect);
         }
         else
         {
            header("location:../html/contactus.html");
         }

     }
 }


?>