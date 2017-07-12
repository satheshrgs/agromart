<?php

function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "M") {
    return $miles;
  }
}
session_start();
$lat2=$_SESSION['latitude'];
$long2=$_SESSION['longitude'];

$servername="localhost";
$username="root";
$password="";
$conn=new mysqli($servername,$username,$password,"agromart");
if($conn->connect_error)
{
	die("Connection Failure".$conn->connect_error);
}
$sql="SELECT * FROM post ";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	echo "<table border='1'><thead><tr><th rowspan='2'>email</th><th colspan='2'>Bhindi</th><th rowspan='2'>Distance</th></tr><tr><th>Quantity</th><th>Price</th></tr>
	</thead><tbody>";
	
	while($row=$result->fetch_assoc())
	{
           $lat1=$row["latitude"];
		   $long1=$row["longtitude"];
		   $bhindi=$row["bhindi"]; 
		   list($bhindi1,$bhindi2)=explode(',',$bhindi);
		   echo "<tr><td>".$row["email"]."</td><td>".$bhindi1."</td><td>".$bhindi2."</td><td>";
           $mile=distance($lat1,$long1,$lat2,$long2, "M") . " Miles<br>";
		   echo $mile;
		   echo "</td>";		 
	}
}
else
{
	echo "0 rows";
}


?>