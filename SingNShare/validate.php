<?php
	session_start();
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	if(isset($email)&&isset($pass))
	{		
		$con=mysqli_connect('localhost','root','','mydb');
		if($con)
		{
			echo "connection successful";
			
 
			$sql="select * from register where email='$email' AND pass='$pass'";
			
			//echo $sql;
			$result=mysqli_query($con,$sql);
			$count=mysqli_num_rows($result)or die(mysqli_error($con));
			if($count==1)
			{
				$row=mysqli_fetch_array($result);
				//echo "you have successfully logged"."<br>";
				$_SESSION['username']=$row[2];
				$_SESSION['id']=$row[3];
				header('location:sing/index.php');
			}
			else
			{
				echo "Multiple users exist with same email id ".$email."<br>";
				echo "or entered email id not registered";
			}
		}
	}
	else
	{
		echo "Incorrect Credentials";
	}
	
?>