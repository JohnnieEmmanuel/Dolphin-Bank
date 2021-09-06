<?php
    include "nne/validate_customer.php";
    include "nne/connect.php";
    include "nne/session_timeout.php";


     if (isset($_SESSION['loggedIn_cust_id']) ) {
        $sender_id = $_SESSION['loggedIn_cust_id'];
   

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id."";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM beneficiary1 WHERE customer_id=".$sender_id."";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
   
     $sql3 = "SELECT * FROM passbook1 WHERE customer_id=".$sender_id." ORDER BY trans_id DESC LIMIT 1";
    $result3 = $conn->query($sql3);
     $row3 = $result3->fetch_assoc();
    $sender_balance = $row3['balance'];
       
    $sender_password = $row0['pwd'];
    
 
     $amt = mysqli_real_escape_string($conn, $_POST["amount"]);
     $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
     $_beneficiary_account = mysqli_real_escape_string($conn, $_POST["account_number"]);
     $_beneficiary_name = mysqli_real_escape_string($conn, $_POST["receipient_name"]);
     $_beneficiary_routing_number = mysqli_real_escape_string($conn, $_POST["routing_number"]);
     $_beneficiary_bank_name= mysqli_real_escape_string($conn, $_POST["bank_name"]);
     $tdescription= mysqli_real_escape_string($conn, $_POST["description"]);
     
   
     if ($sender_password != $password){
     
       echo '<script> window.location.replace("pages-error.php?transfer=invalidpassword"); </script>';

         
         if ($amt > $sender_balance){
           
       echo '<script> window.location.replace("pages-error.php?transfer=insufficient"); </script>';

        }
     }
        
     else{
 
         $remaining_Balance = $sender_balance - $amt;
     
   
         $description="Cash Transfer";
         $counter = 0;
         $transfer;
         date_default_timezone_set($_COOKIE['offset']);
         
         $date = date('Y-m-d h:i:s', time());

         
         $cust_insert_query= "INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`, `customer_id`,`trans_beneficiary`)
          VALUES (NULL, '$date', '$description', '$amt','$counter' , '$remaining_Balance', '$sender_id', '$_beneficiary_name');"; 
         $cust_result = $conn->query($cust_insert_query);

         if($cust_result){
            $counter =$counter + 1;
         
         }


         $sql_u = "SELECT * FROM beneficiary1 WHERE  account_no='$_beneficiary_account' AND fullname='$_beneficiary_name' AND customer_id='$sender_id'";       
         $res_u = mysqli_query($conn, $sql_u);

       
   
         if (mysqli_num_rows($res_u) > 0) {
        
        // Attempt insert query execution
      $update_beneficiary ="UPDATE beneficiary1 SET beneficiary_balance=(beneficiary_balance + '$amt' ) WHERE account_no='$_beneficiary_account' AND fullname='$_beneficiary_name'" ;
      $beneficiary_result = $conn->query($update_beneficiary);
       echo '<script>console.log("e work");</script>';
       $counter =$counter + 1;
         }

         else{
          $sq=  "INSERT INTO `beneficiary1` (`benef_cust_id`, `fullname`, `account_no`, `routing_number`, `customer_id`, `beneficiary_balance`, `trans_description`, `bank_name`) VALUES (NULL, '$_beneficiary_name', '$_beneficiary_account', '$_beneficiary_routing_number', '$sender_id', '$amt', '$tdescription','$_beneficiary_bank_name')";               
        $nn = mysqli_query($conn,$sq);
        if($nn){
        echo '<script>console.log("...!... sent ");</script>';
         $counter =$counter + 1;
            
        } 
         }

         if($counter > 1 ){
            
   
        echo '<script> window.location.replace("pages-error.php?transfer=success"); </script>';
         }
         else{
           
       echo '<script> window.location.replace("pages-error.php?transfer=failed"); </script>';
        

         }
        //  chectit .......................
         
//  check out ..................
 }
    }else{
       echo '<script> window.location.replace("pages-error.php?transfer=failed"); </script>';


    }

 
    
    // end line
    

    
?>


