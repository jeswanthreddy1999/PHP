<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mydb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
$query="SELECT * FROM USER1 where name!='' ORDER BY name";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

$result=mysqli_fetch_assoc($data);
?>
<html>
	<head>
		<style>
			.div1{background-image: url('admin.jpg'); background-position:center; background-repeat:no-repeat; background-attachment:fixed; filter:brightness(20%); height:100%; }
			body{ padding:0px; margin:0px;}
			.context{z-index=5;position:absolute; text-align:center; left:400px; top:0px; font-family:sans-serif;}
			h1,h2{color:#f1ffff;}
			h2{text-decoration: underline;}
			table tr {color:red; font-size:30px;}
			span{color:#ff0000;}
			#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #2f2f2f;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
		</style>
	</head>
	<body>
		<div class="div1">
		</div>
		<div class="context">
			<h1>The Alpha </h1>
			<h1><span>Technical</span> Video Courses</h1>
			<h2>DATA OF CUSTOMERS</h2>
			<?php
			echo "<table id='customers'>";
				echo "<tr>";
					echo "<th>".'NAME'."</th>";
					echo "<th>".'EMAIL'."</th>";
					echo "<th>".'PASSWORD'."</th>";
				echo "</tr>";

					while($result=mysqli_fetch_assoc($data)){
				echo "<tr>";
					echo "<td>".$result['name']."</td>";
					echo "<td>".$result['email']."</td>";
					echo "<td>".$result['password']."</td>";
				echo "</tr>";
					}

				
			echo "</table>";
			?>
		</div>
	</body>
</html>