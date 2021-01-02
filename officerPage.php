 
<html>
	<head>
		<style type="text/css">
			h2 {
				
    			color: white;
    			text-shadow: 5px 3px 2px #000000;
			}
			h3 {
				text-size:20;
				color: white;
				text-shadow: 3px 3px 4px #000000;

			}
		
		</style>
		<form action="" method="POST">
		
		<input type="button" value="<< Exit <<" onclick="location='index.php'" ><br><br>
		
		<div style align="center"><br><br><br><br><br><br><br><br><br>
		
		<b><h3>Officer Page</h3></b>
		<hr width="125" align="center"> 

	<table border="1">
	<input type="submit" name="addBook"  value="ADD BOOK">
	<input type="submit" name="delBook"  value="DELETE BOOK"><br>
	<input type="submit" name="addStu"  value="ADD STUDENT">
	<input type="submit" name="delStu"  value="DELETE STUDENT">	
	
</form> 

<?php
	session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

	error_reporting(E_ALL^E_DEPRECATED);
	$connection=mysqli_connect("localhost","root","","librarymanagesystem");
	if(!$connection){
		die("CANNOT CONNECTED" .mysqli_connect_error());
	}	
	
	if(isset($_POST['addBook'])){

	header("location:addbookpage.php");
	}	
	if(isset($_POST['delBook'])){

	header("location:delbookpage.php");
	}	
	if(isset($_POST['addStu'])){

	header("location:addstupage.php");
	}	
	if(isset($_POST['delStu'])){

	header("location:delstupage.php");
	}




?>

</div>
</head><body bgcolor = "#3377ff">
</body>
</html>