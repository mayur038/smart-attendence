<?php
     $server = "localhost";
     $username = "if0_36811992";
     $password = "ifmayu1512";
     $database = "phpproj";
    $con = mysqli_connect($server,$username,$pwd,$db);
    if(!$con)
    {
        echo mysqli_error($con);
    }
    else
    {
        session_start();
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Department.css">
    <link rel="stylesheet" href="../Css/index.css">
    <title>Departments</title>
    <style>
        body
        {
            background:#C2FFF9;
            font-family: 'Montserrat', sans-serif;
        }
        .graph
        {
            background:#142F43;
        }
        #navigation a
        {
            letter-spacing:0px;
        }
.dept-container
{
    text-align:center;
    background: linear-gradient(145deg, #dfdfe6, #ffffff);
box-shadow:  5px 5px 11px #d5d5db,
             -5px -5px 11px #ffffff;

}
.dept-container:hover
{
    background:#34BE82;
}
.dept-container h2
{
    font-size:35px;
    margin:20% 0;
    font-family: 'Montserrat', sans-serif;
    letter-spacing:1px;
    text-transform:capitalize;
}
.depphp
{
     width:95%;
     height:auto;
     margin:40px auto;
    
}
.depphp h1
{
    text-align:center;
    letter-spacing:1px;
    color: #700B97;
}

.result-container
{
    margin: 10px 5px;
}
.graph-container
{
    width:96%;
    margin:3% 3%;

}
.result H4
{
    color:#700B97; 
    font-family: 'Montserrat', sans-serif;
    text-decoration:underline;
}
.process
{
    background:#00ADB5;
}
.text
{
    color:white;
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
                    echo "<a href='home.php?log=15'>Home</a>"; 
                }
                else
                {
                    echo "<a href='home.php'>Home</a>";
                }
            ?>
            
            <a href="Department.php"class="Active">Department</a>
            <a href="About.html">About</a>
            <a href="contactus.html">Contact</a>
            <a href="../php/help.php">Help</a>
        </div>
    </section>
    <section class="head">
      
    </section>
    <section class="depphp">
        <h1>Departments </h1>
        
        <?php
            $query = "SELECT DISTINCT `Department` FROM student;";
            $query_run = mysqli_query($con,$query);
            if( ! $query_run)
            {
                echo mysqli_error($con);
            }
            else
            {
                $tot_d = mysqli_num_rows($query_run);

                if($tot_d > 0)
                {
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                        <div class="dept-container">
                        <h2> <?php echo $row['Department']; ?> </h2>
                    </div>
                        <?php
                    }
                }
                else
                {
                    
                }
            }
        
        ?>
    </section>
    
    <section class="result">
        <H4>Attendence result</H4>
        <div class="graph">

            <div class="graph-container">


            <div class="result-container">
                <!-- Computer Average   -->
            <?php
        $com_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'computer'";
        $com_tot_run = mysqli_query($con,$com_tot_query);
        $com_tot_days = mysqli_num_rows($com_tot_run); 

        if(!$com_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $com_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'computer'";
        $com_std_run = mysqli_query($con,$com_tot_std_qry);

        if (! $com_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
        while($row = mysqli_fetch_array($com_std_run))
        {
           $com_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
            $com_len = count($com_students);
        for ($i=0; $i < $com_len ; $i++) { 
            $p_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$com_students[$i]' AND `status` = 'Present';";
            $p_days_query = mysqli_query($con,$p_days);
            $com_pdays = mysqli_num_rows($p_days_query);
            $com_avg[$i] =( $com_pdays / $com_tot_days ) * 100 ;
            
        }    
        // for loop close       
        $com_tmp_avg = array_sum($com_avg);
        $com_avg = $com_tmp_avg / $com_len;
        // final computer department average    
    }   
        // close of else loop line 187
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php $com_avg ?>%;">

                </div>
                <div class="text">
                    <label>computer</label>
                </div>
            </div>

            <div class="result-container">
                <!-- I.T Average   -->
            <?php
        $it_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'I.T'";
        $it_tot_run = mysqli_query($con,$it_tot_query);
        $it_tot_days = mysqli_num_rows($it_tot_run); 

        if(!$it_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $it_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'I.T'";
        $it_std_run = mysqli_query($con,$it_tot_std_qry);

        if (! $it_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
        while($row = mysqli_fetch_array($it_std_run))
        {
           $it_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
            $it_len = count($it_students);
        for ($i=0; $i < $it_len ; $i++) { 
            $p_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$it_students[$i]' AND `status` = 'Present';";
            $p_days_query = mysqli_query($con,$p_days);
            $it_pdays = mysqli_num_rows($p_days_query);
            $it_avg[$i] =( $it_pdays / $it_tot_days ) * 100 ;
            
        }    
        // for loop close       
        $it_tmp_avg = array_sum($it_avg);
        $it_avg = $it_tmp_avg / $it_len;
        // final computer department average    
    }   
        // close of else loop line 187
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo $it_avg; ?>%;">
                </div>
                <div class="text">
                    <center>    <label>I.T</label>  </center>
                </div>
            </div>

            <div class="result-container">
                  <!-- Civil Average   -->
            <?php
        $civil_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'civil'";
        $civil_tot_run = mysqli_query($con,$civil_tot_query);
        $civil_tot_days = mysqli_num_rows($civil_tot_run); 

        if(!$civil_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $civil_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'civil'";
        $civil_std_run = mysqli_query($con,$civil_tot_std_qry);

        if (! $civil_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
        while($row = mysqli_fetch_array($civil_std_run))
        {
           $civil_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
            $civil_len = count($civil_students);
        for ($i=0; $i < $civil_len ; $i++) { 
            $p_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$civil_students[$i]' AND `status` = 'Present';";
            $p_days_query = mysqli_query($con,$p_days);
            $civil_pdays = mysqli_num_rows($p_days_query);
            $civil_avg[$i] =( $civil_pdays / $civil_tot_days ) * 100 ;
            
        }    
        // for loop close       
        $civil_tmp_avg = array_sum($civil_avg);
        $civil_avg = $civil_tmp_avg / $civil_len;
        // final computer department average    
    }   
        // close of else loop line 187
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo  $civil_avg ;?>%;">  
                </div>
                <div class="text">
                 <center>   <label>civil</label></center>
                </div>
            </div>

            <div class="result-container">
                 <!-- EC Average   -->
            <?php
        $ec_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'Ec'";
        $ec_tot_run = mysqli_query($con,$ec_tot_query);
        $ec_tot_days = mysqli_num_rows($ec_tot_run); 

        if(!$ec_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $ec_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'Ec'";
        $ec_std_run = mysqli_query($con,$ec_tot_std_qry);

        if (! $ec_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
        while($row = mysqli_fetch_array($ec_std_run))
        {
           $ec_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
            $ec_len = count($ec_students);
        for ($i=0; $i < $ec_len ; $i++) { 
            $p_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$ec_students[$i]' AND `status` = 'Present';";
            $p_days_query = mysqli_query($con,$p_days);
            $ec_pdays = mysqli_num_rows($p_days_query);
            $ec_avg[$i] =( $ec_pdays / $ec_tot_days ) * 100 ;
            
        }    
        // for loop close       
        $ec_tmp_avg = array_sum($ec_avg);
        $ec_avg = $ec_tmp_avg / $ec_len;
        // final computer department average    
    }   
        // close of else loop line 187
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo $ec_avg; ?>%;">
        
                </div>
                <div class="text">
                    <center>    <label>E.C</label>  </center>
                </div>
            </div>

            <div class="result-container">
                 <!-- Auto mobile Average   -->
            <?php
        $at_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'automobile'";
        $at_tot_run = mysqli_query($con,$at_tot_query);
        $at_tot_days = mysqli_num_rows($at_tot_run); 

        if(!$at_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $at_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'automobile'";
        $at_std_run = mysqli_query($con,$at_tot_std_qry);
        $cond = mysqli_num_rows($at_std_run);
        if($cond > 0)
        {
        if (! $at_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
            $at_students = array();
        while($row = mysqli_fetch_array($at_std_run))
        {
           $at_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
        
            $at_len = count($at_students);
        for ($i=0; $i < $at_len ; $i++) { 
            $p_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$at_students[$i]' AND `status` = 'Present';";
            $p_days_query = mysqli_query($con,$p_days);
            $at_pdays = mysqli_num_rows($p_days_query);
            $at_avg[$i] =( $at_pdays / $at_tot_days ) * 100 ;
            
        }    
        // for loop close     

        $at_tmp_avg = array_sum($at_avg);
        $at_avg = $at_tmp_avg / $at_len;
        // final computer department average    
    }   
        // close of else loop line 187
} 
    else{
        $at_avg = 02;
    }
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo $at_avg; ?>%;">

                </div>
                <div class="text">
                    <center>    <label>Automobile</label>  </center>
                </div>
            </div>

            <div class="result-container">
                <!-- Plastic Average   -->
            <?php
        $p_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'Plastic'";
        $p_tot_run = mysqli_query($con,$p_tot_query);
        $p_tot_days = mysqli_num_rows($p_tot_run); 

        if(!$p_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $p_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'Plastic'";
        $p_std_run = mysqli_query($con,$p_tot_std_qry);
        $cond = mysqli_num_rows($p_std_run);
        if($cond > 0)
        {
        if (! $p_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
            $p_students = array();
        while($row = mysqli_fetch_array($p_std_run))
        {
           $p_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
        
            $p_len = count($p_students);
        for ($i=0; $i < $p_len ; $i++) { 
            $p_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$p_students[$i]' AND `status` = 'Present';";
            $p_days_query = mysqli_query($con,$p_days);
            $p_pdays = mysqli_num_rows($p_days_query);
            $p_avg[$i] =( $p_pdays / $p_tot_days ) * 100 ;
            
        }    
        // for loop close     

        $p_tmp_avg = array_sum($p_avg);
        $p_avg = $p_tmp_avg / $p_len;
        // final computer department average    
    }   
        // close of else loop line 187
} 
    else{
        $p_avg = 02;
    }
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo $p_avg; ?>%;">

                </div>
                <div class="text">
                    <center>    <label>Plastic</label>  </center>
                </div>
            </div>
            <div class="result-container">
                <!-- Mechanical Average   -->
            <?php
        $m_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'mechanical'";
        $m_tot_run = mysqli_query($con,$m_tot_query);
        $m_tot_days = mysqli_num_rows($m_tot_run); 

        if(!$m_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $m_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'mechanical'";
        $m_std_run = mysqli_query($con,$m_tot_std_qry);
        $cond = mysqli_num_rows($m_std_run);
        if($cond > 0)
        {
        if (! $m_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
            $m_students = array();
        while($row = mysqli_fetch_array($m_std_run))
        {
           $m_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
        
            $m_len = count($m_students);
        for ($i=0; $i < $m_len ; $i++) { 
            $m_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$m_students[$i]' AND `status` = 'Present';";
            $m_days_query = mysqli_query($con,$m_days);
            $m_pdays = mysqli_num_rows($m_days_query);
            $m_avg[$i] =( $m_pdays / $m_tot_days ) * 100 ;
            
        }    
        // for loop close     

        $m_tmp_avg = array_sum($m_avg);
        $m_avg = $m_tmp_avg / $m_len;
        // final computer department average    
    }   
        // close of else loop line 187
} 
    else{
        $m_avg = 02;
    }
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo $m_avg; ?>%;">

                </div>
                <div class="text">
                    <center>    <label>Mechanical</label>  </center>
                </div>
            </div>
            <div class="result-container">
                 <!-- Bio-Medical Average   -->
            <?php
        $b_tot_query = "SELECT DISTINCT `date` FROM `attendence` WHERE `department` = 'bm'";
        $b_tot_run = mysqli_query($con,$b_tot_query);
        $b_tot_days = mysqli_num_rows($b_tot_run); 

        if(!$b_tot_run)
        {
            echo mysqli_error($con);
        }
        else
        {
        $b_tot_std_qry = "SELECT DISTINCT `Enrollment` FROM `student` WHERE `Department` = 'bm'";
        $b_std_run = mysqli_query($con,$b_tot_std_qry);
        $cond = mysqli_num_rows($b_std_run);
        if($cond > 0)
        {
        if (! $b_std_run)
        {
            echo mysqli_error($con);
        }
        else
        {
            $i = 0;   
            $b_students = array();
        while($row = mysqli_fetch_array($b_std_run))
        {
           $b_students[$i] = $row['Enrollment'];
           $i = $i + 1;
        }
        
            $b_len = count($b_students);
        for ($i=0; $i < $b_len ; $i++) { 
            $b_days = "SELECT DISTINCT `date` FROM `attendence` WHERE `Enrollment` = '$b_students[$i]' AND `status` = 'Present';";
            $b_days_query = mysqli_query($con,$b_days);
            $b_pdays = mysqli_num_rows($b_days_query);
            $b_avg[$i] =( $b_pdays / $b_tot_days ) * 100 ;
            
        }    
        // for loop close     

        $b_tmp_avg = array_sum($b_avg);
        $b_avg = $b_tmp_avg / $b_len;
        // final computer department average    
    }   
        // close of else loop line 187
} 
    else{
        $b_avg = 02;
    }
}
    // close of else line 178
    ?>
                <div class="process" style="height: <?php echo $b_avg;?>%;">

                </div>
                <div class="text">
                    <center>    <label>Bio</label>  </center>
                </div>
            </div>
        
        </div>
        </div>
    </section>
</body>
</html>
<?php 
    }
?>