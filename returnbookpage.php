 
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
		<input type="button" value="<< Back <<" style='width:100' onclick="location='studentPage.php'" ><br><br>
		<div style align="center"><br><br><br><br><br><br><br><br><br>
		
		<b> <h3>RETURN BOOK PAGE</h3> </b>
		<hr width="325" align="center"> 

	<table border="1">
	<h3>Enter book number to return &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : 
		<input type='text' name='deleteThisID' style="width:120px"  maxlength="15"><br></h3>
	<input type='submit' name='deleteBook' style="width:120px" value="Delete this book"  maxlength="15"><br>
	<hr width="325" align="center"> <br>
	
</form> 

<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

error_reporting(E_ALL^E_DEPRECATED);
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());
}	
	

	$studentIDfromLogin= $_SESSION['studentIDNO'];
	//echo "ID   :  $studentIDfromLogin";
		$sql1="SELECT * FROM studentbooks WHERE stuNO='$studentIDfromLogin'";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}



			while($row=mysqli_fetch_assoc($query1)){
		echo "<table border='1'>
<tr>
<td>
	book ID:</td><td> <input type='text' name =bookNO value='$row[bookNo]' readonly> <br></td></tr>
<tr>
<td>
	book Name :</td><td> <input type='text' name='bookName' style='width:250px' value='$row[bookName]' readonly><br></td></tr>
<tr>";
		
	}


	if(isset($_POST['deleteBook']) && !empty($_POST['deleteThisID']) ){

		$deleteThisBookNumber=$_POST['deleteThisID'];

		$sql2 = "SELECT * FROM studentbooks WHERE bookNo='$deleteThisBookNumber' AND stuNO='$studentIDfromLogin'";
		$query2=mysqli_query($connection,$sql2);
		if (!$query2) {   die('Invalid query: ' . mysql_error());}

		if(mysqli_num_rows($query2)==0 || mysqli_num_rows($query2)==NULL){
			//header("Refresh:0");
			echo "<b>CHECK YOUR BOOK NO!!<b>";

		}
		else{
			//$row=mysqli_fetch_assoc($query1);
			
			while($row=mysqli_fetch_array($query2)){	
				$kitapAdi= $row['bookName'];
				$kitapYazari= $row['bookAuthor'];
				$kitapSayfa= $row['bookPage'];
				$kitapYil= $row['bookRelease'];
				$kitapSeri= $row['bookNo'];
			}

			$sql4= "INSERT INTO booklist(bookSeri, bookName, bookAuthor, bookPage, bookRelease) 
								   VALUES ('$kitapSeri' , '$kitapAdi','kitapYazari','$kitapSayfa','$kitapYil')  ";
			$query4=mysqli_query($connection,$sql4);
			if (!$query4) {   die('Invalid query: ' . mysql_error());}
			
			
			$sql3="DELETE FROM  studentbooks WHERE bookNo='$deleteThisBookNumber'  ";
			$query3=mysqli_query($connection,$sql3);
			if (!$query3) {   die('Invalid query: ' . mysql_error());}
			
			header("Refresh:0");

		}
	}
?>

</div>
</head><body bgcolor = "#990000">
</body>
</html>