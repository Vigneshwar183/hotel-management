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

$name = $_POST['user'];
$password = $_POST['pass'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone_no = $_POST['phone'];
$new_id = mt_rand(10000000,99999999);
$new_bill = mt_rand(100,999);



$name = stripcslashes($name);
$password = stripcslashes($password);
$email = stripcslashes($email);
$address = stripcslashes($address);
$phone_no = stripcslashes($phone_no);


$name = mysql_real_escape_string($name);
$password = mysql_real_escape_string($password);
$email = mysql_real_escape_string($email);
$address = mysql_real_escape_string($address);
$phone_no = mysql_real_escape_string($phone_no);


mysql_connect("localhost","root","");
mysql_select_db("hotel");

$result = mysql_query("SELECT * FROM users " ) or 
        die("Failed to query database".mysql_error());
$row = mysql_fetch_array($result);


 if($new_id != $row['id'])
 {
    if($new_bill != $row['bill_no'])
    {
       mysql_query("INSERT INTO users(id,bill_no,username,password,email,address,phone) VALUES('$new_id','$new_bill','$name','$password','$email','$address','$phone_no')");
       echo "Welcome ".$name."<br>";
       echo"Your ID No. is:  ".$new_id."<br>";
    }
 }

 else
{
    while($new_id != $row['id'] )
    {
       $new_id = mt_rand(10000000,99999999);
    }
    while($new_bill != $row['bill_no'])
    {
      $new_bill = mt_rand(100,999);
    }
    mysql_query("INSERT INTO users(id,bill_no,username,password,email,address,phone) VALUES('$new_id','$new_bill','$name','$password','$email','$address','$phone_no')");

       echo "Welcome ".$name."<br>";
       echo"Your ID No. IS ".$new_id."<br>";
       echo"Your Bill No. IS ".$new_bill."<br>";
}

?>




</body>
</html>