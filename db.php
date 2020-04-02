<?php
$servername="localhost";
$username="root";
$password="";
$dbname="MyDb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
	echo "successfull";
}
else{ echo "failed due to".mysqli_connect_error();}

$query="INSERT INTO user VALUES ('jes@gmail.com','12345678')";
$data=mysqli_query($conn,$query);
if($data){
	echo "inserted";
}
else{
	echo "not inserted";
}
?>