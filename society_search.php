<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>



<?php
include("connect.php");
error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Society Management System</title>
<link rel="stylesheet" type="text/css" href="tablecss.css">
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
	<div class="search-box">
		<img src="images/logo.png" class="logo">
		<input type="text" class="form-control">
		<span class="input-group-text"><i class="fa fa-search"></i></span>
	</div>
<div class="menu-bar">
	<ul>
		<li><a href="frontpage.html"><i class="fa fa-home"></i>Home</a></li>
		<li><a href="frontpage.html"><i class="fa fa-sign-out"></i>Log-out</a></li>
		<li><a href="tables.php"><i class="fa fa-address-book"></i>Database</a></li>
	</ul>
</div>
</div>

<div class="container">
<form action="" method="GET">
	pincode <input type="text" name="pincode" value=""><br></br>
	<input type="submit" name="submit" value="submit">


</form>

<?php
if($_GET['submit']){
	$rn45=$_GET['pincode'];
	$query="SELECT * FROM location where loc_pin=$rn45";
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
	if($total>0){

	?>
	<table>
		<tr>
			<th>Pincode</td>
			<th>City</td>
		</tr>
	
	<?php
	echo "<font color='green'> Reult found";
	while($result=mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['loc_pin']."</td>
				<td>".$result['loc_city']."</td>
			</tr>";
	}
	
}
else{
	echo "<font color='red'>result not found";

}






}
else{
	echo "<font color='blue'>click on search button";
}
?>

</table>
</div>
</body>
</html>