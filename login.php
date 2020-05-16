<?php
    if (isset( $_POST['login'])) { 
        $errormsg = [];
        if (empty($_POST['username'])) {
            $errormsg[] = "Please input a username";
        }

        if (empty($_POST['password'])) {
            $errormsg[] = "Please input a password";
        }
        
        if (!empty($errormsg)) { 
            echo " <ul > ";
            foreach ($errormsg as $msg) { 
                echo "<li>$msg</li>";
            }
            echo "</ul> ";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!--Log in , authenticate , register -->
    <form action="login.php" method = "POST">
        <label for="uname">First name:</label><br>
        <input type="text" id="uname" name="username" placeholder="username"><br>
        <label for="pwd">password:</label><br>
        <input type="password" id="pwd" name="password" ><br><br>
        <input type="submit" value="Submit" name ="login">
    </form> 

</body>
</html>