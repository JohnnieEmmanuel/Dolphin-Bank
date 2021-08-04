<?php
   
   include "nne/validate_customer.php";

    include "nne/connect.php";
    include "nne/session_timeout.php";

    $id = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
    // echo $id;
    $sql1 = "SELECT * FROM passbook1 WHERE customer_id='$id' order by trans_date DESC  LIMIT 3";
    
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    

    //pass balance as session variable to be able to grab it elsewhere.
        $_SESSION['balance'] = $row1['balance'];
    
        $time = strtotime($row1["trans_date"]);
        $sanitized_time = date("d/m/Y, g:i A", $time);

   
    $sql2 = "SELECT COUNT(*) FROM beneficiary1 where customer_id='$id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Dolphin Bank</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href=" assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">


    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                                <img src=" assets/images/users/1.jpg" alt="user" class="profile-pic me-2"><?php  echo $row0["last_name"]; echo "   ";echo $row0["first_name"]; ?>
                            </a>
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
                                href="profile.php" aria-expanded="false">
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6 col-md-7 col-xm-12 col-sm-7">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h4 class="card-title text-muted">Card Ending With...</h4>
                                <h5 style="color: #009efb; font:bolder;"><?php  echo $row0["card number"]; ?></h5>
                                <hr>
                                 <span >
                                    <h2 class=" mb-0" style="color: #009efb; font:bolder;">$ <?php echo number_format($row1["balance"]); ?> </h2>
                                    <span class="text-muted">Account Balance</span>
                               </span>
                               
                                
                            </div>
                        </div>
                    </div>
            
               
                    <div class="col-lg-6 col-md-7 col-xm-12 col-sm-7">
                        <div class="card">
                            <div class="card-body" style="text-align: center;">
                                <h5 class="text-muted">Account Number</h5>
                                <h5 style="color: #009efb;"><?php  echo $row0["account_no"]; ?></h5>
                                <hr>
                                 <span >
                                    <h5 class=" mb-0" style="color: #009efb; "><?php echo $row0["routing_number"]; ?> </h5>
                                    <h5 class="text-muted">Routing Number</h5>
                               </span>
                               
                                
                            </div>
                        </div>
                    </div>
            
                </div>
            
            
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex" style="display: inline-flex;">
                                    <h4 class="card-title  align-self-center col-lg-9 col-md-9 ">Recent Transactions</h4>
                                    <div class="col-lg-3 col-md-3 " >
                                       
                                            <div class="upgrade-btn">
                                                <a href="transaction-history.php"
                                                    class="btn btn-default d-md-inline-block text-white">See More</a>
                                            </div>
                                   
                                    </div>
                                </div>
                                <div class="table-responsive mt-2">
                                <?php
            $result = $conn->query($sql1);

            if ($result->num_rows > 0) {?>    
                                <table class="table stylish-table no-wrap">
                                    
                                        <thead>

                                            <tr>
                                                <th class="border-top-0" >Transaction Details</th>
                                                <th class="border-top-0">Amount</th>
                                            </tr>
                                        </thead>
                                        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                if ($row["debit"] == 0) {
                    $transaction = $row["credit"];
                    $type = "credit";
                }
                else {
                    $transaction = $row["debit"];
                    $type = "debit";
                }
            
                ?>
                                        <tbody>
                                            <tr>
                                                
                                                <td class="align-middle">
                                                    <h6><?php echo $row["remarks"] ; ?></h6>
                                                    <!-- <small class="text-muted">trans-Id: 29861201772Aga</small> -->
                                        
                                                </td>
                                                <td class="align-middle">$<?php echo number_format($transaction); ?></td>
                                            </tr>
                                           
                                                                                    </tbody>
                                                                                    <?php } ?>
                                    </table>
                                    <?php
            } else {  ?>
                <h3 class="text-muted">No transaction yet</h3>
            <?php }
            $conn->close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
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
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src=" assets/plugins/flot/jquery.flot.js"></script>
    <script src=" assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="js/pages/dashboards/dashboard.js"></script>

    

</body>

</html>