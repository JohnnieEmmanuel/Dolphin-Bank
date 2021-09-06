
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Dolphin Bank E-banking finance finanancial transaction send money receive money ">
    <meta name="description"
        content="Dolphin bank is the bank for you for Carrying out your seemless financial transactions.">
    <meta name="robots" content="Dolphin bank, E-banking,Send Money, Receive Money">
    <title>Dolphin Bank</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
    <?php
    if(isset($_GET['transfer'])){
       include "nne/validate_customer.php";
    include "nne/connect.php";
    include "nne/session_timeout.php";

    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
    
    
        $transfermessage=$_GET['transfer'];

        if($transfermessage == "success"){ 
                echo '<script> var message = 0;</script>';
        }else if($transfermessage == "failed"){
            echo '<script> var message = 1;</script>';
        }
        else if($transfermessage == "invalidpassword"){
            echo '<script> var message = 2;</script>';
        }
        else if($transfermessage == "insufficient"){
            echo '<script> var message = 3;</script>';
        }
    }
else if(isset($_GET['sessionExpired'])){      
      $session=$_GET['sessionExpired'];
        if($session == "true"){ 
            echo '<script> var message = 4;</script>';
    }}
    else if(isset($_GET['connection'])){      
        $session=$_GET['connection'];
          if($session == "failed"){ 
              echo '<script> var message = 5;</script>';
      }}
    else{
        exit();
    }

        ?>
       
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <span id="invalidpassword">
        <div class="error-box">
            <strong><div class="error-body text-center">
                <h1 class="error-title" style="color:#ff0303; margin-top:60px;"><i class="fas fa-exclamation-triangle" ></i></h1>
                <strong><h2 class="text-uppercase " style="color:#ff0303;"> INVALID PASSWORD</h2></strong>
                <p class="text-muted mb-4 mt-4">YOU SEEM TO BE TRYING TO HAVE FORGOTTEN YOUR ACCOUNT PASSWORD?</p>
                <a href="cash-transfer.php" class="btn  btn-rounded waves-effect waves-light mb-4 text-white" style="background-color:#ff0303;">Try Again!!</a>
            
            </div>
            </strong>
            <footer class="footer text-center w-100">
                 © <span id="c_year"> </span>   Powered by codeviper</a>
            </footer>
        </div>
        </span>



        <span id="success">
        <div class="error-box">
            <strong><div class="error-body text-center" style="margin-top:60px; ">
                <h1 class="error-title" style="color:#0275d8;" ><i class="far fa-check-circle" ></i></h1>
                <strong><h2 class="text-uppercase " style="color:#0275d8">TRANSACTION SUCCESSFUL</h2>
                <p class="text-muted mb-4 mt-4">YOUR CASH TRANSFER WAS SUCCESSFUL</p></strong>
                <a href="dashboard.php" class="btn btn-info  btn-rounded waves-effect waves-light mb-4 text-white" style="background-color:#0275d8;">Go to Dashboard</a>
            
            </div>
            </strong>
            <footer class="footer text-center w-100">
                 © <span id="c_year"> </span>   Powered by codeviper</a>
            </footer>
        </div>
        </span>


        
        <span id="failed">
        <div class="error-box">
            <strong><div class="error-body text-center">
                <h1 class="error-title" style="color:#ff0303; margin-top:60px;"><i class="fas fa-exclamation-triangle" ></i></h1>
                <strong><h2 class="text-uppercase " style="color:#ff0303;">TRANSACTION FAILED</h2></strong>
                <p class="text-muted mb-4 mt-4">YOU SEEM TO HAVE DONE SOMETHING WRONG? </p>
                <a href="cash-transfer.php" class="btn  btn-rounded waves-effect waves-light mb-4 text-white" style="background-color:#ff0303;">Try Again!!</a>
            
            </div>
            </strong>
            <footer class="footer text-center w-100">
                 © <span id="c_year"> </span>   Powered by codeviper</a>
            </footer>
        </div>
        </span>

        <span id="insufficient">
        <div class="error-box">
            <strong><div class="error-body text-center">
                <h1 class="error-title" style="color:#ff0303; margin-top:60px;"><i class="fas fa-exclamation-triangle" ></i></h1>
                <strong><h2 class="text-uppercase " style="color:#ff0303;">INSUFFICIENT BALANCE</h2></strong>
                <p class="text-muted mb-4 mt-4">YOUR ACCOUNT BALANCE IS LOW FOR THIS TRANSACTION, MAKE CASH DEPOSIT AND TRY AGAIN. </p>
                <a href="dashboard.php" class="btn  btn-rounded waves-effect waves-light mb-4 text-white" style="background-color:#ff0303;">Go To Dashboard</a>
            
            </div>
            </strong>
            <footer class="footer text-center w-100">
                 © <span id="c_year"> </span>   Powered by codeviper</a>
            </footer>
        </div>
        </span>


        <span id="session-timeout">
        <div class="error-box">
            <strong><div class="error-body text-center">
                <h1 class="error-title" style="color:#ff0303; margin-top:60px;"><i class="fas fa-hourglass-end" ></i></h1>
                <strong><h2 class="text-uppercase " style="color:#ff0303;">SESSION EXPIRED</h2>
                <p class="text-muted mb-4 mt-4"> For security reasons<br><br>
                Your account automatically signs-out after 5 minutes of inactivity.
                <br><br> </p></strong>
                <a href="nne/home.php" class="btn  btn-rounded waves-effect waves-light mb-4 text-white" style="background-color:#ff0303;">SIGN IN</a>
            
            </div>
            </strong>
            <footer class="footer text-center w-100">
                 © <span id="c_year"> </span>   Powered by codeviper</a>
            </footer>
        </div>
        </span>

        

        <span id="404">
        <div class="error-box">
            <strong><div class="error-body text-center">
                <h1 class="error-title" style="color:#ff0303; margin-top:60px;">404 </h1>
                <strong><h2 class="text-uppercase " style="color:#ff0303;">ERROR CONNECTING TO SERVER</h2>
                <p class="text-muted mb-4 mt-4"> 
            Don't fret !! Restart your Router or Network Adapter, Then Try Again  </p></strong>
                <a href="nne/home.php" class="btn  btn-rounded waves-effect waves-light mb-4 text-white" style="background-color:#ff0303;">Try Again</a>
            
            </div>
            </strong>
            <footer class="footer text-center w-100">
                 © <span id="c_year"> </span>   Powered by codeviper</a>
            </footer>
        </div>
        </span>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src=" assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src=" assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
   
<script>
    var m = document.getElementById("success");
var f = document.getElementById("failed");
var i = document.getElementById("invalidpassword");
var s = document.getElementById("insufficient");
var t = document.getElementById("session-timeout");
var e = document.getElementById("404");




f.style.display = 'none';
  m.style.display = 'none';
  i.style.display = 'none';
  s.style.display = 'none';
  t.style.display = 'none';
  e.style.display = 'none';



  
function errormessage(){
if(message == 0){
  m.style.display = 'block';
  console.log("test1");
}
else if(message == 1){
  f.style.display = 'block';
  console.log("test2");

}
else if(message == 2){
  i.style.display = 'block';
  console.log("test3");

}
else if(message == 3){
  s.style.display = 'block';
  console.log("test4");
}
else if(message == 4){
t.style.display = 'block';
session_destroy();
}
else if(message == 5){
e.style.display = 'block';

}
}
errormessage();
</script>




<script>
        $(".preloader").fadeOut();
    </script>
   

</body>

</html>