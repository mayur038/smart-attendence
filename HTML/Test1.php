<?php 
include 'connect.php';
    if($_SESSION['connect'] == 1)
    {

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Hola</title>
</head>
<body>
    <!-- source.unsplash.com -->
    <header>
        <div class="logo">
           <img src="../images/developer.png" alt="">
        </div>
        <div class="links">
            <a href="#">home</a>
            <a href="#">Join</a>
            <a href="#">contact</a>
            <a href="#">help</a>
            
        </div>
        <div class="users">
            <?php
                if(isset($_SESSION['uid']))
                {
                    $uid = $_SESSION['uid'];
                    $u_display_q = "select profile from users where uid = 1 ";
                    $u_display = mysqli_query($con,$u_display_q);
                    $row = mysqli_fetch_array($u_display);

                    echo '<img src="data:image;base64,'.base64_encode($row['profile']).'">';
                }
                else{ ?>
                    <img src="../images/ab4.JPG" alt="">
                <?php }
            ?>  
        </div>
    </header>
    <section class="main"> 
        <div class="center">
        <h1>Hola LDtes</h1>
        <h2>Namaste People Hackathon is on now participate with your team..</h2>
        <form action="">
            <button>Participate now</button>
            <a href="#">Join as Member</a>
        </form>
        </div> 

    </section>
    <section class="features">
        <?php 
            $lteams = "SELECT * FROM teams";
            $rteams = mysqli_query($con,$lteams);
            
            while( $data = mysqli_fetch_array($rteams))
            {
                $i = 1;
                if($i < 3)
                { ?>
                     <div class="box">
                        <img src="" alt="">
                        <h3><?php echo $data['name']; ?></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#">more</a>
                     </div>
        <?php       $i = $i + 1;
                }
            }

        ?>
        <!-- <div class="box">
            <img src="" alt="">
            <h3>Feature 1</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#">more</a>
        </div>
        <div class="box">
            <img src="" alt="">
            <h3>Feature 1</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#">more</a>
        </div>
        <div class="box">
            <img src="" alt="">
            <h3>Feature 1</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#">more</a>
        </div>
        <div class="box">
            <img src="" alt="">
            <h3>Feature 1</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#">more</a>
        </div> -->
    </section>
    <section class="info">
        <div class="card">
            <h3>Teams Participated</h3>
            <p>299+</p>
        </div>
        <div class="card">
            <h3>Prize Pool</h3>
            <p>10,00,000 INR</p>
        </div>
        <div class="card">
            <h3>Sponsered Companies</h3>
            <p>29+</p>
        </div>
    </section>
    <footer>
        <div class="left">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Contact</a>
            <a href="#">Help</a>
            <a href="#">Join now</a>
            <a href="#">Features</a>
        </div>
        <div class="right">
            <form action="connect.php" method="post" >
                <h2>Leave A reply</h2>
                <input type="text" name="name" placeholder="email">
                <textarea name="message" placeholder="message" id="" cols="30" rows="10"></textarea>
                <button name="send">Send</button>
            </form>
            <div class="social">
                <a href=""><img src="../images/facebook.png" alt=""></a>
                <a href=""><img src="../images/twit.png" alt=""></a>
                <a href=""><img src="../images/instagram.png" alt=""></a>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
    }
?>