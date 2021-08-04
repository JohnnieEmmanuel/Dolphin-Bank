

<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";


    if (isset($_SESSION['loggedIn_cust_id'])) {
        if (isset($_SESSION['ide'])) {
            $_custID= $_SESSION['loggedIn_cust_id'];
            $_bfName= $_GET['beneficiary'];//$_SESSION['ide'];
            $sql0 = "SELECT * FROM beneficiary1 where customer_id='$_custID' and benef_cust_id='$_bfName' ";
            $result0 = $conn->query($sql0);
            $row0 = $result0->fetch_assoc();

        }
     
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
    <script>
    </script>
</head>

<body>
    
    <form class="add_customer_form" action="send_funds_action.php?beneficiary=<?php echo $_bfName?>" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Transfer Funds</h1>
        </div>

            <h2 class="flex-container">Balance: <? echo $_SESSION['balance']; ?></h2><hr/>

        <div class="flex-container">
            <div class=container>
                <label>
                    To : <label id="info_label">
                        <?php echo $row0["first_name"]." ".$row0["last_name"] ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No : <label id="info_label"><?php echo $row0["account_no"] ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Enter Amount (in $) :</label><br>
                <input name="amt" size="24" type="text" required />
                <input name="testdate" type="hidden" id="testdate"  />
                <input type="hidden" name="beneficiary_name" value=" <?php echo $row0['first_name']." ".$row0['last_name'] ?>" >
                 <input type="hidden" name="beneficiary_account" value=" <?php echo $row0['account_no']?>" >
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Enter your password :</b></label><br>
                <input name="password" size="24" type="password" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="beneficiary.php" class="button">Go Back</a>
            </div>

            <div class="container">
                <button type="submit">Submit</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }

var d= new Date();
var _date = d.toISOString().split('T')[0];
var _time = d.toTimeString().split(' ')[0];
var _curdate = `${_date} ${_time}`;
console.log(d);
console.log(_date);
console.log(_time);
console.log(_curdate);
document.getElementById('testdate').value= _curdate;
    </script>

</body>
</html>
