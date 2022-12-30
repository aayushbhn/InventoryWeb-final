<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']?? "");
   $email = mysqli_real_escape_string($conn, $_POST['email']?? "");
   $pass = md5($_POST['password']?? "");
   $cpass = md5($_POST['cpassword']?? "");
   $user_type = $_POST['user_type']?? "";

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         header('location:unitentry.php');

      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         header('location:inven_main.php');

      }

   } else {
      $error[] = 'Incorrect Email or Password!';
   }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/loginstyle.css">

</head>

<body>

   <div class="form-container">




      <form action="" method="post">
         <img src="Assets/Img/logo.png" alt="Avatar" class="image" height="110" width="240">
         <h3 style="font-size: 25px; color: #d0632d;">Login</h3>
         <?php
if (isset($error)) {
   foreach ($error as $error) {
      echo '<span class="error-msg">' . $error . '</span>'; //display error message
         }
         ;
         }
         ;
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login " class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Sign Up </a></p>
         <a style="font-size: 12px; color: gray;" href="forgotpw.php">Forgot Password?</a>
      </form>

   </div>

</body>

</html>