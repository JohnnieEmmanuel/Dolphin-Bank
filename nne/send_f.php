<?php
    include "validate_customer.php";
    include "header.php";
    include "connect.php";
    include "verify_beneficiary.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Transaction.
         1 = Insufficient Funds.
         2 = Wrong password entered. */
$no = 1;

     if (isset($_SESSION['loggedIn_cust_id'])) {
        $sender_id = $_SESSION['loggedIn_cust_id'];
        $_bfname_ = $_GET['_benef_first_name'];
    }

    $sender_id = $_SESSION['loggedIn_cust_id'];
    $amt = mysqli_real_escape_string($conn, $_POST["amt"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id." AND pwd='".$password."'";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql5 = "SELECT * FROM beneficiary1 WHERE customer_id=".$sender_id." AND benef_cust_id='$_bfname_' ";
    $result5 = $conn->query($sql5) ;
    $row5 = $result5->fetch_assoc();
    

    $sql1 = "SELECT balance FROM passbook".$sender_id." ";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $sender_balance = $row1["balance"];


    $sql2 = "SELECT beneficiary_balance FROM beneficiary".$no." ";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $receiver_balance = $row2["beneficiary_balance"];


    if ((($result0->num_rows) > 0) && (($result5->num_rows) > 0)) {
        $updated_sender_balance = $sender_balance - $amt;

        if($updated_sender_balance >= 0) {
            $updated_receiver_balance = $receiver_balance + $amt;

            $sql3 = "INSERT INTO passbook".$sender_id." VALUES(
                        NULL,
                        NOW(),
                        'Sent to: ".$row5["first_name"]." ".$row5["last_name"].", AC/No: ".$row5["account_no"]."',
                        '$amt',
                        '0',
                        '$updated_sender_balance'
                    )";

            $sql4 = "INSERT INTO beneficiary".$no." VALUES(
                        NULL,
                        NULL,
                        NULL,
                        NULL,
                        NULL,
                        NULL,
                        '$updated_receiver_balance',
                        'Received from: ".$row0["first_name"]." ".$row0["last_name"].", AC/No: ".$row0["account_no"]."'
                    )";

            if (($conn->query($sql3) === TRUE) && ($conn->query($sql4) === TRUE)) {
                $err_no = 0;
            }
        
            else if(($conn->query($sql3) === FALSE) && ($conn->query($sql4) === TRUE)){
                $err_no = 1;
           
            }
            else if(($conn->query($sql3) === TRUE) && ($conn->query($sql4) === FALSE)){
                $err_no = 1;
           
            }

             else if(($conn->query($sql3) === FALSE) && ($conn->query($sql4) === FALSE)){
                $err_no = 2;
           
            }
                else {
                    $err_no = -1;
                }
}}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            if ($err_no === -1) { ?>
                <p id="info"><?php echo "Connection Error ! Please try again later.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no === 0) { ?>
                <p id="info"><?php echo "Transfer Successful !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no === 1) { ?>
                <p id="info"><?php echo "Insufficient Funds !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no === 2) { ?>
                <p id="info"><?php echo "Wrong password entered !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="beneficiary.php" class="button">Go Back</a>
        </div>
    </div>

</body>
</html>
