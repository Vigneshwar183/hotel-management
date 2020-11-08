<!DOCTYPE html>
<html>

<head>
	<title>Hotel Escober</title>
	<link rel="stylesheet" href="../css/style.css">
</head>




<body>
	
<div class="heading">
<img src="../img/title.jpg"/>
</div>

<div class="navigation">
   <a href="../index.php">Home</a>
   <a href="../room/room.php">Room</a>
   <a href="../food/food.php">Food</a>
   <a href="../facilities/facilities.php">Facilities</a>
    <a href="../about/about.php">About</a>
   <a href="#">Contact</a>
</div>




<?php
$id_no = $_POST['id'];
$password = $_POST['pass'];

$id_no = stripcslashes($id_no);
$password = stripcslashes($password);
$id_no = mysql_real_escape_string($id_no);
$password = mysql_real_escape_string($password);

mysql_connect("localhost","root","");
mysql_select_db("hotel");


$result = mysql_query("SELECT * FROM users WHERE id = '$id_no' AND password = '$password'") or 
        die("Failed to query database".mysql_error());

$row = mysql_fetch_array($result);

if($row['id']==$id_no && $row['password']==$password)
{
   ?><div class = "lg">
   <form action = "admin_operation.php" method="POST">
     <input type="submit" name="user" value="USERS"/>
     <p></p>
     <input type="submit" name="rooms" value="ROOM BOOKS"/>
     <p></p>
     <input type="submit" name="bill" value="BILL INFO"/>
     <p></p>
     <input type="submit" name="update" value="UPDATE PRICE"/>
     <p></p>
   </form> 
   </div>
   <?php
}
else
{
	echo "Failed to login";
}

?>




</body>
</html>