<?php include("app_logic.php");
if(empty($_SESSION['email'])){
          header("Location: signin.php");
          exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Recovery - goDone</title>
        <meta name=”viewport” content=”width=device-width, initial-scale=1″>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; color: #333333; font-size: 24px;
    font-weight: 300;
    letter-spacing: -.5px; text-align: center; line-height: 1.5;">Reset your password</h1>
<br/>
	<form class="login-form" action="new_password.php" method="post">
     <div class="login-page">
	<div class="form">
		<!-- form validation messages -->
		<?php include('messages.php');?>
	                <input type="password" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="new_pass">
			<input type="password" placeholder="Retype New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="new_pass_c">
			<button type="submit" name="new_password" class="login-btn">Submit</button>
</div>
</div>
</form>
</body>
</html>
