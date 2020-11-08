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
	?> <div class = "lgeed"> <?php echo "Login successful. Welcome ".$row['username']."<br><br><br>";
   $bill_gen = mysql_query("SELECT bill_no FROM users WHERE id = '$id_no' ");
   $bill_row = mysql_fetch_array($bill_gen);
   $bill = $bill_row['bill_no'];

   $data_gen = mysql_query("SELECT * FROM billing WHERE bill_no ='$bill'");

   $room_info = mysql_query("SELECT * FROM room_calc WHERE bill_no = '$bill' ");


   echo "Room No: ";
   while($row_room_info = mysql_fetch_array($room_info) )
   {
    echo "".$row_room_info['room_no'].",";
     $rr_check_in  = $row_room_info['check_in_date'];
     $rr_check_out = $row_room_info['check_out_date'];
   }
   echo "<br><br>";
   
   $tt = mysql_num_rows($room_info);
   if($tt==0){
    echo "---";
   }
   else{
     ?><h3><?php
     echo "Check in Date:   ".$rr_check_in."<br>";
     echo "Check out Date: ".$rr_check_out."<br>";
  ?></h3><?php
   }


   echo "<br><br>";


   echo "<table border='1'><tr>
   <th>Services</th>
   <th>Price</th>
   <th>Date</th>
   </tr>";
   while($data = mysql_fetch_array($data_gen))
   {
      

    echo "<tr>";
    echo "<td>" . $data['services'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['date'] . "</td>";
    echo "</tr>";
   }
   echo "</table>";
   $total = mysql_query("SELECT SUM(price) AS total FROM billing WHERE bill_no = '$bill' ");
   $row_total = mysql_fetch_array($total);
   $sum = $row_total['total'];
   echo "<br><br>The Total is: ".$sum;
 
  ?> </div> <?php
     
}
else
{
	?> <div class = "lgeed"> <?php echo "Failed to login!<br>Please Try Again!"; ?> </div> <?php
}

?>


</body>
</html>