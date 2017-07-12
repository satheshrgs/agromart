<?php 
$servername="localhost";
$username="root";
$password="";
$conn=new mysqli($servername,$username,$password,"agromart");
if($conn->connect_error)
{
	die("Connection Failure".$conn->connect_error);
	
}
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{  
    $email =$_GET['email'];
    $hash =$_GET['hash']; 	
	$sql="SELECT email from users where email='".$email."' AND hash='".$hash."' AND activated='0'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{   session_start();
	    $_SESSION["email"]=$email;
		$sql="UPDATE users SET activated='1' WHERE email='".$email."' AND hash='".$hash."' AND activated='0'";
		$result=$conn->query($sql);
		$sql="INSERT INTO `post`(`email`) VALUES ('".$email."')";
		$result=$conn->query($sql);
		header('Location: update.php');
        //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
	}
	else
		echo "error";
}
?>