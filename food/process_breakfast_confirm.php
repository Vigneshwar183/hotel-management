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

$id       = $_POST['id'];
$pass     = $_POST['pass'];
$room     = isset($_POST['room']) ? $_POST['room']:false;
$room_no  = $_POST['room_no'];

session_start();
$serv     = $_SESSION['selection'];
$numb     = $_SESSION['number'];


  mysql_connect("localhost","root","");
  mysql_select_db("hotel");

$id_confirm   = mysql_query("SELECT * FROM users WHERE id = '$id' AND password = '$pass' ");
$row_id       = mysql_fetch_array($id_confirm);
$bill         = $row_id['bill_no'];

if($row_id)
{
	
	$room_confirm = mysql_query("SELECT * FROM $room WHERE room_no = '$room_no' ") or die("Failed to Query Table");
	$row_room = mysql_fetch_array( $room_confirm );

	if($row_room)
	{		 
		if($row_room['id']==$row_id['id'])
		{
          ?> <div class="lged"> <?php
          echo " Congratz ".$row_id['username']."<br>Your Order has been Received !<br><br><br>";
          ?> </div> <?php
          $result     = mysql_query("SELECT * FROM food_breakfast WHERE name = '$serv'");
          $row_result = mysql_fetch_array($result);
          $price      = $row_result['price'];
          $total      = ($price * $numb);
          $date       = date('y-m-d');
      
          mysql_query("INSERT INTO billing(bill_no,services,price,date) VALUES('$bill','$serv','$total','$date')");
		}
		else
		{
			?> <div class="lged"> <?php
			echo "Your Room no according to your ID is not found !<br><br><br>";
			?> </div> <?php
		}
	}
	else
	{
		?> <div class="lged"> <?php
		echo "Room No. not Found ! <br>Please Enter Your Room No. Correctly !<br><br><br>";
		?> </div> <?php
	}
}
else
{
	?> <div class="lged"> <?php
     echo "ID and Password do not match <br>Please Enter ID and Password Correctly !<br><br><br>";
    ?> </div> <?php
}

?>
</div>


</body>
</html>