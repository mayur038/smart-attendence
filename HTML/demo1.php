
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form>
            <?php
            session_start();
            if(isset($_COOKIE['demoname']))
            { ?>
                <input type="text" name="ss" value="<?php echo $_COOKIE['demoname']  ?>">
            <?php }
            else
            { ?>
                <input type="text" name="ss"/>
            <?php }
            ?>
       
    </form>
</body>
</html>