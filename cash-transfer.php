

<?php
/* Avoid multiple sessions warning
Check if session is set before starting a new one. */
if(!isset($_SESSION)) {
    session_start();
}

include "nne/validate_customer.php";
include "nne/connect.php";
include "nne/session_timeout.php";


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
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="">
    <meta name="description"
        content="">
    <meta name="robots" content="noindex,nofollow">
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
<style >
    h5{
        color:#009efb;
    }
    @media only screen and (max-width:453px) {
        .tt{
            display:block !important;
        }
    }
    @media only screen and (max-width:582px){
        .form-style{
          
            display: block !important;
        }
    }
    
</style>
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar " data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark sticky-top">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src=" assets/images/logo-icon.png" alt="homepage" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src=" assets/images/logo-text.png" alt="homepage" class="dark-logo" />

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src=" assets/images/users/1.jpg" alt="user" class="profile-pic me-2"> <?php  echo $lname; echo "   ";echo $fname; ?>
                            </a>
                            <ul class="dropdown-menu show" aria-h5ledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dashboard.php" aria-expanded="false"><i class="me-3 far fa-clock fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-profile.html" aria-expanded="false">
                                <i class="me-3 fa fa-user" aria-hidden="true"></i><span
                                    class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="transaction-history.php" aria-expanded="false"><i class="me-3 fa fa-table"
                                    aria-hidden="true"></i><span class="hide-menu">Transaction History</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="icon-fontawesome.html" aria-expanded="false"><i class="me-3 fa fa-font"
                                    aria-hidden="true"></i><span class="hide-menu">Make Transfer</span></a></li>
<!--         
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="404.html" aria-expanded="false"><i class="me-3 fa fa-info-circle"
                                    aria-hidden="true"></i><span class="hide-menu">Error 404</span></a></li> -->
                   
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
                 
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 align-self-center">
                        <h3 class="page-title mb-0 p-0"><strong>Make Cash Transfer</strong></h3>
                       
                    </div>
                    <!-- <a href="#"><button type="button" class="btn btn-primary" style="text-align:center;background-color:#009efb !important; color:white;" >View Saved Beneficiaries</button>
</a> -->
                </div>
            </div>
          
     
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <strong>
                <form  name="myForm" class="row g-3 needs-validation hov" novalidate action="e-transfer.php" method="post"   >
                   <span id="part_1">
                       <div class="row">
                        <div class="col-md-4">
                      <label for="validationCustom01" class="form-label">Account Number</label>
                      <input  type="number" name="account_number" id="acno" class="form-control" id="validationCustom01" 
                      min="20"
                      required>
                      <div class="invalid-feedback">
                        Please input a valid account number.
                      </div>
                      <div id="in-feed" style="display: none;">
                        Account number has to be 10 digits.
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom02" class="form-label">Routing Number</label>
                      <input type="number" id="routing_no" name="routing_number" class="form-control" id="validationCustom02"  required>
                      <div class="invalid-feedback">
                        Please input a valid Routing number.
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustomUsername" class="form-label">Amount</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">$</span>
                        <input type="number" class="form-control" id="validationCustomUsername" id="amount1" name="amount" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                          Input amount to transfer.
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom03" class="form-label">Account Holder's Name</label>
                      <input type="text" class="form-control" id="validationCustom03" id="receipient_name" name="receipient_name"  required>
                      <div class="invalid-feedback">
                        Input receipient account name
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom04" class="form-label">Bank Name</label>
                      <input list="bank_name" class="form-select" id="validationCustom04" id="bank_name" name="bank_name" 
                     required>
                     <datalist id="bank_name">
                        <!-- <option  disabled value="">Choose...</option> -->
                        <option value="Dolphin Bank"></option>
                        <option value="Chase Bank"></option>
                        <option    value="Bank of America"></option>
                        <option   value="Optum Bank, Inc."></option>
                        <option   value="Ally Bank"></option>  
                        <option    value="U.S. Bank National Association"></option>
                        <option    value="Citizens Bank"></option>
                        <option    value="TD Bank"></option>
                        <option    value="Silicon Valley Bank"></option>
                        <option    value="BBVA">	</option>
                        <option    value="Santander Bank, N.A">	</option>
                        <option    value="American Express"></option>
                        <option    value="Truist Bank">	 </option>
                        <option    value="PNC Bank"></option>
                        <option    value="Bank of China"></option>
                        <option    value="Texas Capital Bank"></option>
                        <option    value="HSBC Bank"></option>
                        <option    value="Bankers Trust Company"></option>
                        <option    value="Citibank"></option> 
                       
                      </datalist>
                      <div class="invalid-feedback">
                        Please select the bank name or click others to type in the bank name if not available.
                      </div>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom05" class="form-label">Describe Transaction</label>
                      <input type="text" name="description" class="form-control" id="validationCustom05" >
                      
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom05" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validationCustom05" type="password" name="pwd" >
                        <div class="invalid-feedback">
                            Input Your Password
                          </div>
                      </div>
                    <div class="col-12" style="margin-top: 20px;">
                      <button  type="submit"  class="btn btn-danger mx-auto mx-md-0 text-white"formnovalidate >Make Transfer</button>
                   
                    </div>
                </div>
                </span>
               
                  </form>
               
                </strong>




                    </div>
                 </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
             <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © <span id="c_year"> </span>   Powered by codeviper</a>
                
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src=" assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src=" assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/pages/dashboards/dashboard.js"></script>

</body>

</html>