 
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
		
		<b><h2>DELETE BOOK SYSTEM</h2></b>
		<hr width="205" align="center"> 

	<table border="1">
	
		<h3>Book Seri   : 
		<input type='text' name='delBookSeri' style="width:100px" width="40" maxlength="10"><br></h3>
		
		<input type="submit" name="delBook"  value="DELETE BOOK"><br>
		<hr width="205" aling="center">

	
</form> 

<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

error_reporting(E_ALL^E_DEPRECATED);
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());
}


$sql9="SELECT bookSeri,bookAuthor,bookName,bookRelease FROM booklist";
		$query9=mysqli_query($connection,$sql9);
		if (!$query9) {   die('Invalid query: ' . mysql_error());}
echo "<table border='1'>
<tr>
<td style=\"width:55px\" style=\"text-align:center\">
	<font color=\"white\" size=\"5\">ID</font></td>

<td style=\"width:280 \" style=\"text-align:center\">
	<font color=\"white\" size=\"5\">Avaible books</font></td></tr>";


			while($row=mysqli_fetch_assoc($query9)){
		echo "<table border='1'>
<tr>
<td> <input type='text' name =bookNO style='width:55px' value='$row[bookSeri]' readonly> <br></td>

<td> <input type='text' name='bookName' style='width:280px' value='$row[bookName]' readonly><br></td></tr>
";
		
	}


	if(isset($_POST['delBook']) && !empty($_POST['delBookSeri']) ){

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

/*
	if(isset($_POST['delBook']) && !empty($_POST['delBookName'])  && !empty($_POST['delBookSeri'])
		 && !empty($_POST['delBookYear']) && !empty($_POST['delBookAuthor']) ){


		$kitapAdi = $_POST['delBookName'];
		$kitapYazar = $_POST['delBookAuthor'];
		$kitapYil = $_POST['delBookPage'];
		$kitapSeri = $_POST['delBookSeri'];

		$sql1 = "SELECT * FROM booklist WHERE bookSeri='$kitapSeri'";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}

		if(mysqli_num_rows($query1)!=NULL){
			//header("Refresh:0");
			$sql2="DELETE FROM  booklist WHERE bookSeri='$borrowThisBookNumber'  ";
			
			$query2=mysqli_query($connection,$sql2);
			if (!$query2) {   die('Invalid query: ' . mysql_error());}

			echo "<br><br><h3><b>BOOK IS ADDED</b></h3>";

			
		}
		else
			echo "<br><br><h3><b>THE BOOK IS ALREADY IN THE LIST</b></h3>";


}
*/
?>

</div>
</head><body bgcolor = "#3377ff">
</body>
</html>