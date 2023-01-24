<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);

    $sql0 =  "SELECT * FROM customer WHERE email='".$email."' AND pwd='".$pwd."'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();

    if (($result->num_rows) > 0) {
        $_SESSION['loggedIn_cust_id'] = $row["cust_id"];
        $_SESSION['isCustValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:../dashboard.php");
    }
    else if($uname == "" && $pwd == ""){
        session_destroy();
        die(header("location:../auth/signin.php"));
    }
    else {
        session_destroy();
        die(header("location:../auth/signin.php?loginFailed=true"));
    }
?>
