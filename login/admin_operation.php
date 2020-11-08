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

<div class = "lgd">
<?php

   if(isset($_POST['user']))
   {
     
     mysql_connect("localhost","root","") or die("Failed to connect".mysql_error());
     mysql_select_db('hotel') or die("failed to query database");
     
     $req = mysql_query("SELECT * FROM users");
     echo "<table border='2'>
     <tr>
     <th>ID No.</th>
     <th>UserName</th>
     <th>Phone No.</th>
     </tr>";
     while($row_req = mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['username'] . "</td>";
         echo "<td>" . $row_req['phone'] . "</td>";
         echo "</tr>";
     }
     

     ?> 
     <form action="modify.php" method = "POST">
       <p><label>ENTER ID :</label></p>
       <p><input type="text" name="id"/><p>
       <input type="submit" name="search" value="SEARCH ID" />
       <p></p>
       <input type="submit" name="delete" value="REMOVE ID" />
       <p></p>
     </form> 
     
     <?php
   }

   if(isset($_POST['rooms']))
   {
     mysql_connect("localhost","root","") or die("Failed to connect".mysql_error());
     mysql_select_db('hotel') or die("failed to query database");
     $req = mysql_query("SELECT * FROM book_info");

     echo "<table border='2'>
     <tr>
     <th>ID No.</th>
     <th>Bill No.</th>
     <th>Room No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";

     while($row_req = mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";

     }

     ?> 
     <form action="modify.php" method = "POST">
       <label>ROOM STATUS</label>
       <p></p>
       <input type="submit" name="room_deluxe" value="DELUXE" /> 
       <p>
       <input type="submit" name="room_premium_deluxe" value="PREMIUM DELUXE" /> </p>
       <p>
       <input type="submit" name="room_executive_floor" value="EXECUTIVE CLUB FLOOR" /> </p>
       <p>
       <input type="submit" name="room_executive_suite" value="EXECUTIVE SUITE" /> </p>
       <p>
       <input type="submit" name="room_predential_suite" value="PREDENTIAL SUITE" /> </p>
       <p></p><p></p>
       <p><h2>ALL DATA:</h2></p>
     </form>

     <?php

   }

   if(isset($_POST['bill']))
   {
     mysql_connect("localhost","root","") or die("Failed to connect".mysql_error());
     mysql_select_db('hotel') or die("failed to query database");

     $req = mysql_query("SELECT * FROM bill_calc");
     
     echo "<table border='2'>
     <tr>
     <th>ID No.</th>
     <th>Bill No.</th>
     </tr>";

     while($row_req=mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['ID'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "</tr>";
     }

     ?> 
     <form action="modify.php" method = "POST">
       <label>SEARCH ID IN ORDER TO KNOW THE BILL ID(S)</label>
       <p><input type="text" name="id_no"/></p>
       <input type="submit" name="bill_final" value="SHOW" /> 
       <p></p><p></p>
     </form>

     <?php
   }


   if(isset($_POST['update']))
   {
      mysql_connect("localhost","root","") or die("Failed to connect".mysql_error());
      mysql_select_db('hotel') or die("failed to query database");

      echo "<table border='2'>
      <tr>
      <th>Name</th>
      <th>Price</th>
      </tr>";

      $room_rent = mysql_query("SELECT * FROM room_price  ORDER BY price DESC");
      while($row_room_rent = mysql_fetch_array($room_rent))
      {
         echo "<tr>";
         echo "<td>" . $row_room_rent['name'] . "</td>";
         echo "<td>" . $row_room_rent['price'] . "</td>";
         echo "</tr>";
      }
      ?>
      

      <form action="modify.php" method="POST">
        <p><label>Enter Room Name:</label></p>
        <input type="text" name="room_name" />
        <p><label>Enter Room Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_room_price" value="UPDATE ROOM PRICE" /> </p>
      </form>


<?php


       echo "<table border='2'>
      <tr>
      <th>Name</th>
      <th>Price</th>
      </tr>";
      $breakfast = mysql_query("SELECT * FROM food_breakfast");
      while($row_breakfast = mysql_fetch_array($breakfast)){
         echo "<tr>";
         echo "<td>" . $row_breakfast['name'] . "</td>";
         echo "<td>" . $row_breakfast['price'] . "</td>";
         echo "</tr>";
      }
      
?>
      <p><p><p>### Update Breakfast Menu ###</p></p></p>
      
      <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Enter Breakfast Name:</label></p>
        <input type="text" name="name" />
        <p><label>Enter Breakfast Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_breakfast" value="UPDATE BREAKFAST PRICE" /> </p>
      </form>

      <p><p><p>### Add Breakfast Menu ###</p></p></p>
      
        <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Add Breakfast Name:</label></p>
        <input type="text" name="name" />
        <p><label>Add Breakfast Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_add_breakfast" value="CONFIRM BREAKFAST MENU" /> </p>
      </form>





<?php


     echo "<table border='2'>
      <tr>
      <th>Name</th>
      <th>Price</th>
      </tr>";
      $lunch = mysql_query("SELECT * FROM food_lunch");
      while($row_lunch = mysql_fetch_array($lunch)){
         echo "<tr>";
         echo "<td>" . $row_lunch['name'] . "</td>";
         echo "<td>" . $row_lunch['price'] . "</td>";
         echo "</tr>";
      }
      
?>

      <p><p><p>### Update Lunch Menu ###</p></p></p>

      <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Enter Lunch Name:</label></p>
        <input type="text" name="name" />
        <p><label>Enter Lunch Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_lunch" value="UPDATE LUNCH PRICE" /> </p>
      </form>


        <p><p><p>### Add Lunch Menu ###</p></p></p>
      
        <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Add Lunch Name:</label></p>
        <input type="text" name="name" />
        <p><label>Add Lunch Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_add_lunch" value="CONFIRM LUNCH MENU" /> </p>
      </form>

<?php
    

     echo "<table border='2'>
      <tr>
      <th>Name</th>
      <th>Price</th>
      </tr>";
      $dinner = mysql_query("SELECT * FROM food_dinner");
      while($row_dinner = mysql_fetch_array($dinner)){
         echo "<tr>";
         echo "<td>" . $row_dinner['name'] . "</td>";
         echo "<td>" . $row_dinner['price'] . "</td>";
         echo "</tr>";
      }
      
?>

      <p><p><p>### Update Dinner Menu ###</p></p></p>

      <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Enter Dinner Name:</label></p>
        <input type="text" name="name" />
        <p><label>Enter Dinner Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_dinner" value="UPDATE DINNER PRICE" /> </p>
      </form>

        <p><p><p>### Add Dinner Menu ###</p></p></p>
      
        <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Add Dinner Name:</label></p>
        <input type="text" name="name" />
        <p><label>Add Dinner Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_add_dinner" value="CONFIRM DINNER MENU" /> </p>
      </form>


<?php
    


    echo "<table border='2'>
      <tr>
      <th>Name</th>
      <th>Price</th>
      </tr>";
      $facility = mysql_query("SELECT * FROM facility");
      while($row_facility = mysql_fetch_array($facility)){
         echo "<tr>";
         echo "<td>" . $row_facility['name'] . "</td>";
         echo "<td>" . $row_facility['price'] . "</td>";
         echo "</tr>";
      }
      
?>

      <p><p><p>### Update Facility ###</p></p></p>

      <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Enter Facility Name:</label></p>
        <input type="text" name="name" />
        <p><label>Enter Facility Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_facility" value="UPDATE FACILITY PRICE" /> </p>
      </form>

       <p><p><p>### Add Facility ###</p></p></p>
      
        <form action="modify.php" method="POST">
        <p></p><p></p>
        <p><label>Add Facility Name:</label></p>
        <input type="text" name="name" />
        <p><label>Add Facility Price:</label></p>
        <input type="text" name="price" />
        <p><input type="submit" name="confirm_add_facility" value="CONFIRM FACILITY" /> </p>
      </form>

<?php



    

   }
?>
</div>

</body>
</html>