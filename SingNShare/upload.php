<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">

   userName: <input type="text" name="name" required><br>  
 filename: <input type="file" name="file"><br> 
 <input type="submit" value="Upload" name="disp">
</br>
</br>
</form>

</body>
</html>
<?php   //This is the directory where images will be saved
 session_start(); 
 if(isset($_POST['disp']))
 {
	 
 
	$target = "uploads/"; 
	$target = $target . basename( $_FILES['file']['name']);  
	//This gets all the other information from the form  
	$name=$_POST['name']; 
	extract($_POST);
	$pic=($_FILES['file']['name']);
   // Connects to your Database  
	mysql_connect('localhost','root','','mydb') or die(mysql_error()) ;
	mysql_select_db("mydb") or die(mysql_error()) ;   //Writes the information to the database 
	mysql_query("INSERT INTO songs VALUES ('$name','$pic',current_timestamp,'$target')") ; 
  //Writes the photo to the server
	if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$_FILES['file']['name']))  {   
	//Tells you if its all ok 
	echo "The file ". basename( $_FILES['file']['name']). " has been uploaded, and your information has been added to the directory";  }  else { 
  //Gives and error if its not 
	echo "Sorry, there was a problem uploading your file."; 
	} 

		$query=mysql_query("select * from songs");
		echo "<table>";
		while($all_audio=mysql_fetch_array($query))
 
		{
			echo "<tr><th>";
			echo $_SESSION['username']."Has uploaded this song.";
			echo "</th></tr>";
			echo "<tr><th>";
			$a=$all_audio['title'];
			echo "".$a."<th></tr>";
			echo "<tr><th>";
			?>
			<audio   controls>
<!--	<source src="uploads/" type="audio/mpeg"> -->
			<source src="<?php echo $all_audio['path'];  ?>" type="audio/mpeg">
 
			Your browser does not support the audio tag
			</audio> 
 <?php echo "</th></tr>";} echo "</table>"; 
 
 
 
 }?>
 
 