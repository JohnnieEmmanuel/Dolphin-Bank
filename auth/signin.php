<?php
    
    if (isset($_GET['loginFailed'])) {
        $message = "Username or Password is Incorrect.  Try Again";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css">
    <style type="text/css">
        
/* General form styles */
form {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 10px;
  box-shadow: 0 0 20px #ccc;
}

/* Form heading styles */
form h2 {
  text-align: center;
  margin-bottom: 30px;
  color: #333;
}

/* Input styles */
form input[type="text"], form input[type="password"], form input[type="email"] {
  width: 100%;
  padding: 12px 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

/* Input focus styles */
form input[type="text"]:focus, form input[type="password"]:focus, form input[type="email"]:focus {
  border-color: #4CAF50;
  outline: none;
}

/* Submit button styles */
form input[type="submit"] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin-bottom: 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

/* Submit button hover styles */
form input[type="submit"]:hover {
  background-color: #45a049;
}

/* Link styles */
form p a {
  color: #888;
  text-decoration: none;
  font-size: 14px;
}

/* Link hover styles */
form p a:hover {
  color: #4CAF50;
}

        </style>
</head>

<body>

<form action="../nne/customer_login_action.php" method="post">
<h1 style="text-align: center;">DOLPHIN BANK</h1>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="pwd"><br>
  <input type="submit" value="Log in">
  <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  <p> <a href="#" id="forgot-password">Forgot password?</a></p>
</form>

<!-- 
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">Your Bank at Your Fingertips.</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="nne/customer_login_action.php" method="post">
                    <div class="flex-item-login">
                        <h2>Welcome</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="cust_uname" placeholder="Enter your Username" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" name="cust_psw" placeholder="Enter your Password" required>
                    </div>

                    <div class="flex-item">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div> -->

</body>
</html>
