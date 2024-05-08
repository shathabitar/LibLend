<?php
    session_start();
    if (isset($_SESSION['LogIn']) && isset( $_SESSION['Password'])){
        unset($_SESSION["LogIn"]);
        unset($_SESSION["Password"]);
    }

    session_destroy();
    header("Location: index.php");

?>