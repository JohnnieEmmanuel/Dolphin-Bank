<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

 $_custID = $_SESSION['loggedIn_cust_id'];
    $id = $_SESSION['loggedIn_cust_id'];
    $sql0 = "SELECT * FROM beneficiary1 WHERE customer_id='$id'" ;
    $result = $conn->query($sql0);



    $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
   
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $phone_no = mysqli_real_escape_string($conn, $_REQUEST['phone_number']);
    $account_no = mysqli_real_escape_string($conn, $_REQUEST['account_number']);
 
// Attempt insert query execution
 $sql1 ="INSERT INTO beneficiary1 (first_name, last_name,email,phone_no,account_no, customer_id) VALUES ('$first_name', '$last_name', '$email', '$phone_no', '$account_no','$_custID') ";


if(mysqli_query($conn, $sql1)){
 
  echo "<script> window.location.assign('beneficiary_added.php'); </script>";

} 
 
?>

