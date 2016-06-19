<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sing N Share</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sing&Share</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Upload Song</a>
                    </li>
                    <li>
                        <a href="#">Upload image</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
              <!DOCTYPE html>
<html>
<body>
<form method="post" enctype="multipart/form-data">

 
 filename: <input type="file" name="file" required><br> 
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
	 
 
	$target = "images/"; 
	$target = $target . basename( $_FILES['file']['name']);  
	//This gets all the other information from the form  
	$name=$_POST['name']; 
	extract($_POST);
	$pic=($_FILES['file']['name']);
   // Connects to your Database  
	mysql_connect('localhost','root','','mydb') or die(mysql_error()) ;
	mysql_select_db("mydb") or die(mysql_error()) ;   //Writes the information to the database 
	mysql_query("INSERT INTO images VALUES ('$name','$pic',current_timestamp,'$target')") ; 
  //Writes the photo to the server
	if(move_uploaded_file($_FILES['file']['tmp_name'], "images/".$_FILES['file']['name']))  {   
	//Tells you if its all ok 
	echo "The file ". basename( $_FILES['file']['name']). " has been uploaded, and your information has been added to the directory";  }  else { 
  //Gives and error if its not 
	echo "Sorry, there was a problem uploading your file."; 
	} 

		$query=mysql_query("select * from images");
		echo "<table>";
		while($all_audio=mysql_fetch_array($query))
 
		{
			
			echo '<div class="list-group"><a  class="list-group-item active">'.$_SESSION['username']. ' Has uploaded this image.</a>';
			
			
			echo '<a class="list-group-item">'.$a=$all_audio['title'].'</a>';
						
			?>
			<a  class="list-group-item">
			
<img  width="200" height="200" alt="<?php echo $all_audio['path'];?> "  src="<?php echo $all_audio['path'];  ?>" type="image/*">
 
			
			</a>
			</div>
 <?php ;}
 
 
 }?>
 
 
 
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
