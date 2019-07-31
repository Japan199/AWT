<!DOCTYPE html>
<html>
<head>
   <title>
   display data from database
   </title>
   <style type="text/css">
        table{
            border: 2px solid red;
            background-color: #FFC;
        }
    th{
        border-bottom: 5px solid #000;
    }
    td{
        border-bottom: 2px solid #666;
    }
    </style>
</head>
<body>
  <h1>
  Display data from Database
  </h1>
  <?php
  include('server.php');
  $sqlget = "SELECT * from users";
  $sqldata = mysqli_query($db,$sqlget) or die("error getting");
  echo "<table>";
  echo "<tr><th>ID</th><th>USER NAME</th></tr>";
  while($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
      echo "<tr><td>";
      echo $row['id'];
      echo "</td><td>";
      echo $row['username'];
      echo "</td></tr>";
      echo "<table>";
  } 
  
  ?>
</body>
</html>
