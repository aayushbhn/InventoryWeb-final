<?php
	session_start();
	$username=$_POST["username"]?? "";
	$password=$_POST["password"]?? "";
	$user=array("aayush2658@gmail.com",);
	$pass="A123aayush";
	for($i=0;$i<count($user);$i++){
		$sername=$user[$i];		
			
		if($username=="$sername" && $password=="$pass") {			
			$_SESSION["username"]="$username";
			header("location: gallery.php"); 
		}elseif($username=="" && $password=="") {
				$status[]="LOGIN";
		}else {
			$status[]="Invalid Username/Password";
		}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marketing Material Gallery</title>
<link rel="stylesheet" href="css/styles.css">
<!-- <link href="../css/reset.css" rel="stylesheet" type="text/css" /> -->
</head>
<body>
	<div class="form-container">
	<form id="login" name="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="box login">
	<?php
if (isset($status)) {
   foreach ($status as $status) {
      echo '<span class="error-msg">' . $status . '</span>'; //display stat$status message
         }
         ;
         }
         ;
         ?>
  <fieldset class="boxBody">
    <label>Username</label>
    <input type="text" name="username" id="username" required/>
    <label>Password</label>
    <input type="password" name="password" id="password" required/>
  </fieldset>
  <footer>
    
    <input type="submit" name="button" id="button" value="Login" class="form-btn" />
  </footer>
</form>

	</div>

</body>
</html>
<?php		 
	}
?>