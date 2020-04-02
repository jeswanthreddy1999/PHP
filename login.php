
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
$query="select * from user2 where name='jeswanth199'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
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
$password =$name = "";
$passwordErr =$nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $name1 = $_POST["name"];
if (!preg_match("/^[a-zA-Z1-9]*$/",$name1)) {
  $nameErr = "Only letters and white space allowed";
}
else{
  $name=$_POST['name'];
} 



    if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  }
  else if(strlen($_POST["password"])<5){
$passwordErr="password is wrong";
}
  else{
  $password=$_POST['password'];
}

}


if($result['name']==$name && $result['password']==$password){

  echo "<a id='admin' href='admin.php'>".'ENTER INTO DATABASE'."</a>";

}
else{
  echo "<h1>".'You are not admin'."</h1>";
}

?>

<h2>LOGIN FOR ALPHA TECHNICAL</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
  <table>
<tr>
  <td>User Name:</td> 
  <td><input type="text" name="name"><span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>

  <td>Password</td> 
  <td><input type="password" name="password"><span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
  <br><br>
<tr>
  <td><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body>
</html>
