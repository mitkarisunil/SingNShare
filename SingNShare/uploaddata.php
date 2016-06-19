<?php
   
    $username=$_POST['username'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	if($cpass==$pass)
	{  echo $username."<br>";
		echo $email."<br>";
		echo $pass."<br>";
		echo $cpass."<br>";
		$con=mysqli_connect('localhost','root','','mydb');
		if($con)
		{
			echo "connection successful";
			$sql="insert into register values('$email','$pass','$username')";
			//echo $sql;
			$status=mysqli_query($con,$sql);
			echo $status;
			if($status)
			{
				header('location:index.php#login');
				echo "you are successfully registered";
			}
			else
			{
				echo mysqli_error();
			}
		}
	}
	else
	{
		header('location:index.php#reg');
		echo '<span style="color:#AFA;text-align:center;">passwords Not matched.</span>';
	}
	
?>