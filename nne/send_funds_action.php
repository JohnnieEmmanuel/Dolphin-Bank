<?php
    include "validate_customer.php";
    include "header.php";
    include "connect.php";
    include "verify_beneficiary.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

 
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
     if (isset($_SESSION['loggedIn_cust_id']) && isset($_POST['amt'])) {
        $sender_id = $_SESSION['loggedIn_cust_id'];
        $_bfname_ = $_GET['beneficiary'];

    }else{
        echo '<script> window.location.replace("send_funds.php?beneficiary='.$_GET['beneficiary'].'"); </script>';
    }

    $sender_id = $_SESSION['loggedIn_cust_id'];
    $amt = mysqli_real_escape_string($conn, $_POST["amount"]);
    $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $_beneficiary_account = mysqli_real_escape_string($conn, $_POST["acno"]);
    $_beneficiary_name = mysqli_real_escape_string($conn, $_POST["receipient_name"]);
    $_beneficiary_routing_number = mysqli_real_escape_string($conn, $_POST["routing_no"]);
    $_beneficiary_bank_name= mysqli_real_escape_string($conn, $_POST["bank_name"]);

    
    $_testdate = mysqli_real_escape_string($conn, $_POST["testdate"]);
    $balance = $_SESSION['balance'];

    

    if ($amt > $balance){
         echo "<script> alert('insufficient balance');</script>";
         echo '<script> window.location.replace("send_funds.php?beneficiary='.$_GET['beneficiary'].'"); </script>';
    }else{

        echo "Balance : ". $balance."<br/>";
        echo "Amount : ".$amt."<br/>";
        $remaining_Balance = ($balance-$amt);
        echo "remaining Balance : ".$remaining_Balance;
        echo "Beneficiary Name:" .$_beneficiary_name;
        echo "Beneficiary Account:" .$_beneficiary_account;
         
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id." AND pwd='".$password."'";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();


    if (($result0->num_rows) > 0) {

$description="Sent ".$amt." To:" .$_beneficiary_name."   Acct".$_beneficiary_account;
    echo $description;
    $zero = 0;
    $cust_insert_query= "INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`, `customer_id`) VALUES (NULL, '$_testdate', '$description', '$amt', NULL, '$remaining_Balance', '$sender_id');"; 
    $cust_result = $conn->query($cust_insert_query);


    // Attempt insert query execution
 $update_beneficiary ="UPDATE beneficiary1 SET beneficiary_balance=(beneficiary_balance+'$amt') WHERE benef_cust_id='$_bfname_' AND  customer_id='$sender_id'" ;
 $beneficiary_result = $conn->query($update_beneficiary);



 
    if($cust_result && $beneficiary_result){
 
   echo '<div class="flex-item">
           <table >
            <tr style="width:300px;">
                   <caption><img src="images/trsu.png" style="height: 90px; " alt="Transfer Successful"></caption>
               </tr>
               <tr>
                   <caption style="float:center;"><h2>Transfer successful</h2></caption>
                   <caption style="width:300px;"> <?php echo" Sent To: '.$_beneficiary_name.' Account Number: '.$_beneficiary_account.'  ";?></caption>

               </tr>
                 

            
           </table>
        </div>

         
 <div class="benef_box" style=" border:4px solid black; border-color: blue; border-radius: 4px; padding: 10px; margin: 10px;">
            <strong style="font-size:20px;"><p> Amount: [$'.$amt.'] </p> <p >Sent To: ['. strtoupper($_beneficiary_name).']</p> <p> Account Number: ['.$_beneficiary_account.'] </p><p> Routing Number:  </p><p> Bank Name:  </p> <p> Transaction Date: ['.$_testdate.' ]</p></strong>
        </div>

        <div class="flex-item">
            <a href="beneficiary.php" class="button">Go Back</a>
        </div>
    </div>';

} 
else{
     echo '
         <div class="flex-container">
             <div class="flex-item">
           <table >
            <tr style="width:300px;">
                   <caption><img src="images/danger.png" style="height: 90px; " alt="Invalid Transaction, Please try again"></caption>
               </tr>
               <tr>
                   <caption style="width:300px; color:red;"><h2>Invalid Transaction Try Again</h2> 

                   </caption>
               </tr>
           </table>
        </div>
                
        <div class="flex-item">
            <a href="beneficiary.php" class="button">Go Back</a>
        </div>
        <p id="info">Send to Beneficiaries.</p>
    </div>';
}
    }
    else{
         echo '

         <div class="flex-container">
         <div class="flex-item" style="position:center; margin-left:45px; ">
           <table >
            <tr style="width:300px;">
                   <caption><img src="images/danger.png" style="height: 90px; " alt="Invalid Password"></caption>
               </tr>
               <tr>
                   <caption style="width:300px; color:red;"><h2>Invalid Password!! <br>Please Try Again</h2> 
                   </caption>
               </tr>
                 

            
           </table>
        </div>
';
    
 

        echo '
        <div class="flex-item">
            <a href="beneficiary.php" class="button">Go Back</a>
        </div>
       
    </div>';

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">


<style type="text/css">
    table, tr, td{
        border: 2px solid black;
        border-collapse: collapse; 
        color: black; 
        padding:6px; 
        text-align: center; 
    }
</style>
</head>

<body>
  
</body>
</html>
