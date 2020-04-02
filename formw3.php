
<?php
session_start();
$cookie_name="name";
$cookie_value="jeswanth";
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
$servername="localhost";
$username="root";
$password="";
$dbname="MyDb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
  echo "successfull";
}
else{ echo "failed due to".mysqli_connect_error();}
?>
<!DOCTYPE HTML>  
<html>
<head>
  <title>SINE UP</title>
<link rel="stylesheet" type="text/css" href="form.css">
<style>
.error {color: #FF0000;}

</style>
</head>
<body>  

<?php
 $emailErr = $password =$password2=$name = "";
$email=$passwordErr =$passwordErr2=$nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


echo $_COOKIE[$cookie_name];


 $name1 = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name1)) {
  $nameErr = "Only letters and white space allowed";
}
else{
  $name=$_POST['name'];
}
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }

   else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else{
    $email=$_SESSION['email']=$_POST['email'];

  }
  }
   
    if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  }
  else if(strlen($_POST["password"])<8){
$passwordErr="password size should not less than 8";
}
  else{
  $password=$_POST['password'];
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
echo $email.$password;
$query="INSERT INTO user1 VALUES ('$name','$email','$password')";
$data=mysqli_query($conn,$query);
if($data){
  echo "Your submission noted";
}
else{
  echo "somthing went wrong, your query not noted";
}

?>

<h2>SINE UP FOR ALPHA TECHNICAL</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
  <table>
<tr>
  <td>Name:</td> 
  <td><input type="text" name="name"><span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>

<tr>
  <td>E-mail:</td> 
  <td><input type="email" name="email"><span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
  <td>Password</td> 
  <td><input type="password" name="password"><span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
  <td>Conform Password</td>
  <td><input type="password" name="password2"><span class="error">* <?php echo $passwordErr2;?></span></td>
</tr>
  <br><br>
<tr>
  <td><input type="submit" name="submit" value="Submit"></td>
  <td><input type="submit" name="submit" value="clear"></td> 
</tr>
<?php
echo "<h2>Your DETAILS:</h2>";
echo "Your name ".$name;
echo "<br>";
echo "Email is ".$email;
echo "<br>";
echo "Password is ". $password;
echo "<br>";
echo "hi, past login email is ". $_SESSION["email"];

if($name!='' && $email!='' && $password!=''){
  echo "<a id='hima' href='service.php'>".'Enter Into Services'."</a>";
}
?>
</table>
</form>
<script type="text/javascript">
</script>
</body>
</html>
