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
    include "verify_beneficiary.php";
    include "session_timeout.php";

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $_custID = $_SESSION['loggedIn_cust_id'];
        $sql0 = "SELECT * FROM beneficiary1 where customer_id='$_custID'";


    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manage_customers_style.css">
</head>

<body>
   
    <div class="flex-container">
          <div class="container" style="color:#d50000;">
                <a href="add_beneficiary.php" class="button"  >Add Beneficiary</a>
            </div>

        <p id="info">Send to Beneficiaries.</p>
        <?php
            $result = $conn->query($sql0);
            $isBenefPresent = 0;
            $back_button = FALSE;


            if ($result->num_rows > 0) {
            // output data of each row
            $i = 1;
            while($row = $result->fetch_assoc()) {
                  
               

               
            
                ?>
               
                    <div class="flex-item">

                        <div class="flex-item-1">
                            <p id="id"><?php echo $i . "."; ?></p>
                        </div>
                        <div class="flex-item-2">
                            <p id="name"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></p>
                            <p id="acno"><?php echo "Ac/No : " . $row["account_no"]; ?></p>
                        </div>
                        <div class="flex-item-1">
                            <div class="dropdown">
                                <!--We are dynamically naming each dropdown for every entry in the loop and
                                    passing the respective integer value in the dropdown_func().
                                    This creates adynamic anchor for each button-->
                              <button onclick="dropdown_func(<?php echo $i; $_SESSION['ide']=null; $_SESSION['ide']=$row["benef_cust_id"];?> )" class="dropbtn"></button>
                              <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                                <!--Pass the customer trans_id as a get variable in the link-->


                        
                                <a href="send_funds.php?beneficiary=<?php echo $_SESSION['ide']; ?>
                                    ">Send </a>

                              </div>
                            </div>
                        </div>
                    </div>

            <?php  $i++; }}

            else { ?>
                <p id="none"> No beneficiaries found :(</p>
            <?php }
            if ($back_button) { ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="beneficiary.php" class="button">Go Back</a>
                    </div>
                </div>
            <?php }
            $conn->close(); ?>
    </div>

    <script>
    /*  The problem with lots of menus sharing same anchor(dropdown-content) is that clicking on
        any of the buttons produces the same output as clicking the first button. Thus only the
        menu associated with the first button opens. This is BIG PROBLEM when we have lots of menus
        inside the while-loop.
        Hence, solve this problem using dynamic naming to create different anchors for different
        buttons.
        This is a proper solution and NOT a hack/workaround */
    function dropdown_func(i) {
        console.log(i);
        // Dynamic naming of the dropdown #id
        var doc_id = "dropdown".concat(i.toString());
console.log(doc_id);
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        // Close any menus, if opened, before opening a new one
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
        }

        document.getElementById(doc_id).classList.toggle("show");
        return false;
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    // Sticky search-bar
    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        // Fixes some 'unfortunate-graphics-derp' while resizing the window
        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });
    });

    </script>

</body>
</html>
