<html>
<head>
<title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$conn=new mysqli($servername,$username,$password,"agromart");
if($conn->connect_error)
{
	die("Connection Failure".$conn->connect_error);
}
if(isset($_POST['submit'])) 
{ 
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
	$sql="select email,password,activated from users where email='".$email."' AND password='".$password."' AND activated='1'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{
	  session_start();
	  $_SESSION['email']=$email;
	  header('Location: main.php');
	}
    else
		echo "login failed";
}
?>
<center>
<br>
<h1>Application to Connect farmers directly with Consumers/Food Processing Industries</h1>
<hr>
<br>
<br>
<h1 class="title">AgroMart</h1>
<br>
<form method="POST" action="<?php $_PHP_SELF ?>">
<h2>Login Details</h2>
<br>
<table>
	<tbody>
	<tr></tr><tr></tr>
	<tr>
	<td>Email ID:</td><td><input type="email" placeholder="Enter Email ID" name="email" required></td>
	</tr>
	<tr>
	<td>Password:</td><td><input type="password" placeholder="Enter Password" name="password" required></td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr>
	<td colspan="2"><input type="submit" name="submit" class="button" value="Login" style="width:100%;"></td><td></td>
	</tr>
</table>
</center>
</body>
</html>