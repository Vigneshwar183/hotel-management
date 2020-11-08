<!DOCTYPE html>
<html>

<head>
	<title>Hotel Escober</title>
	<link rel="stylesheet" href="../css/style.css">
</head>


<body>


<div class="Login">
<a href="../login/login_admin.php">Admin Login</a>
<a href="../login/login_user.php">User Login</a>
<a href="../login/registration.php">Registration</a>
</div>



<div class="heading">
<img src="../img/title.jpg"/>
</div>


<div class="navigation">
   <a href="../index.php">Home</a>
   <a href="../room/room.php">Room</a>
   <a href="food.php">Food</a>
   <a href="../facilities/facilities.php">Facilities</a>
    <a href="../about/about.php">About</a>
   <a href="../contact/contact.php">Contact</a>
</div>


<div class="body_1">
<div class="lg_date">
<h3>
 <script language="javascript">
 var today = new Date();
 document.write(today);
 </script>
 </h3>
</div>
</div>



<?php
$name = $_POST['selection'];
session_start();
$_SESSION['selection'] = $_POST['selection'];


mysql_connect("localhost","root","root");
mysql_select_db("hotel");-

$result=mysql_query("SELECT * FROM facility WHERE name = '$name'");
$row_result = mysql_fetch_array($result);
$price = $row_result['price'];
?> <div class="lged">  <?php   
echo "Total Price = ".$price."<br><br>";
?> <form action = "process_facilities_confirm.php" method ="POST">
   <p><label>Enter Your ID: </label></p>
   <p><input type="text" name="id" class = "box"></p>
   <p><label>Enter Your Password: </label></p>
   <p><input type="password" name="pass" class = "box"></p>
   <p><label>Room Type: </label>
   <select name="room" class = "opt">
   <option value="room_deluxe">1.Deluxe</option>
   <option value="room_premium_deluxe">2.Premium Deluxe</option>
   <option value="room_executive_floor">3.Executive Club Floor</option>
   <option value="room_executive_suite">4.Executive Suite</option>
   <option value="room_predential_suite">5.Predential Suite</option>
   </select></p>
   <p><label>Room No: </label></p>
   <p><input type="text" name="room_no" class = "box"></p>
   <p><input type="submit" name="submit" value="CONFIRM" class = "submt"></p>
   </form>
   </div>
   <?php



?>



</body>
</html>