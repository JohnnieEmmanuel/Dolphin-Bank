<?php
    include "nne/validate_customer.php";
    include "nne/connect.php";
    include "nne/session_timeout.php";

 
$no = 1;
echo '<style type="text/css">
    table, tr, td{
        border: 2px solid black;
        border-collapse: collapse; 
        color: black; 
        padding:6px; 
        text-align: center; 
    }
</style>';

$success = $conn;
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
    echo "yes" . $sender_balance ."<br/>";
 
 
     $amt = mysqli_real_escape_string($conn, $_POST["amount"]);
     $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
     $_beneficiary_account = mysqli_real_escape_string($conn, $_POST["account_number"]);
     $_beneficiary_name = mysqli_real_escape_string($conn, $_POST["receipient_name"]);
     $_beneficiary_routing_number = mysqli_real_escape_string($conn, $_POST["routing_number"]);
     $_beneficiary_bank_name= mysqli_real_escape_string($conn, $_POST["bank_name"]);
     $tdescription= mysqli_real_escape_string($conn, $_POST["description"]);
     
     
     $_testdate = mysqli_real_escape_string($conn, $_POST["testdate"]);
    
 
     
     if ($sender_password != $password){
         echo "<script> alert('Incorrect Password. Try Again!');</script>";
         echo '<script> window.location.replace("cash-transfer.php"); </script>';
         
         if ($amt > $sender_balance){
             echo "<script> alert('insufficient balance');</script>";
             echo '<script> window.location.replace("cash-transfer.php"); </script>';
        }
     }
        
     else{
 
         echo "Balance : ". $sender_balance."<br/>";
         echo "Amount : ".$amt."<br/>";
         $remaining_Balance = $sender_balance - $amt;
         echo "remaining Balance : ".$remaining_Balance ."<br/>";
         echo "Beneficiary Name:" .$_beneficiary_name ."<br/>";
         echo "Beneficiary Account number:" .$_beneficiary_account ."<br/>";
         echo "Beneficiary routing number:" .$_beneficiary_routing_number ."<br/>";
         echo "Beneficiary bank name:" .$_beneficiary_bank_name ."<br/>";
         echo "Beneficiary transaction description:" .$tdescription ."<br/>";
       
 
         // start line
   
         $description="Cash Transfer";
         echo $description;
         $counter = 0;
   
         $cust_insert_query= "INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`, `customer_id`,`trans_beneficiary`)
          VALUES (NULL, '$_testdate', '$description', '$amt','$counter' , '$remaining_Balance', '$sender_id', '$_beneficiary_name');"; 
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
    //      else  if (mysqli_num_rows($res_u) <= 0){

              
    // //  $beneficiary_insert = "INSERT INTO beneficiary1 ('fullname', 'account_no', 'routing_no','customer_id','beneficiary_balance','trans_description' )
    // //  VALUES ( '$_beneficiary_name', '$_beneficiary_account', '$_beneficiary_routing_number','$sender_id', '$amt','$tdescription');"; 
    // //      $benef_insert = $conn->query($beneficiary_insert);
            
        //  }
         else{
          $sq=  "INSERT INTO `beneficiary1` (`benef_cust_id`, `fullname`, `account_no`, `routing_number`, `customer_id`, `beneficiary_balance`, `trans_description`, `bank_name`) VALUES (NULL, '$_beneficiary_name', '$_beneficiary_account', '$_beneficiary_routing_number', '$sender_id', '$amt', '$tdescription','$_beneficiary_bank_name')";               
        $nn = mysqli_query($conn,$sq);
        if($nn){
        echo '<script>console.log("Fuck it");</script>';
         $counter =$counter + 1;
            
        } 
         }

         if($counter > 1){
            
         echo "<script> alert('Transaction Successful');</script>";
        //  echo '<script> window.location.replace("dashboard.php"); </script>';
         }
         else{
            echo "<script> alert('Transaction failed, Try Again Later!!');</script>";
         }
        //  chectit .......................
         
//  check out ..................
 }
    }else{
        echo '<script> window.location.replace("dashboard.php"); </script>';

    }

 
    
    // end line
    

    
?>
