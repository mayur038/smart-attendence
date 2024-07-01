<?php
 
 $server = "localhost";
 $username = "if0_36811992";
 $password = "ifmayu1512";
 $database = "phpproj";

 $con = mysqli_connect($server,$username,$password,$database);
 if(!$con)
 {
     echo mysqli_error($con);
 }
 else
 {

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help | Attendence</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap');
body
        {
            margin:0;
            padding:0;
            background:#112031;
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
    letter-spacing: 0px;
    font-size: 20px;
    text-transform: capitalize;
    position: relative;
    text-decoration: none;
    margin: 0% 4%;
    right: 0%;
    padding: auto;
    background-color: white;
    font-family: 'Montserrat', sans-serif;
    font-weight:900;
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
.banner
{
    height:40%;
    width:100%;
    background-image:url(../images/helpbnr.jpg);
    background-size:cover;
    background-position:top;
    margin:0;
    padding:0;
    overflow:hidden;    
    opacity: 0.6;
}
.banner h1
{
    width:100%;
    text-align:left;
    margin:12% 4%;
    letter-spacing:6px;
    color:white;
    font-family: 'El Messiri', sans-serif;

    font-size:70px;
}
.layout {
  width: 600px;
  margin: auto;
}
.accordion {
  padding: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  background: rgb(105, 206, 105);
  border-radius: 10px;
}
.accordion__question p {
  margin: 5px;
  padding: 0;
  font-family: Verdana;
  font-size: 20px;
}
.accordion__answer p {
  margin: 5px;
  padding: 10px;
  font-size: large;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  color: rgb(255, 255, 255);
  background: rgb(82, 170, 122);
  border-radius: 10px;
}
.accordion:hover {
  cursor: pointer;
}
.accordion__answer {
  display: none;
}
.accordion.active .accordion__answer {
  display: block;
}
.recentsuggest
{
    margin: 0%;
    width: 100%;
    height: auto;
    text-align: center;
    overflow: hidden;
}
.recentsuggest h5
{
    margin: 18px 0;
    color: whitesmoke;
    font-size: 26px;
    letter-spacing: 4px;
    font-family: 'El Messiri', sans-serif;
    overflow: hidden ;
}
.suggest
{
    width: 31%;
    background-color: rgba(255, 255, 255, 0.315);
    height: auto;
    display: inline-block;
    margin: 10px 10px;
    margin-bottom: 10px;
    text-align: left;
    border-radius: 17px;   
    font-family: 'Montserrat', sans-serif; 
    overflow: hidden;
    
}
.suggest:hover
{
  transform: scale(1.1);
  transition:0.5s all;
  cursor:pointer;
  background:black;
  color:white;
  opacity: 0.6;
}
.suggest h2{
    
    text-align: center;
    font-weight:900;
}
.suggest p
{
    height: auto;
    text-align: justify;
    width: 95%;
    margin: 3px auto;

}
.suggest h4
{
   
    width: 90%;
    text-align: right;
    margin: 7px 10px;
    overflow: hidden;
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
                    echo "<a href='../html/home.php?log=15' >Home</a>"; 
                }
                else
                {
                    echo "<a href='../html/home.php'>Home</a>";
                }
            ?>
            <a href="../html/Department.php">Department</a>
            <a href="../html/About.html">About</a>
            <a href="../html/contactus.html" >Contact</a>
            <a href="help.php" class='Active' >Help</a>
        </div>
    </section> 
    <section class="banner">
        <h1>Let's Talk </h1>
</section>  
<section class="qna">
            <h2 style="color:#FF5677;letter-spacing:3px;font-family: 'El Messiri', sans-serif;     text-align:center">
               Frequently Asked Questions
              </h2>
              <div class="layout">
                <div class="accordion">
                  <div class="accordion__question">
                    <p>How To Use This Software?</p>
              
                  </div>
                  <div class="accordion__answer">
                    <p>To Use this software You just have to go on <a href="../HTML/About.html" >About Page</a> and read The block , how It works and you will Understand easily. </p>
                  </div>
                </div>
              
                <div class="accordion">
                  <div class="accordion__question">
                    <p>Can Student use this software?</p>
                  </div>
              
                  <div class="accordion__answer">
                    <p>
                      No , Student can't Use this software because this software i made for taking attendence of student by faculty or other staff members.
                    </p>
                  </div>
                </div>

                <div class="accordion">
                    <div class="accordion__question">
                      <p> How to get password if You forgot ?</p>
                    </div>
                
                    <div class="accordion__answer">
                      <p>
                        Well , At this time we can't do anything we will provide facilities at advanced version of this software.
                      </p>
                    </div>
                  </div>

                  <div class="accordion">
                    <div class="accordion__question">
                      <p>How to contact To you or give feedback about this project.</p>
                    </div>
                
                    <div class="accordion__answer">
                      <p>
                        Just Go on <a href="../HTML/contactus.html">Contact Us</a> and fill The form. we will contact you in short time. 
                      </p>
                    </div>
                  </div>

                  <div class="accordion">
                    <div class="accordion__question">
                      <p>how can I Edit my Profile ?</p>
                    </div>
                
                    <div class="accordion__answer">
                      <p>
                        Just Go on <a href="../HTML/home.php">Home page</a> and login with your Id , Password and click on edit Profile button to edit Your Data. 
                      </p>
                    </div>
                  </div>
                  
              </div>
</section>
<?php
  $suggest = "SELECT * FROM `contact`;";
  $suggest_run = mysqli_query($con,$suggest);
    if(!$suggest_run)
    {
      echo mysqli_error();
    }
    else
    {
   
    
?>
<section class="recentsuggest">
    <h5>Recent suggestions</h5>
    <?php 
    $i = 0;
     while($row = mysqli_fetch_array($suggest_run))
     {
        if($i < 6)
        {

        
       ?>
        <div class="suggest">
        <h2><?php echo $row['name']; ?></h2>
        <p><?php echo $row['suggestion'];?></p>
        <h4><?php echo $row['date'];?></h4>
        </div>
       
       
       <?php
        }
        $i = $i + 1;
     }
    ?>
    
    <?php } ?>
</section>
</body>
</html>
<?php
 }
?>
<script>
    
let answers = document.querySelectorAll(".accordion");
answers.forEach((event) => {
  event.addEventListener("click", () => {
    if (event.classList.contains("active")) {
      event.classList.remove("active");
    } else {
      event.classList.add("active");
    }
  });
});
</script>