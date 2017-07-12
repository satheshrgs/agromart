<?php
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
	echo "<table border='1'><thead><tr><th rowspan='2'>email</th><th colspan='2'>Bhindi</th></tr><tr><th>Quantity</th><th>Price</th></tr>
	</thead><tbody>";
	while($row=$result->fetch_assoc())
	{
		$bhindi=$row["bhindi"]; 
		list($bhindi1,$bhindi2)=explode(',',$bhindi);
		echo "<tr><td>".$row["email"]."</td><td>".$bhindi1."</td><td>".$bhindi2."</td></tr>";
	}
	echo "</tbody></table>";
}
else
{
	echo "0 rows";
}
?>
