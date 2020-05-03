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
	<title>Recovery Process - getDone</title>
    <meta name=”viewport” content=”width=device-width, initial-scale=1″>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; color: #333333; font-size: 24px;
    font-weight: 300;
    letter-spacing: -.5px; text-align: center; line-height: 1.5;">Reset your password</h1>
<br/>
	<form class="login-form" action="pending.php" method="post" style="text-align: center;">
        <div class="login-page">
	<div class="form">
		<p style="color: white;">
			We sent an email to  <b style="color: yellow;"><?php echo $_GET['email'] ?></b> to help you recover your account. 
		</p>
	    <p style="color: white;">Please login into your email account and click on the link we sent to reset your password</p>
  <br/>
			<a style="background-color: black;
    width: 30%; text-align: center; color: #eff3f6; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; line-height: 23px;
" href="index.php">Return to login</a>   
</div>
       </div>
	</form>
</body>
</html>
