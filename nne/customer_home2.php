<?php
    include "validate_customer.php";
    include "session_timeout.php";

    $id = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM passbook1 WHERE customer_id='$id' order by trans_id desc LIMIT 1";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();


    if ($row1["debit"] == 0) {
        $transaction = $row1["credit"];
        $type = "credit";
    }
    else {
        $transaction = $row1["debit"];
        $type = "debit";
    }

//pass balance as session variable to be able to grab it elsewhere.
    $_SESSION['balance'] = $row1['balance'];

    $time = strtotime($row1["trans_date"]);
    $sanitized_time = date("d/m/Y, g:i A", $time);

    $sql2 = "SELECT COUNT(*) FROM beneficiary1 where customer_id='$id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_home_style.css">
    <script type="text/javascript">
    
   

</script>

</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Welcome, <?php echo $row0["first_name"] ?>&nbsp<?php echo $row0["last_name"] ?>&nbsp!
            </h1>
             <h2 style="font-size: 30px; color: #d23636; padding-left: 25px;"> ACCOUNT NUMBER &#9656 &#9656  <strong style="color:#5d5dff;">  <?php  echo $row0["account_no"]; ?></strong>
         </h2>
            <p id="customer">
                <a style="color:#d50000; "> &#9656 &#9656  </a>Account Balance ($):<strong style="color:#5d5dff;"> <?php echo number_format($row1["balance"]); ?> </strong>
                <br>
                <br>
               <a style="color:#d50000; "> &#9656 &#9656  </a> You have <strong style="color:#5d5dff;"><?php echo $row2["COUNT(*)"]; ?> </strong> beneficiaries. 
                <br>
                <br>
                <a style="color:#d50000; "> &#9656 &#9656  </a>Last transaction: (<?php echo $type; ?>) of <strong style="color:#5d5dff;">&nbsp$<?php
                echo number_format($transaction); ?></strong>
                on <strong> <?php echo $sanitized_time; ?> </strong>,  <strong>"<?php echo $row1["remarks"]; ?>".</strong>
            </p>
        </div>
    </div>

</body>
</html>

<?php include "easter_egg.php"; ?>
