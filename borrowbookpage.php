 
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
		
		<b> <h3>BORROW BOOK PAGE</h3> </b>
		<hr width="325" align="center"> 

	<table border="1">
	<h3>Enter book number to borrow &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : 
		<input type='text' name='borrowThisID' style="width:120px"  maxlength="15"><br></h3>
	<input type='submit' name='borrowBook' style="width:120px" value="Borrow this book"  maxlength="15"><br>
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
		$sql1="SELECT bookSeri,bookAuthor,bookName,bookRelease FROM booklist";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}



		echo "<table border='1'>
<tr>
<td style=\"width:55px\" style=\"text-align:center\">
	<font color=\"white\" size=\"5\">ID</font></td>

<td style=\"width:280 \" style=\"text-align:center\">
	<font color=\"white\" size=\"5\">Avaible books</font></td></tr>";


			while($row=mysqli_fetch_assoc($query1)){
		echo "<table border='1'>
<tr>
<td> <input type='text' name =bookNO style='width:55px' value='$row[bookSeri]' readonly> <br></td>

<td> <input type='text' name='bookName' style='width:280px' value='$row[bookName]' readonly><br></td></tr>
";
		
	}


	if(isset($_POST['borrowBook']) && !empty($_POST['borrowThisID']) ){

		$borrowThisBookNumber=$_POST['borrowThisID'];

		$sql2 = "SELECT * FROM booklist WHERE bookSeri='$borrowThisBookNumber'";
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
				$kitapSeri= $row['bookSeri'];
			}

			$sql4= "INSERT INTO studentbooks(stuNO, bookNo, bookName, bookAuthor,bookPage, bookRelease) 
								   VALUES ('$studentIDfromLogin','$kitapSeri' , '$kitapAdi','kitapYazari','$kitapSayfa','$kitapYil')  ";
			$query4=mysqli_query($connection,$sql4);
			if (!$query4) {   die('Invalid query: ' . mysql_error());}
			
			
			$sql3="DELETE FROM  booklist WHERE bookSeri='$borrowThisBookNumber'  ";
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