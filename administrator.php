<?php
include("connect.php");
error_reporting();

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



<?php
include("connect.php");
error_reporting(0);
?>

<h1>Administrator</h1>
<h2>Insert</h2>
<form action="" method="GET">
	 
	User Name <input type="text" name="name" value=""><br></br>
	Password <input type="text" name="type" value=""><br></br>
	<input type="submit" name="submit" value="submit">


</form>




<?php 
$rn="";
$nm=$_GET['name'];
$rn1=$_GET['type'];



if($_GET['submit']){
	if($nm!=""&&$rn1!=""&&$nm1!=""){
		echo $nm." ";
		$query="INSERT INTO signin VALUES('$nm','$rn1')";
		$data=mysqli_query($conn,$query);
		if($data){
		echo "Data is inserted";}
		else{
			echo "data is not inserted";
		}
	}
	else{
		echo "All fields are required";
	}
}


?>
</div>
</body>
</html>


<div class="container">
	<h2>Display</h2>

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
$query="SELECT * FROM signin";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);




if($total>0){

	?>
	<table>
		<tr>
			<th>Administator ID</td>
			<th>User Name</td>
			<th>Password</td>
		</tr>
	
	<?php
	while($result=mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['id']."</td>
				<td>".$result['name']."</td>
				<td>".$result['password']."</td>
				
			</tr>";
	}
	
}
else{
	echo "result not found";

}

?>

</table>


<div class="container"><a href="administrator_upd.php">Update</a>
<a href="administrator_del.php">Delete</a>
<a href="administrator_search.php">Search</a>
</div>