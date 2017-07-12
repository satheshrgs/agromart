<?php
if(isset($_GET['latitude']) && !empty($_GET['latitude']) AND isset($_GET['longitude']) && !empty($_GET['longitude']))
{  
    echo $latitude =$_GET['latitude'];
    echo $longitude =$_GET['longitude']; 	
	session_start();
	$email=$_SESSION['email'];
	$_SESSION['latitude']=$latitude;
	$_SESSION['longitude']=$longitude;
	$servername="localhost";
    $username="root";
    $password="";
    $conn=new mysqli($servername,$username,$password,"agromart");
	
    if($conn->connect_error)
     {
	   die("Connection Failure".$conn->connect_error);
     }
	 $email=$_SESSION['email'];
	
    $sql="UPDATE `post` SET `latitude`='".$latitude."' where email='".$email."'";
    $result=$conn->query($sql);
	$sql="UPDATE `post` SET `longtitude`='".$longitude."' where email='".$email."'";
    $result=$conn->query($sql);
	//header('Location: ../../main.php');
}
?>