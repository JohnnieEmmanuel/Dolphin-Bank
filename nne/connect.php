

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "", "dolphin_bank");
 if($conn){
    echo '<script>console.log("connection successful");</script>';

 }
// Check connection
else{
    die(header("location:../pages-error.php?connection=failed"));
}

?>