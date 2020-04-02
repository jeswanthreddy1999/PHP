
<?php
session_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" type="text/css" href="form.css">
<style>
.error {color: #FF0000;}

</style>
</head>
<body>  

<?php

 $emailErr = $password =$password2 = "";
$email=$passwordErr =$passwordErr2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }

   else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else{
    $_SESSION["email"] = $_POST['email'];
  }

  }
   
    if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  }
  else if(strlen($_POST["password"])<8){
$passwordErr="password size should not less than 8";
}
  else{
  $password=$_SESSION['password']=$_POST['password'];
}

if (empty($_POST["password2"])) {
    $passwordErr2 = " confirm password is empty";
  }
  else{
  $password2=$_POST['password2'];
} 

if($password != $password2){
  $passwordErr2="password and conform password must be same";
  $password="Password is not noted because ' PASSWORD AND CONFORM PASSWORD IS NOT SAME' ";

}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>SINE UP FOR ALPHA TECHNICAL</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
  <table>
<tr>
  <td>E-mail:</td> 
  <td><input type="email" name="email"><span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
  <td>Password</td> 
  <td><input type="password" name="password"><span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
  <td>Confirm Password</td>
  <td><input type="password" name="password2"><span class="error">* <?php echo $passwordErr2;?></span></td>
</tr>
  <br><br>
<tr>
  <td><input type="submit" name="submit" value="Submit"></td>
  <td><input type="submit" name="submit" value="clear"></td> 
</tr>
<?php
echo "<h2>Your DETAILS:</h2>";
echo "Email is ".$email;
echo "<br>";
echo "Password is ".$password;
echo "<br>";
 echo "hi, past login email is ". $_SESSION["email"]; ?>
</table>
</form>
</body>
</html>
  <?php
$servername = "localhost:8081";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "failed";
}
echo "Connected successfully";
?>  