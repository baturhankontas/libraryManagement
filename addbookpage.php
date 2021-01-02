 
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
		<input type="button" value="<< Exit <<" style='width:100' onclick="location='index.php'" ><br>
		<input type="button" value="<< Back <<" style='width:100' onclick="location='officerPage.php'" ><br><br>
		
		
		<div style align="center"><br><br><br><br><br><br><br><br><br>
		
		<b><h3>ADD BOOK SYSTEM</h3></b>
		<hr width="240" align="center"> 

	<table border="1">

	<h3>Book Seri  &nbsp;&nbsp;&nbsp;&nbsp; :
		<input type='text' name='addBookSeri' style="width:100px" maxlength="7"><br></h3>  	
	<h3>Book Name  &nbsp; :
		<input type='text' name='addBookName' style="width:100px" width="40" maxlength="60"><br></h3>
	<h3>Book Author : 
		<input type='text' name='addBookAuthor' style="width:100px" maxlength="30"><br></h3>  	
	<h3>Book Page  &nbsp;&nbsp;&nbsp; :
		<input type='text' name='addBookPage' style="width:100px" maxlength="5"><br></h3>  	
	<h3>Book Year  &nbsp;&nbsp;&nbsp; :
		<input type='text' name='addBookYear' style="width:100px" maxlength="5"><br></h3>  	

	<input type="submit" name="addBook"  value="ADD BOOK">
	
	
</form> 

<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

error_reporting(E_ALL^E_DEPRECATED);
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());
}	
	
	

	if(isset($_POST['addBook']) && !empty($_POST['addBookName'])  && !empty($_POST['addBookSeri'])
		&& !empty($_POST['addBookPage']) && !empty($_POST['addBookYear']) && !empty($_POST['addBookAuthor']) ){


		$kitapAdi = $_POST['addBookName'];
		$kitapYazar = $_POST['addBookAuthor'];
		$kitapSayfa = $_POST['addBookPage'];
		$kitapYil = $_POST['addBookPage'];
		$kitapSeri = $_POST['addBookSeri'];

		$sql1 = "SELECT * FROM booklist WHERE bookSeri='$kitapSeri'";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}

		if(mysqli_num_rows($query1)==0 || mysqli_num_rows($query1)==NULL){
			//header("Refresh:0");
			$sql2= "INSERT INTO booklist(bookSeri, bookName, bookAuthor,bookPage, bookRelease) 
								   VALUES ('$kitapSeri', '$kitapAdi','kitapYazari','$kitapSayfa','$kitapYil')  ";
			
			$query2=mysqli_query($connection,$sql2);
			if (!$query2) {   die('Invalid query: ' . mysql_error());}

			echo "<br><br><h3><b>BOOK IS ADDED</b></h3>";

			
		}
		else
			echo "<br><br><h3><b>THE BOOK IS ALREADY IN THE LIST</b></h3>";


	}





?>

</div>
</head><body bgcolor = "#3377ff">
</body>
</html>