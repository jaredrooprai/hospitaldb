<?php
  $con=mysqli_connect("127.0.0.1","root","", "hospitaldb");

  if (mysqli_connect_errno($con))
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title>Management - hospitaldb</title>
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
        <a style = "margin-left:-50px;" href ="index.html" class="mdl-button mdl-js-button mdl-button--icon">
          <i class="material-icons">arrow_back</i>
        </a>
        <a class="mdl-button mdl-js-button" style = "font-weight:400; text-transform:none; padding-left:10px; color:white; font-size:18px; vertical-align:center" href ="index.html">
          Back Home
        </a>
      </span>
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
    <div class = "centerit">

      <h4>Hospitals</h4>
        <!-- create table and populate with patients -->
        <?php
        $result = mysqli_query($con,"SELECT * FROM hospital");

        if($_GET["job"] == "search"){
          if ($_POST["search"] === ""){
          }
          else {
            $search = $_POST["search"];

          $result = mysqli_query($con,"SELECT * FROM patient JOIN personal_details where personal_details.patient_ssn = patient.ssn AND (fname = '$search' OR lname = '$search' OR ssn = '$search' OR address = '$search' OR Date_admitted = '$search' OR Date_discharged = '$search')");
          }
        }


        echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
        <tr>
        <th class='mdl-data-table__cell--non-numeric'>Name</th>
        <th class='mdl-data-table__cell--non-numeric'>Address</th>
        <th class='mdl-data-table__cell'></th>
        <th class='mdl-data-table__cell'></th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td><a  href='viewequipment.php?name=".$row['name']."'>Equipment</a></td>";
        echo "<td><a  href='viewstaff.php?name=".$row['name']."'>Staff</a></td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>

      </div>

    </div>

  </main>
</div>


</body>

</html>


<?php

mysqli_close($con);

?>
