<html>
<head>
<title>Signup</title>
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
    $email = $_POST['email'];
    $hash=md5(rand(0,1000));
	$password=rand(1000,5000);
	//$sql="INSERT INTO users(email,password,hash) VALUES('". mysql_escape_string($email) ."', '". mysql_escape_string(md5($password)) ."', '". mysql_escape_string($hash) ."') ";
    $sql="INSERT INTO `users` ( `email`, `password`, `hash`) VALUES ('". mysql_escape_string($email) ."', '". mysql_escape_string($password) ."', '". mysql_escape_string($hash) ."')";
	$result=$conn->query($sql);
	
	require './PHPMailer-master/PHPMailerAutoload.php';
	require './PHPMailer-master/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;          
    $mail->Username = 'satheshrgs@gmail.com';                 
    $mail->Password = 'Hsehtasrgs12345';                      
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('no-reply@agromart.com', 'AgroMart');
    $mail->addAddress($email, 'AgroMart User');     
    $mail->isHTML(true);                                  
    $mail->Subject = 'Verification for AgroMart';
    $mail->Body    = 'Thanks for signing up!<br>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br>
 
------------------------<br>
Username: '.$email.'<br>
Password: '.$password.'<br>
------------------------<br>
http://localhost/agromart/verify.php?email='.$email.'&hash='.$hash.'
 
';
    if(!$mail->send()) 
	 {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
     } 
	else 
	 {
      echo 'Message has been sent';
	  echo "Check your mailand verify it";
     }
	
    	
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
<h2>Signup</h2>
<form method="POST" action="<?php $_PHP_SELF ?>">
<br>
<table>
	<tbody>
	<tr></tr><tr></tr>
	<tr>
	<td>Enter your Email ID :</td><td><input type="email" placeholder="Enter Email ID" name="email" required></td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr>
	<td colspan="2"><input type="submit" class="button" name="submit" value="Signup" style="width:100%;"></td><td></td>
	</tr>
</table>
</center>
</body>
</html>