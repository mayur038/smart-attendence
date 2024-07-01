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
     $logst = $_GET['log'];
     if($logst == 15)
     {
         session_start();   

     
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        
body
{
    margin: 0%;
    padding: 0%;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI',
     Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue'
     , sans-serif;

}
.nav
{
    position: relative;
    margin:0px auto;
    width: 100%;
    height: 80px;
    
    background-color: white;
    
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    overflow: hidden;
}
.secnav
{
    height: 100%;
    display: inline-block;
    overflow: hidden;
    background-color: white;
}
#logo
{
    height: 90%;
    width: 20%;
    float: left;
    
    margin: 0 13px;
}
#logo img
{
    height: 95%;
    width: 50%;
    margin:5px 40px;
    background-color: white;
    overflow: hidden;
}
#navigation
{
    width: 65%;
    float: right;   
    margin: 20px 0px;
    overflow: hidden;
    }
#navigation a
{
    color: rgba(0, 0, 0, 0.637);
    letter-spacing: 1px;
    font-size: 20px;
    text-transform: capitalize;
    position: relative;
    text-decoration: none;
    margin: 0% 4%;
    right: 0%;
    padding: auto;
    background-color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight:500;
    overflow: hidden;
}
#navigation a:hover
{
    border-bottom: 2px solid rgb(30, 62, 240);

    transition: 0.2s all;
}
.Active
{
    border-bottom: 2px solid rgba(0, 0, 0, 0.555);
}
.container
{
    width: 100%;
    height: 50%;
    display: inline-block;
    background-color: #EEEEEE;
}
.in
{
    width: 49%;
    height: 100%;
    display:inline-block;
    overflow: hidden;
}
#image-container
{
    width: 35%;
}
#image-container img
{
    width: 70%;
    height: 70%;
    margin: 5% 15%;
    border-radius: 50%;
    overflow: hidden;
}
#image-container h2
{
    font-family: 'Montserrat', sans-serif;
    font-weight:900;
    margin: 0;
    text-align: center;
    font-size: 38px ;
}
#content
{
    width: 63%;
    font-family: 'Montserrat', sans-serif;
}
#content h3
{
    font-size: 30px;
    margin: 100px 10px;
    margin-bottom: 0%;
    color:#00ADB5;
}
#content label
{
    display: block;
    margin: 1% 2%;
    font-size: 20px;
    font-weight:300;

}
#content button
{
    width: 180px;
    height: 40px;
    border-radius: 10px;
    font-size: 17px;
    color: white;
    background-color:#C84B31;
    margin: 4% 5%;
    cursor: pointer;
    font: weight 500px;
    letter-spacing:2px;
    border: none;
}
#content button:hover
{
    background-color: rgba(247, 83, 54, 0.959);
    transition: 0.4s all;
}
.add-student
{
    background-color: #EEEEEE;
    width: 100%;
    margin: 0%;
    font-family: 'Montserrat', sans-serif;
    overflow: hidden;

}
.add-student h5
{
    text-align: center;
    font-weight: 700;
    width: 100%;
    font-size: 22px;
    margin-top: 14px;
    margin-bottom: 2%;
}
.add-student form
{
    width: 90%;
    text-align: center;
    margin: 0% auto;
}
.add-student input
{
    background: none;
    border: 1px solid rgba(0, 0, 0, 0.26);
    height: 35px;
    border-radius: 7px;
    margin: 0% 1%;
    margin-bottom: 2%;
    font-size: 17px;
}
#name
{
    width: 30%;
}
#no{
    width: 22%;
}
.ss
{
    width: 8%;
}
#collage
{
    width: 24%;
}
.add-student button{
    width:120px;
    height: 34px;
    border-radius: 18px;
    border: none;
    background-color: #116530;
    color: white;
    font-size: 20px;
    margin-bottom: 10px;
    cursor: pointer;
}
.add-student button:hover
{
    background-color: rgb(32, 175, 32);
}
.student-records
{
    margin: 0%;
    width: 100%;
    height: auto;
    background: #000428;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    overflow: hidden;
}
.student-records h5
{
    margin: 12px auto;
    font-weight: 900;
    width: 100%;
    font-size: 26px;
    color:white;
    letter-spacing:2px;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    letter-spacing:3px;
}
table
{
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    width: 96%;
    height: auto;
    margin:1% auto;
    border-collapse: collapse;
    letter-spacing:1.5px;
    color:#EEEEEE;
}
th{
    background-color: #00ADB5;
    color: whitesmoke;
    height: 35px;
    font-size: 18px;
    font-weight: initial;
    letter-spacing: 2px;
}
td
{
    width:auto;
    height: 30px;
    background-color: #393E46;
    overflow: hidden;
}

tr:nth-child(even){
    background-color: #222831;
    overflow: hidden;
}
.pbutton
{
    width: 90px;
    height: 28px;
    border: none;
    border-radius: 0px;
    cursor: pointer;
    color: black;
    margin: 0;
    overflow:  ;
}


td a img
{
    width: 28px;
    color: rgba(0, 0, 0, 0.336);
    opacity: 0.5;
}
table tr:hover
{
    background:#222831;
    transition:0.4s all;
    cursor: pointer;
    overflow:hidden;
}
table td:hover
{
    background:#222831;
    transition:0.2s all; 
    cursor: pointer;
    overflow:hidden;
}
.nodata
{
    text-align:center;
    margin:20px 20%;
    height:50%;
}
.instruction
{
    width:80%;
    text-align:center;
    margin:10 auto;
    font-size:35px;
}
.test
{
    width:50%;
    height:50%;
    background:white;
    border:1px solid black;
}
table td a
{
    text-decoration:none;  
    padding: 2px; 
    position: relative;
    font-size:17px;
    border-radius:10px;
    width:120;
    letter-spacing:2px;
}

table td a:hover
{
   box-shadow:0px 0px 4px black;
}
.atst
{
    background:#EEEEEE;
    text-align:center; 
    border-radius:5px;
    color:black; 
}
.atst:active
{
    background:red;
    
    opacity:0.9;
    transition:0.3s all;
    color:black;
}
.getattendence
{
    background: #00ADB5;
box-shadow: inset 5px 5px 10px #00939a,
            inset -5px -5px 10px #00c7d0;
    width:14%;
   height:40px;
   border-radius:5px;
   text-align:center;
   float:right;
   margin:2%;
   margin-bottom:10px;
}
.getattendence a
{
    width:auto;
      
    text-decoration:none;
    color:white;
    font-size:20px;
}
    </style>
</head>
<body>
    <section class="nav">
        <div class="secnav" id="logo">
            <img src="../images/color.png">
        </div>
        <div class="secnav" id="navigation">
        <?php
                if(isset($_SESSION['uname']))
                {
                    echo "<a href='home.php?log=15' class='Active'>Home</a>"; 
                }
                else
                {
                    echo "<a href='home.php'>Home</a>";
                }
            ?>
            <a href="Department.php">Department</a>
            <a href="About.html">About</a>
            <a href="contactus.html">Contact</a>
            <a href="../php/help.php">Help</a>
        </div>
    </section>
    <!-- main container--------- -->
    <section class="container">
        <div class="in" id="image-container">
            <?php
                $unm = $_SESSION['uname'];
                $query = "SELECT * FROM `users` WHERE `Username` = '$unm'";
                $c_run = mysqli_query($connect,$query);
                $row = mysqli_fetch_array($c_run);
                $nu = mysqli_num_rows($c_run);
             
                echo '<img src="data:image;base64,'.base64_encode($row['Profile']).'" >';
            
            ?>
            <h2><?php echo $row['Fname']." ".$row['Lname']; ?></h2>
        </div>
        <div class="in" id="content">
            <h3>Hey <?php echo "$unm"; ?> let's count your students</h3>
            <label>Department : <?php echo $row['Department'] ;?></label>
            <label>Role : <?php echo $row['Post']; ?></label>
            <label>Date : <?php echo date("d - M - Y");?></label>
            <form method="post" action="../php/homeaction.php">
                <button name="edit">Edit profile</button>
                <button name="logout" class = "lg">Log out</button>   
            </form>
        </div>
    </section>
    <!--Add student-->
    <section class="add-student">
        <form method="post" action="../php/homeaction.php" autocomplete="on">
            <h5>Add student</h5>
            <input type="text" placeholder="student name.." name="sname" id="name"  required>
            <input type="number" placeholder="Enrollment no." name="sno" id="no"  required>
            <input list="sem" name="sem" placeholder="sem" class="ss" required >
            <datalist id="sem">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
            </datalist>
            <input type="text" placeholder="Institute name.." name="scollage" id="collage"  required>
            <button name="student-insert">Save</button>
         </form>
    </section>
    <?php
        $dept = $row['Department'];
        $stselect = "SELECT * FROM `student` WHERE `Department` = '$dept'";
        $stselectq = mysqli_query($connect,$stselect);
        $record = mysqli_num_rows($stselectq);
        if(!$stselectq)
        {
            echo " failed to load the data".mysqli_error($connect);
        }
        else
        {
        if($record > 0 )
        {
            ?>
            
            
    <!-- student records -->
    <section class="student-records">
        <h5>student Records</h5>
        <table>
            <tr>
                <th>No</th>
                <th>Enrollment No</th>
                <th>Name</th>
                <th>sem</th>
                <th colspan="3">Attendence</th>
            </tr>
            <?php 
                $i = 1;
               while($row = mysqli_fetch_array($stselectq))
               // start while loop
               {
                  
                    ?>
                    <tr>
                <?php $enroll = $row['Enrollment'];
                        $nam = $row['Name'];
                ?>
                <td><?php echo $i ;?></td>
                <td><?php echo $enroll;?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['sem']; ?></td>
                <?php
                    $date = date('Y-m-d');

                    $chkquery = "SELECT  `date` FROM `attendence` WHERE `Enrollment` = '$enroll' AND `date` = '$date'";
                    $chkqryrn = mysqli_query($connect,$chkquery);
                    $tablerow = mysqli_num_rows($chkqryrn);

                    if($tablerow>0)
                    {   
                        $getA_query = "SELECT * FROM `attendence` WHERE `Enrollment` = '$enroll' AND `date` = '$date'"; 
                        $getA_run = mysqli_query($connect,$getA_query);
                        $fetch_status = mysqli_fetch_array($getA_run);
                        
                        if(!$getA_run)
                        {
                            echo mysqli_error($connect); 
                        }
                        else
                        {
                            if(mysqli_num_rows($getA_run)>0)
                            {
                                echo "<td colspan='2'><a href = '' onclick='alerta()' class='atst'>".$fetch_status['status']."</a></td>";
                            }
                             else 
                             {
                                echo "<td>Error</td>";
                             }
                        }
                    }
                    else
                    {
                    
                ?>
               <td><?php echo "<a href= '../php/Attendence.php?rn=$enroll&ss=p' name = 'present' style='background:green;color:white;'  >present</a></td>";?>
               <td><?php echo "<a href= '../php/Attendence.php?rn=$enroll&ss=a' name = 'absent' style='background:tomato;color:white;'  >absent</a></td>";?>
              <!-- <td><a href= "../php/Attendence.php" name = "absent" style="background:tomato;color:white;">absent </a></td> -->
                <?php 
                    }
                    // close else
            ?>
                <td><a href="#" class ="editicon"><img src="../images/edit.svg"></a></td> 
              <!--  <form method="post" action="../php/homeaction.php">
                <td><button name="present" class="present">present</button></td>
                <td><button name="absent" class="absent">absent</button></td>
                <td><a href="#"><img src="../images/edit.svg"></a></td>
            </form> -->
            
            </tr>
                    <?php
                    $i = $i + 1;
               }
               // close while loop
        } 
            // close if
        else{
            ?>
            <img src="../images/notfound.svg" class="nodata">
            <p class="instruction">oops!  There is no students in your class Add first..</p>
      <?php
        }  
        // close else 
?>
        
<?php
    }    
        // close query if
            ?>
            
        </table>
            <div class="getattendence"><a href= "../php/getattendence.php"  name="getat">Get Attendence</a></div>
    </section>
 
        <?php
     }
     else
     {
         header("location:../index.php");
     }
 }

        ?>
</body>
</html>
<?php
    // error section ========================================
    if(isset($_GET['rn']))
    {
        $retst = $_GET['rn'];

        if($retst =='fl')
        {
            echo "<script>alert('insetion of student is failed try again');</script>";
        }
        if($retst =='ri')
        {
            echo "<script>alert('1 student succesfully Inserted');</script>";
        }
      /*  if($retst =='sc')
        {
            echo "<script>alert('click on save Button to insert student record ');</script>";
        }*/
    }
    // update info
    if(isset($_GET['update']))
    {
        $upst = $_GET['update'];
        if($upst == 0)
        {
            echo "<script>alert('Failed to Update the data');</script>"; 
        }
        if($upst == 1)
        {
            echo "<script>alert('Data Updated succesfully');</script>"; 
        }
    }
    // Attendence errors
    if(isset($_GET['er']))
    {
        $ero = $_GET['er'];
        echo "<script>alert('$ero');</script>"; 
    }






?>
<script>
    function alerta()
    {
        alert('Attendence of this student  is already taken');
    }
    </script>