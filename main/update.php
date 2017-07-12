<html>
<head>
<title>Update User Info</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
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

session_start();
$email=$_SESSION['email'];
/*if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
         echo "dfds";
        /* choose the appropriate page to redirect users 
        die( header( 'location: error.php' ) );

    }*/
if(isset($_POST['update'])) 
{ 
  $mobilenumber=$_POST['mobilenumber'];
  $password=$_POST['password'];
  $address=$_POST['address'];
  $town=$_POST['town'];
  $state=$_POST['state'];
  $sql="UPDATE `users` SET `password`='".$password."',`mobilenumber`='".$mobilenumber."',`address`='".$address."',`town`='".$town."',`state`='".$state."' where email='".$email."'";
  $result=$conn->query($sql);
  header('Location:../frames/home.html');
}
?>
<center>
<br>
<form method="POST" action="<?php $_PHP_SELF ?>">
<h2>Update Your info</h2>
<br>
<table>
	<tbody>
	<tr></tr><tr></tr>
	<tr>
	<td>Email ID:</td><td><?php  echo $_SESSION['email'] ?></td>
	</tr>
	<tr>
	<td>New Password:</td><td><input type="password" placeholder="Enter Password" name="password" required></td>
	</tr>
	<tr><td>Mobile Number:</td><td><input type="text" placeholder="Enter Mobile Number" name="mobilenumber" required></td></tr>
	<tr><td>Address:</td><td><textarea  rows="4" cols="30" placeholder="Enter address" name="address" required></textarea></td></tr>
	<tr><td>Town:</td><td><input type="text" placeholder="Enter your Town"  name="town" required></td></tr>
	<tr><td>State:</td><td><input type="text" placeholder="Enter your State" name="state" required></td></tr>
	<td colspan="2"><input type="submit" name="update" class="button" value="Update" style="width:100%;"></td><td></td>
	</tr>
</table>
</center>
</body>
</html>

