<?php 
session_start();
$errors = [];
$user_id = "";
// connect to database
$db = mysqli_connect('127.0.0.1:3306', 'root', 'Deepak@24', 'getDone');

//Create User
$location="";
if (isset($_POST['register_user'])){
  $username = htmlspecialchars(trim($_POST['user_id']));
  $email = htmlspecialchars(trim($_POST['email']));
  $password = htmlspecialchars(trim($_POST['password']));
  $username = mysqli_real_escape_string($db, $_POST['user_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $username = stripslashes($username);
  $email = stripslashes($email);
  $password = stripslashes($password);
  $userdetails="INSERT INTO Users (Username, Email, Password,) VALUES ('$username','$email','$password')";
if ($db->query($userdetails) === TRUE) {
   array_push($errors, "Thank You!");
   header('location: signin.php');
} else {
    echo "Error: " . $userdetails . "<br>" . $db->error;
}
}

// LOG USER IN
$user_id=$password="";
if (isset($_POST['login_user'])) {
  // Get username and password from login form
  $user_id = htmlspecialchars(trim($_POST['user_id']));
  $password = htmlspecialchars(trim($_POST['password']));
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $user_id= stripslashes($user_id);
  $password= stripslashes($password);
  // validate form
  if (empty($user_id)) array_push($errors, "Username or Email is required");
  if (empty($password)) array_push($errors, "Password is required");
  // if no error in form, log user in
  if (count($errors) == 0) {
      $sql = "SELECT Id FROM Users WHERE Username = '$user_id' and Password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1)  {
      $_SESSION['username'] = $user_id;
      $_SESSION['password'] = $password;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../');
    }else {
      array_push($errors, "Wrong credentials");
    }
  }
}

//reset
if (isset($_POST['reset-password'])) {
  $email = htmlspecialchars(trim($_POST['email']));
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $email= stripslashes($email);
  // ensure that the user exists on our system
  $query = "SELECT Email FROM Users WHERE Email='$email'";
  $results = mysqli_query($db, $query);
  $_SESSION['email']=$email;

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($db, $sql);

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Password Reset Assistance";
    $msg = "Hi there, click on this <a href=\"../my/new_password.php?token=" . $token . "\">link</a> to reset your password.";
    $msg = wordwrap($msg,70);
    $headers = "From: no-reply@godone.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
  $new_pass = htmlspecialchars(trim($_POST['new_pass']));
  $new_pass_c = htmlspecialchars(trim($_POST['new_pass_c']));
  $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
  $new_pass= stripslashes($new_pass);
  $new_pass_c= stripslashes($new_pass_c);
  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM Users WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $sql = "UPDATE Users SET password='$new_pass' WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      header('location: index.php');
    }
  }
}
mysqli_close($db); 
?>
<? include('block.html'); ?>
<script>
        document.addEventListener('contextmenu', event => event.preventDefault());
</script>
