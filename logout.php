
<?php

session_start();
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
}

header("Location: http://54.169.136.72/app/login.php");


?>