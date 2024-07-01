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
          $unm = $_SESSION['uname'];
          $query = "SELECT * FROM `users` WHERE `Username` = '$unm'"; 
          $result = mysqli_query($connect,$query);
          $row = mysqli_fetch_array($result);

          if(!$row)
          {
              echo "Data can not be fetched";
          }
          else
          {

          

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
body
{
    margin: 0%;
    padding: 0%;
    font-family: 'Montserrat', sans-serif;
     background-color: #D4ECDD;
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
    width: 65%;
    float: right;   
    margin: 20px 0px;
    overflow: hidden;
    }
#navigation a
{
    color: rgba(0, 0, 0, 0.637);
    letter-spacing: 0px;
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
.form
{
    width: 65%;
    margin:1% auto;
}
form
{
    text-align: center;
}
input
{
    display: block;
    margin: 20px 20px;
    height: 24px;
    border: 1.5px solid rgba(0, 0, 0, 0.418);
    border-radius: 4px;
    font-size: 17px;
    width: 80%;
    outline: none;
    background-color: white;
}
select
{
    display: inline-block;
    float: left;
    margin: 20px 20px;
    height: 27px;
    border: 1.5px solid rgba(0, 0, 0, 0.418);
    border-radius: 4px;
    font-size: 17px;
    width: 40%;
}
input:focus
{
    border: 1.5px solid rgb(236, 97, 79);
}
button
{
    width: 40%;
    height: 35px;
    outline: none;
    background-color: #00ADB5;
    border: none;
    font-size: 19px;
    color: rgb(235, 248, 222);
    border-radius: 14px; 
    margin: 20px;  
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.404); 
    cursor: pointer;
}
.form h4
{
    font-size: 20px;
}
.image
{
    background-color: #393E46;
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.644);
}
.image-photo
{
    margin:10px 70px;
   text-align:left;
}
.image-photo img
{
    height:200px;
    width: 200px;
    border-radius:20px;
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
    <section class="image">
        <img src="../images/update.svg">
    </section>
    <section class="form">
        <form method="post" action="../php/homeaction.php" enctype="multipart/form-data">
        <h4>Edit Information</h4>
            <input type="text" placeholder="First Name" value = "<?php echo $row['Fname'];?>" style="float: left;width: 42%;display: inline;" class="half" required name="fname">
            <input type="text" placeholder="Last Name" value = "<?php echo $row['Lname'];?>" style="width: 42%;display: inline;"  class="half"required name="lname">
            <input type="text" value = "<?php echo $row['Id'];?>" placeholder="Id Number(givem by collage).. "required name="idno">
            <input list="post" value = "<?php echo $row['Post'];?>" name="post" placeholder="post" class="ss" style="width:40%;display:inline;float:left;" required >
            <datalist id="post">
                <option value="faculty"></option>
                <option value="Hod"></option>
                <option value="Principal"></option>
            </datalist>
            <input list="sem" value = "<?php echo $row['Department'];?>" name="Department" placeholder="Department" class="ss"  style="width:40%;display:inline;float:left;" required >
            <datalist id="sem">
                <option value="computer"></option>
                <option value="IT"></option>
                <option value="civil"></option>
                <option value="automobile"></option>
                <option value="Bio-Medical"></option>
                <option value="electrical"></option>
                <option value="others"></option>
            </datalist>
           <input type="tel" value = "<?php echo $row['Phone'];?>" placeholder="Phone Number" name="phone"required>
            <input type="email" value = "<?php echo $row['Email'];?>" placeholder="Email id.." name="email"required>
            <input list="City" value = "<?php echo $row['City'];?>" name="city" placeholder="City name" class="ss"  style="width:40%;display:inline;float:left;" required >
            <datalist id="City">
                <option value="Ahmedabad"></option>
                <option value="Surat"></option>
                <option value="rajkot"></option>
                <option value="Vadodara"></option>
                <option value="Amreli"></option>
                <option value="others"></option>
            </datalist>
            <input type="number" value = "<?php echo $row['Age'];?>" style="width: 20%;float: left;" placeholder="Age"  name="age"required>
            <input type="text" value = "<?php echo $row['Username'];?>" style="width: 50%;" placeholder="Username"  name="username"required>
            <input type="text" value = "<?php echo $row['Password'];?>" placeholder="New password" name="pwd"required>
           

            <label style="float:left;"> Profile :</label> 
       <div class="image-photo">  <?php    echo '<img src="data:image;base64,'.base64_encode($row['Profile']).'" >'; ?></div>
            <br> <button name="Updateuser" class="update">Update</button>
            </form>
            </section>

<?php
          }
          //end of If in query
      }
      // end of conection else
?>
</body>
</html>