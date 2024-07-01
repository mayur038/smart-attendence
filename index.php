<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gp | Home</title>
    <link rel="stylesheet" href="../Css/index.css">
   <style>
body
{
    background-color: #222831;
}
#navigation a
{
    letter-spacing:0;
    font-family: 'Montserrat', sans-serif;
    font-weight:500;
}
.nav
{
    box-shadow: none;
}
.container
{
    box-shadow:  36px 36px 72px #1b2027,
    -36px -36px 72px #29303b;
}
.form h3
{
    color: #00ADB5;
}
.form input
{
    background-color: none;
    color: #EEEEEE;
    overflow: hidden;
} 
.form input:focus
{
    color: #00ADB5;
}
.ud img
{
    filter: invert(50%);
}
form label
{
    color: #EEEEEE;
}
p
{
    background-color:#393E46 ;
    color: #EEEEEE;
}
   </style>
</head>
<body>
    <section class="nav">
        <div class="secnav" id="logo">
            <img src="../images/color.png">
        </div>
        <div class="secnav" id="navigation">
            <a href="home.php" class="Active">Home</a>
            <a href="Department.php">Department</a>
            <a href="About.html">About</a>
            <a href="contactus.html">Contact</a>
            <a href="../Php/help.php">Help</a>
        </div>
    </section>
    
    <section class="container">
        <div class="form">
            <form method="POST" action="../php/projectconnect.php">
                <h3>Log In</h3>
            <div class="ud"> <img src="../images/user.svg">  <input type="text" style="background-color: none;" placeholder="Username" name="username"  required><br></div>
            <div class="ud"><img src="../images/lock.svg">  <input type="password" placeholder="password" name="password" value = "<?php if(isset($_COOKIE['Password']))
            {
                echo $_COOKIE['Password'];
            }
          ?>" required><br></div>
              <button name="submit">Log In</button>
              <a href="#">Forgot password ?</a><br>
             <label>Don't Have an account !</label> <a href="Account.html" id="ca"> create account.</a>
            </form>
        </div>   
        <div class="image">
            
        </div>
    </section>
    <p>Government polytechnic Ahmedabad | copyright @ 2021.com</p>
</body>
</html>
<?php
if(isset($_COOKIE['Username']))
{
    $username = $_COOKIE['Username'];
    echo "<script> 

    document.getElementById('Username').value = '$username';
    
    </script>
       
    ";
    echo "script executed";
    
}
if(isset($_GET['rn']))
{
    echo "<script> alert('invalid username password');
    
    </script>
       
    ";
}

?>