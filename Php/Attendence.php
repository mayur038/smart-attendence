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
        if(isset($_GET['rn']))
        {
            $status = "none";
            $enrol = $_GET['rn'];
            $sttmp = $_GET['ss'];
            if($sttmp == 'p')
            {
                $status = "Present";
            }
            else if ($sttmp == 'a')
            {
                $status = "Absent";  
            }

            
            $date = date('Y-m-d');

            $select = "SELECT * FROM `student` WHERE `Enrollment` = '$enrol'";
            $run = mysqli_query($connect,$select);
            $row = mysqli_fetch_array($run);

            if(!$run)
            {
                $er = mysqli_error($connect);
                header("location:../html/home.php?er=$er&log=15");
            }
            else
            {
                $name = $row['Name'];
                $dept = $row['Department'];

                $insert = "INSERT INTO `attendence`(`Enrollment`, `Name`, `status`, `department`, `date`) VALUES ('$enrol','$name','$status','$dept','$date');";
                $irun = mysqli_query($connect,$insert);

                if(!$irun)
                {
                    
                    echo mysqli_error($connect);
                   // header("location:../html/home.php?ater=f&log=15");
                }
                else
                {
                    header("location:../html/home.php?log=15");
                }

            }

        }
        else if(isset($_POST['srch']))
        {
            $date = $_POST['date'];
            header("location:getattendence.php?rdt=$date");
        }
        else
        {
            header("location:../HTML/home.php?log=15");
        }
    


}
?>