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

form label[for="phone-number"], form label[for="pin"] {
  display: block;
  margin-bottom: 10px;
  font-size: 16px;
}
form input[type="text"][id="phone-number"], form input[type="password"][id="pin"] {
  width: 100%;
  padding: 12px 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

        </style>
</head>

<body>




<form>
<h1 style="text-align: center;">DOLPHIN BANK</h1>

  <label for="first-name">First Name:</label>
  <input type="text" id="first-name" name="first-name"><br>
  <label for="middle-name">Middle Name:</label>
  <input type="text" id="middle-name" name="middle-name"><br>
  <label for="last-name">Last Name:</label>
  <input type="text" id="last-name" name="last-name"><br>
  <label for="dob">Date of Birth:</label>
  <input type="date" id="dob" name="dob"><br>
  <label for="address">Address:</label>
  <input type="text" id="address" name="address"><br>
  <label for="state-origin">State of Origin:</label>
  <input type="text" id="state-origin" name="state-origin"><br>
  <label for="country-origin">Country of Origin:</label>
  <input type="text" id="country-origin" name="country-origin"><br>
  <label for="phone-number">Phone Number:</label>
  <input type="text" id="phone-number" name="phone-number"><br>
  <label for="pin">Pin:</label>
  <input type="password" id="pin" name="pin"><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br>
  <input type="submit" value="Sign up">
  <p>Already have an account? <a href="login.html">Log in</a></p>
  <p> <a href="#" id="forgot-password">Forgot password?</a></p>
</form>

</body>
</html>
