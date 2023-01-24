<?php
    include "connect.php";

    session_start();
    session_destroy();

    if (isset($_GET['sessionExpired'])) {
        echo '<script> window.location.replace("../pages-error.php?sessionExpired=true"); </script>';
    }
    else {
        header("location:auth/signin.php");        
    }
?>
