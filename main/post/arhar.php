<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$conn=new mysqli($servername,$username,$password,"agromart");
if($conn->connect_error)
{
	die("Connection Failure".$conn->connect_error);	
}
$email=$_SESSION['email'];
if(isset($_POST['update'])) 
{ 
  $b1=$_POST['quantity'];
  $b2=$_POST['price'];
  $arhar=$b1.",".$b2;
  $sql="UPDATE `post` SET `arhar`='".$arhar."' where email='".$email."'";
  $result=$conn->query($sql);
  header('Location:../home.html');
}
?>
<form method="POST" action="<?php $_PHP_SELF ?>">
<table>
<tr>
<td>Vegetable Name:</td>
<td>Arhar</td>
</tr>
<tr>
<td>Quantity:</td>
<td><input type="text" name="quantity" required></td>
</tr>
<tr>
<td>Price/per Kg:</td>
<td><input type="text" name="price" required></td>
</tr>
<tr>
<td><input type="submit" value="post" name="update"></td>
</tr>
</table>
</form>
</body>
</html>