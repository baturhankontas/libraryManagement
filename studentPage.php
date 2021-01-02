
<html>
	<head>
		<style type="text/css">
			h2 {				
    			color: white;
    			text-shadow: 5px 3px 2px #000000;
			}
			h3 {
				text-size:40;
				color: white;
				text-shadow: 3px 3px 4px #000000;

			}
	
		</style>
		<form action="" method="POST">
		
		<input type="button" value="<< Exit <<" onclick="location='index.php'" ><br><br>
		
		<div style align="center"><br><br><br><br><br><br><br><br><br>
		
		<b><h3> <font size="6" >Student Book Manage Page</font></h3></b>
		<hr width="225" align="center"> 

	<table border="1">
	<input type="submit" name="borrowBookpage"  value="BORROW BOOK">
	<input type="submit" name="returnBookpage"  value="RETURN BOOK">
	<hr width="225" align="center"> 	
	
</form> 

<?php 
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   	

error_reporting(E_ALL^E_DEPRECATED);
$connection=mysqli_connect("localhost","root","","librarymanagesystem");
if(!$connection){
	die("CANNOT CONNECTED" .mysqli_connect_error());
}	
	
	if(isset($_POST['borrowBookpage'])){
	header("location:borrowbookpage.php");
	}
	if(isset($_POST['returnBookpage'])){
	header("location:returnbookpage.php");
	}

	$studentIDfromLogin= $_SESSION['studentIDNO'];

		$sql1="SELECT * FROM studentbooks WHERE stuNO='$studentIDfromLogin'";
		$query1=mysqli_query($connection,$sql1);
		if (!$query1) {   die('Invalid query: ' . mysql_error());}
	
	

	echo "	<font size='5' color='white' >My Books</font>
			<hr width='225' align='center'> ";


	echo "	<table border='1'>
				<tr>
					<td style='width:75px' style='text-align:center'>
						<font color='white' size='4'>ID</font></td>

					<td style='width:66' style='text-align:center'>
						<font color='white' size='4'>Book ID</font></td>

					<td style='width:270' style='text-align:center'>
						<font color='white' size='4'>Book Name</font></td>

					<td style='width:100' style='text-align:center'>
						<font color='white' size='4'>Book Author</font></td></tr>

					";






	while($row=mysqli_fetch_assoc($query1)){
		echo "<table border='1'>
<tr>
<td> <input type='text' style='width:75'   name='stuNO' value='$row[stuNO]'><br></td>

<td> <input type='text' style='width:66'   name =bookNO value='$row[bookNo]'> <br></td>

<td> <input type='text' style='width:270px'name='bookName'  value='$row[bookName]'><br></td>

<td> <input type='text' style='width:100'   name='bookAuthor' value='$row[bookAuthor]'><br></td></tr>";
		
	}




?>

</div>
</head><body bgcolor = "#990000">
</body>
</html>