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
    session_start();
    $username = $_SESSION['uname'];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Attendence </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Outfit:wght@100;300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap');
        body
        {
            margin:0;
            padding:0;
            background:#E3FDFD;
            font-family: 'Montserrat', sans-serif;
        }
.nav
{
    position: relative;
    margin:0px auto;
    width: 100%;
    height: 80px;
    overflow: hidden;
    background-color: white;
    box-shadow: 0px 10px 10px rgba(152, 183, 243, 0.678) ;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
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
    width: 55%;
    float: center;   
    margin: 20px 80px;
    overflow: hidden;
    }
#navigation a
{
    color: rgba(0, 0, 0, 0.637);
    font-size: 20px;
    text-transform: capitalize;
    position: relative;
    text-decoration: none;
    margin: 0% 4%;
    right: 0%;
    padding: auto;
    background-color: white;
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
.right
{
    
    background:black;
    float:right;
    overflow:hidden;
    margin: 0.3% 2%;
    border-radius:50%;  
}
.right img
{
    width:60px;
    height:60px;

}
table
{
   border-collapse:collapse;
   
}
.inln img
{
    width:80%;
    margin:4% auto;
    display: block;
}

.inln h7
{
    
    width:100%;
    text-align:center;
    font-size:22px;
    font-family: 'Dancing Script', cursive;
}
.table
{
    background: #00ADB5;
box-shadow: inset 28px 28px 78px #00878d,
            inset -28px -28px 78px #00d3dd;
            font-family: 'Montserrat', sans-serif;
    margin:0;   
    overflow:hidden;
}
th
{
    background:#142F43;
    color:#C2FFF9;
    font-size:17px;
}
tr:nth-child(odd){
    background-color: #393E46   ;
    color:#EEEEEE;
    overflow: hidden;
}
tr:nth-child(even){
    background-color: #212121;
    color:#EEEEEE   ;
    overflow: hidden;
}
.inln
{
    height:auto;
    text-align:center;
    width:49.6%;
    display:inline-block;
    margin:0;
    padding:0;
    overflow:hidden;
   
}
.pressent
{
    width:83%;
    text-align:center;
    margin:5px auto;
    font-size:14px; 
    letter-spacing:2px;
    font-family:arial;
}
table tr
{
    border:none;
   
    height:29px;
}
.table h4
{
    text-align:center;
    font-family: 'Outfit', sans-serif;
    font-size:30px;
    color:#EC255A;
    margin:4px;
}
.info
{
    margin:0;
    height:40%;
    color:#191919;
    background:#E3FDFD;
    overflow:hidden;
}
.info h3
{
    margin: 33px 20px;
    font-size:25px;
    letter-spacing:1px;
}
.info h6
{
    text-align:center;  
    font-size:28px;
    font-family: sans-serif;
    letter-spacing:1.5px;
    font-weight:lighter;
    margin:70px 0;
    margin-bottom:19px;
}
.info form input
{
    text-align:center;
    height:35px;
    width:56%;
    margin:0 19%;
    margin-right:0;
    font-size:26px;
    letter-spacing:3px;
    border-radius:4px;
    border:none;
    background:#A6E3E9;
}
.info form input:focus
{
    background:#99DDCC;
    border:none;
    transition:0.4s all;
    border:none;
    outline:none;
}
.info form button
{
    margin:0px 20px;
    height:33px;
    width: 80px;
    border-radius:20px;
    outline:none;
    border:none;
    background:#71C9CE;
    color:#EEEEEE;
    font-size:16px;     
    letter-spacing:2px;
    font-family: 'Montserrat', sans-serif;
}
.info form button:active
{
    background: #17D7A0;    
}
.table h2
{
    font-family: 'Outfit', sans-serif;
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
            echo "<a href = '../html/home.php?log=15' class = 'Active'>Home</a>";
            ?>
           
            <a href="../html/Department.php">Department</a>
            <a href="../html/About.html">About</a>
            <a href="../html/contactus.html">Contact</a>
            <a href="help.php">Help</a>
        </div>
        <div class="right">
            <?php
                $query = "SELECT * FROM `users` WHERE `Username` = '$username'";
                $query_run = mysqli_query($connect,$query);
                if(!$query_run)
                {
                    echo mysqli_error($connect);
                }
                else
                {
                $row = mysqli_fetch_array($query_run);
                $image = $row['Profile'];
                $dept = $row['Department'];
                }
           
            echo '<img src="data:image;base64,'.base64_encode($row['Profile']).'" >';
            ?>  </div>
    </section>
    <section class="info">
        <h3><b>Username : </b><?php echo $username;?></h3>
        <h3><b>Department : </b><?php echo $row['Department']; ?></h3>
        <h6>select date to gate Attendence :</h6>
        <form  action="Attendence.php" method="Post">
            <input type="date" required name="date" > 
            <button name="srch">Enter</button>
            </form>
    </section>
    <?php
        if(isset($_GET['rdt']))
        {
            $date_of_attendence = $_GET['rdt'];
        }
        else
        {
            $date_of_attendence = date('d-m-y');
        }
    ?>
    <section class="table">
        <h4><?php echo $date_of_attendence; ?></h4>
    <div class="present inln">
        <h2>Present Student</h2>
    <table class="pressent" >
        
        <?php
            $depart = $row['Department'];
            $ps_query = "SELECT * FROM `attendence` WHERE `date` = '$date_of_attendence' AND `status` = 'Present' AND `Department` = '$depart' ";
            $ps_run = mysqli_query($connect,$ps_query);
            $p_stud = mysqli_num_rows($ps_run);
            if($p_stud > 0)
            {
                ?>
            <tr>
        <th>No</th>
        <th>Enrollment</th>
        <th>Name</th>
        </tr>
                <?php
            if(!$ps_run)
            {
                echo mysqli_error($connect);
                
            }
            else
            {
                $i = 1; 
            while($row = mysqli_fetch_array($ps_run))
            {            
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['Enrollment']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        </tr> <?php
        $i = $i+1;
            }
            // end of while loop  
        }
            // end of else
            ?>
             <h3  style="letter-spacing:2px;font-family: 'Dancing Script', cursive;color:green  ;"> <?php echo "Total $p_stud students are Present" ; ?></h3>
            <?php 
    }
    // end of If loop 
    else
    {
        ?>
    <img src="../images/nodata.svg" >
    <h7>No one student is present</h7>
        <?php
    }
        ?>
    </table>
      
    </div>
    <div class="Absent inln">
    <h2>Absent Student</h2>
    <table class="pressent" >
        
        <?php
            $ps_query = "SELECT * FROM `attendence` WHERE `date` = '$date_of_attendence' AND `status` = 'Absent'AND `Department` = '$depart'";
            $ps_run = mysqli_query($connect,$ps_query);
            $p_stud = mysqli_num_rows($ps_run);
            if($p_stud > 0)
            {
                ?>
            <tr>
        <th>No</th>
        <th>Enrollment</th>
        <th>Name</th>
        </tr>
                <?php
            if(!$ps_run)
            {
                echo mysqli_error($connect);
                
            }
            else
            {
                $i = 1; 
            while($row = mysqli_fetch_array($ps_run))
            {            
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['Enrollment']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        </tr> <?php
        $i = $i+1;
            }
            // end of while loop  
        }
            // end of else 
            ?>
              <h3 style="font-family: 'Dancing Script', cursive;letter-spacing:2px;color:tomato;"> <?php echo "Total $p_stud students are Absent" ; ?></h3>
            <?php
    }
    // end of If loop 
    else
    {
        ?>
    <img src="../images/times.svg" >
    <h7>No one student is Absent</h7>
        <?php
    }
        ?>
    </table>
     
    </div>
    </section>
</body>
</html>
<?php
// form action
        

?>
<?php
 }
?>