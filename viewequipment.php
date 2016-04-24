<?php
  $con=mysqli_connect("127.0.0.1","root","", "hospitaldb");
  $hospital_name = $_GET["name"];

  if (mysqli_connect_errno($con))
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  if ($_GET["job"] == "addmachine"){

    $name = $_POST["ename"];
    $manufacturer = $_POST["manufacturer"];
    $type = $_POST["type"];
    $room = $_POST["room"];

    $query1 = "INSERT INTO equipment (name, manufacturer, type, hospital_name) VALUES ('". $name ."','". $manufacturer ."','". $type ."','". $hospital_name ."')";
    $result1 = mysqli_query($con, $query1) or die('Error: ' . mysqli_error($con));

    $query2 = "INSERT INTO machine (equipment_name, hospital_name, room_number) VALUES ('". $name ."','". $hospital_name ."','". $room."')";

    $result1 = mysqli_query($con, $query2) or die('Error: ' . mysqli_error($con));

  }

  if ($_GET["job"] == "addsupplies"){

    $name = $_POST["ename"];
    $manufacturer = $_POST["manufacturer"];
    $type = $_POST["type"];
    $amount = $_POST["amount"];


    $query1 = "INSERT INTO equipment (name, manufacturer, type, hospital_name) VALUES ('". $name ."','". $manufacturer ."','". $type ."','". $hospital_name ."')";
    $result1 = mysqli_query($con, $query1) or die('Error: ' . mysqli_error($con));


    $query2 = "INSERT INTO supplies (amount, equipment_name, hospital_name) VALUES ('". $amount ."','". $name ."','". $hospital_name ."')";

    $result1 = mysqli_query($con, $query2) or die('Error: ' . mysqli_error($con));

  }

  if($_GET["job"] == "search"){
    if ($_POST["search"] === ""){
    }
    else {
    $search = $_POST["search"];
    }
  }
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title><?php echo $hospital_name?> Equipment - hospitaldb</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,900|Roboto+Mono:400,700">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons"/>
  <link rel="stylesheet" href="styles/main.css"/>
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-pink.min.css" />
  <script src="https://storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js"></script>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

 <!-- NAV BAR -->
  <header class="mdl-layout__header mdl-shadow--4dp">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">
        <a style = "margin-left:-50px;" href ="management.php" class="mdl-button mdl-js-button mdl-button--icon">
          <i class="material-icons">arrow_back</i>
        </a>
        <a class="mdl-button mdl-js-button" style = "font-weight:400; text-transform:none; padding-left:10px; color:white; font-size:18px; vertical-align:center" href ="management.php">
          Back Home
        </a>
      </span>
      <div class="mdl-layout-spacer"></div>

    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
    <div class = "centerit">

      <h4><?php echo $hospital_name; ?> Machines</h4>
        <!-- create table and populate with staff -->
        <?php
        $result = mysqli_query($con,"SELECT * FROM equipment JOIN machine where equipment.hospital_name = '$hospital_name' AND machine.hospital_name = '$hospital_name' AND equipment.name = machine.equipment_name ");

        if($_GET["job"] == "search"){
          if ($_POST["search"] === ""){
            $result = mysqli_query($con,"SELECT * FROM equipment where equipment.hospital_name = '$hospital_name'");
          }
          else {
            $search = $_POST["search"];

          $result = mysqli_query($con,"SELECT * FROM staff where staff.hospital_name = '$hospital_name' AND (fname = '$search' OR lname = '$search' OR staffid = '$search' OR Access = '$search')");
          }
        }


        echo "<table style =  'width:550px' class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
        <tr>
        <th class='mdl-data-table__cell'>Equipment Name</th>
        <th class='mdl-data-table__cell'>Equipment Type</th>
        <th class='mdl-data-table__cell'>Manufacturer</th>
        <th class='mdl-data-table__cell'>Room Number</th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['equipment_name'] . "</td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "<td>" . $row['manufacturer'] . "</td>";
        echo "<td>" . $row['room_number'] . "</td>";

        echo "</tr>";
        }
        echo "</table>";
        ?>
        <br>
          <br>
            <br>


            <h4><?php echo $hospital_name; ?> Supplies</h4>
          <!-- create table and populate with staff -->
          <?php
          $result = mysqli_query($con,"SELECT * FROM equipment JOIN supplies where equipment.hospital_name = '$hospital_name' AND supplies.hospital_name = '$hospital_name' AND equipment.name = supplies.equipment_name ");

          if($_GET["job"] == "search"){
            if ($_POST["search"] === ""){
              $result = mysqli_query($con,"SELECT * FROM equipment where equipment.hospital_name = '$hospital_name'");
            }
            else {
              $search = $_POST["search"];

            $result = mysqli_query($con,"SELECT * FROM staff where staff.hospital_name = '$hospital_name' AND (fname = '$search' OR lname = '$search' OR staffid = '$search' OR Access = '$search')");
            }
          }


          echo "<table style = 'width:550px' class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
          <tr>
          <th class='mdl-data-table__cell'>Equipment Name</th>
          <th class='mdl-data-table__cell'>Equipment Type</th>
          <th class='mdl-data-table__cell'>Manufacturer</th>
          <th class='mdl-data-table__cell'>Quanity</th>
          </tr>";
          while($row = mysqli_fetch_array($result))
          {
          echo "<tr>";
          echo "<td>" . $row['equipment_name'] . "</td>";
          echo "<td>" . $row['type'] . "</td>";
          echo "<td>" . $row['manufacturer'] . "</td>";
          echo "<td>" . $row['amount'] . "</td>";

          echo "</tr>";
          }
          echo "</table>";
          ?>


      </div>

    </div>

  </main>
  <div class = "cornerButton">
      <a id = "patient" href ="addequipment.php?hospital_name=<?php echo $hospital_name ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp">
        <i class="material-icons">add</i>
      </a>
      <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--left" for="patient">
        Add <?php echo $hospital_name?> Equipment
      </div>
  </div>
</div>


</body>

</html>


<?php

mysqli_close($con);

?>
