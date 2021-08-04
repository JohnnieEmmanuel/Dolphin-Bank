
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
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
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
                    <a href="#"><button type="button" class="btn btn-primary" style="text-align:center;background-color:#009efb !important; color:white;" >View Saved Beneficiaries</button>
</a>
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
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <form  class="form-horizontal form-material mx-2 tt needs-validation"  action="nne/send_funds_action.php?beneficiary=<?php echo $_bfName?>" method="post"  autocomplete="off">
                                  
                    <span class="form-style" style="display: inline-flex; width:100%; ">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xlg-6">
                        <div class="card">
                            <div class="card-body">
                                  
                                    <div class="form-group">
                                        <h5 class=" mb-0">Account Number</h5>
                                        <div class="">
                                            <input pattern=".{8,}" id="acno" type="number" name="account_number" VALUE="1234"    placeholder="receipient's account number"
                                                class="form-control ps-0 form-control-line is-valid" autocomplete="off" required title="9 digit account number" minlength="12" >
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                        <h5 class=" mb-0">Routing  Number</h5>
                                        <div class="">
                                            <input type="number" id="routing_no" name="routing_number" VALUE="1234"    placeholder="receipient's routing number"
                                                class="form-control ps-0 form-control-line" minlength="9" autocomplete="off" required>
                                        </div> 
                                    </div>
                                   
                                    <div class="form-group">
                                        <h5 class=" mb-0">Bank Name</h5>
                                        <div class="">
                                            <input type="text" id="bank_name" name="bank_name" VALUE="1234"    placeholder=" Bank Name"
                                                class="form-control ps-0 form-control-line"  autocomplete="off" required >
                                        </div> 
                                    </div>
                                
                                   
                                </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xlg-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h5 class=" mb-0">Account Name</h5>
                                            <div class="">
                                                <input type="text" id="receipient_name" name="acc_no" VALUE="1234"    placeholder="receipient's Full Name"
                                                    class="form-control ps-0 form-control-line"  autocomplete="off" required>
                                            </div> 
                                        </div> 
                                        <div class="form-group">
                                            <h5 class=" mb-0">Amount</h5>
                                            <div class="">
                                                <input type="number" id="amount" name="amount" VALUE="1234"    placeholder="Enter Amount"
                                                    class="form-control ps-0 form-control-line"  autocomplete="off" required>
                                            </div> 
                                        </div> 
                                            <div class="form-group"> 
                                                <h5 class=" mb-0">password</h5>
                                                <dssiv class="">
                                                    <input type="password" name="pwd" VALUE="1234"    placeholder="Input Password"
                                                        class="form-control ps-0 form-control-line" id="exampleInputPassword1" autocomplete="off" required>
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <h5 class=" mb-0">Remarks [Optional]</h5>
                                                <div class="">
                                                    <input name="remarks" type="text" VALUE="1234"    placeholder="Describe This Transaction "
                                                        class="form-control ps-0 form-control-line" autocomplete="off" >
                                                </div> 
                                            </div>
                                      
                                           
                                           
                                            
                                           
                                        </div>
                                        </div>
                                    </div>
                                    </span>  
                                    <span style="display: inline-block; width:100%;" >
                                         <div id="bb" class="form-group" >
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-secondary mx-auto mx-md-0 text-white" type="reset" style="margin-right:30px;">Clear</button>
                                            <button class="btn btn-primary mx-auto mx-md-0 text-white" type="submit" style="margin-right:30px;">Submit</button>

                                                
            <!-- Button trigger modal
            <button type="button" class="btn btn-danger mx-auto mx-md-0 text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="maketransfer()">
            Make Transfer
            </button>
            
            Modal
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-h5ledby="staticBackdroph5" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdroph5">Confirm Cash Transfer</br>
                <h6><span class="text-muted">Amount:</span> $<span id="amount1">  </span></br>
                    <span class="text-muted">Receipient:</span> <span id="receipient_name1">  </span></br>
                        <span class="text-muted">Account Number:</span> <span id="acno1">  </span></br>
                            <span class="text-muted">Routing Number:</span> <span id="routing_no1">  </span></br>
                                <span class="text-muted">Bank Name:</span> <span id="bankP1">  </span></h>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-h5="Close"></button>
            </div>
            <div class="modal-body">
            <div class="form-group">
            <h5><span style="display: block !important;">Make Sure the Above Informations are Accurate. </span>Input Transaction PIN to Confirm Transaction .</h5>
                <div class="">
                    <input type="number"  VALUE="1234"    placeholder="Input PIN"
                        class="form-control ps-0 form-control-line" name="cus_pin"
                       >
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Submit</button>
            </div>
            </div>
            </div>
            </div>
            Modal ends -->
                                        </div>
                                    </div>  </span>
                                
                        </form>
                        
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