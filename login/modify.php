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


<div class="lgd">
  
<?php
     mysql_connect("localhost","root","") or die("Failed to connect".mysql_error());
     mysql_select_db('hotel') or die("failed to query database");

  if(isset($_POST['search']))
  {

     $id = $_POST['id'];
     $req = mysql_query("SELECT * FROM users WHERE id ='$id' ");
     $row_req = mysql_fetch_array($req);
     echo "Name     :".$row_req['username']."<br>";
     echo "ID       :".$row_req['id']."<br>";
     echo "Password :".$row_req['password']."<br>";
     echo "Address  :".$row_req['address']."<br>";
     echo "Phone    :".$row_req['phone']."<br>";
  }

 
  else if(isset($_POST['delete']))
     {
     $id = $_POST['id'];
     mysql_query("DELETE FROM users WHERE id ='$id' ");
     echo "".$id." Has Been Deleted !!";
  }


   else if(isset($_POST['room_deluxe']))
   {
     ?>     
       <form action = "modify_deluxe.php" method="POST">
         <p><label>Enter ID: </label></p>
         <p><input type="text" name="id"/></p>
         <p><label>Enter Check In Date: </label></p>
         <p><input type="date" name="check_in"/></p>
         <p><label>Enter Check Out Date: </label></p>
         <p><input type="date" name="check_out"/></p>
         <p><input type="submit" name="conf_delux" value="CHECK" /></p>
       </form>       

    <?php
    

    $req = mysql_query("SELECT * FROM book_info");

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Bill No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     while($row_req=mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     echo "<br><br><br>Hotel Deluxe Status:<br><br>";
     
     $req_1 = mysql_query("SELECT * FROM room_deluxe");
     while($row_req=mysql_fetch_array($req_1))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }  
   


  }



  else if(isset($_POST['room_premium_deluxe']))
   {
     ?>     
       <form action = "modify_premium_deluxe.php" method="POST">
         <p><label>Enter ID: </label></p>
         <p><input type="text" name="id"/></p>
         <p><label>Enter Check In Date: </label></p>
         <p><input type="date" name="check_in"/></p>
         <p><label>Enter Check Out Date: </label></p>
         <p><input type="date" name="check_out"/></p>
         <p><input type="submit" name="conf_delux" value="CHECK" /></p>
       </form>       

    <?php
    

    $req = mysql_query("SELECT * FROM book_info");

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Bill No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     while($row_req=mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     echo "<br><br><br>Room Premium Deluxe Status:<br><br>";
     
     $req_1 = mysql_query("SELECT * FROM room_premium_deluxe");
     while($row_req=mysql_fetch_array($req_1))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }  
   


  }


  else if(isset($_POST['room_executive_floor']))
   {
     ?>     
       <form action = "modify_executive_floor.php" method="POST">
         <p><label>Enter ID: </label></p>
         <p><input type="text" name="id"/></p>
         <p><label>Enter Check In Date: </label></p>
         <p><input type="date" name="check_in"/></p>
         <p><label>Enter Check Out Date: </label></p>
         <p><input type="date" name="check_out"/></p>
         <p><input type="submit" name="conf_delux" value="CHECK" /></p>
       </form>       

    <?php
    

    $req = mysql_query("SELECT * FROM book_info");

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Bill No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     while($row_req=mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     echo "<br><br><br>Hotel Deluxe Status:<br><br>";
     
     $req_1 = mysql_query("SELECT * FROM room_executive_floor");
     while($row_req=mysql_fetch_array($req_1))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }  
   


  }



else if(isset($_POST['room_executive_suite']))
   {
     ?>     
       <form action = "modify_executive_suite.php" method="POST">
         <p><label>Enter ID: </label></p>
         <p><input type="text" name="id"/></p>
         <p><label>Enter Check In Date: </label></p>
         <p><input type="date" name="check_in"/></p>
         <p><label>Enter Check Out Date: </label></p>
         <p><input type="date" name="check_out"/></p>
         <p><input type="submit" name="conf_delux" value="CHECK" /></p>
       </form>       

    <?php
    

    $req = mysql_query("SELECT * FROM book_info");

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Bill No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     while($row_req=mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     echo "<br><br><br>Hotel Deluxe Status:<br><br>";
     
     $req_1 = mysql_query("SELECT * FROM room_executive_suite");
     while($row_req=mysql_fetch_array($req_1))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }  
   


  }




  else if(isset($_POST['room_predential_suite']))
   {
     ?>     
       <form action = "modify_predential_suite.php" method="POST">
         <p><label>Enter ID: </label></p>
         <p><input type="text" name="id"/></p>
         <p><label>Enter Check In Date: </label></p>
         <p><input type="date" name="check_in"/></p>
         <p><label>Enter Check Out Date: </label></p>
         <p><input type="date" name="check_out"/></p>
         <p><input type="submit" name="conf_delux" value="CHECK" /></p>
       </form>       

    <?php
    

    $req = mysql_query("SELECT * FROM book_info");

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Bill No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     while($row_req=mysql_fetch_array($req))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['bill_no'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }

     echo "<table border='2'>
     <tr>
     <th>Room No</th>
     <th>ID No.</th>
     <th>Check In Date</th>
     <th>Check Out Date</th>
     </tr>";
     
     echo "<br><br><br>Hotel Deluxe Status:<br><br>";
     
     $req_1 = mysql_query("SELECT * FROM room_predential_suite");
     while($row_req=mysql_fetch_array($req_1))
     {
         echo "<tr>";
         echo "<td>" . $row_req['room_no'] . "</td>";
         echo "<td>" . $row_req['id'] . "</td>";
         echo "<td>" . $row_req['check_in_date'] . "</td>";
         echo "<td>" . $row_req['check_out_date'] . "</td>";
         echo "</tr>";
     }  
   


  }


  if(isset($_POST['bill_final']))
  {
    $id_no = $_POST['id_no'];
    $res = mysql_query("SELECT * FROM bill_calc WHERE ID = '$id_no' ");
    echo "ID NO : ".$id_no."<br><br>";
    echo "Bill Numbers Are : <br>" ;
    while($row_res = mysql_fetch_array($res))
    {
        echo "".$row_res['bill_no']."<br>";
    }



  }

  
  if(isset($_POST['confirm_room_price']))
  {
    $name = $_POST['room_name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("UPDATE room_price SET price = '$cost' WHERE name = '$name' ");

    echo "Done !!";
  }

  if(isset($_POST['confirm_breakfast']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("UPDATE food_breakfast SET price = '$cost' WHERE name = '$name' ");

    echo "Done !!";
  }

  if(isset($_POST['confirm_lunch']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("UPDATE food_lunch SET price = '$cost' WHERE name = '$name' ");

    echo "Done !!";
  }


   if(isset($_POST['confirm_dinner']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("UPDATE food_dinner SET price = '$cost' WHERE name = '$name' ");

    echo "Done !!";
  }



    if(isset($_POST['confirm_facility']))
    {
      $name = $_POST['name'];
      $cost = $_POST['price'];
    
      mysql_connect("localhost","root","");
      mysql_select_db("hotel");
      mysql_query("UPDATE facility SET price = '$cost' WHERE name = '$name' ");

      echo "Done !!";
    }


 if(isset($_POST['confirm_add_breakfast']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("INSERT INTO food_breakfast(name,price) VALUES('$name','$cost')");

    echo "Done !!";
  }


  if(isset($_POST['confirm_add_dinner']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("INSERT INTO food_dinner(name,price) VALUES('$name','$cost')");

    echo "Done !!";
  }


  if(isset($_POST['confirm_add_lunch']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("INSERT INTO food_lunch(name,price) VALUES('$name','$cost')");

    echo "Done !!";
  }


  if(isset($_POST['confirm_add_facility']))
  {
    $name = $_POST['name'];
    $cost = $_POST['price'];
    
    mysql_connect("localhost","root","");
    mysql_select_db("hotel");
    mysql_query("INSERT INTO facility(name,price) VALUES('$name','$cost')");

    echo "Done !!";
  }



?>

</div>


</body>
</html>
