<?php
  $con=mysqli_connect("127.0.0.1","root","", "hospitaldb");

  if (mysqli_connect_errno($con))
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  if ($_GET["job"] == "addpatient"){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $birthdate = $_POST["birthdate"];
    $sex = $_POST["options"];
    $ssn = $_POST["ssn"];
    $address = $_POST["address"];

    $Date_admitted = $_POST["Date_admitted"];
    $Date_discharged = $_POST["Date_discharged"];
    $hospital_name = $_POST["hospital_name"];


    $query1 = "INSERT INTO patient (SSN, Date_admitted, Date_discharged, hospital_name) VALUES ('". $ssn ."','". $Date_admitted ."','". $Date_discharged ."','". $hospital_name ."')";
    $result1 = mysqli_query($con, $query1) or die('Error: ' . mysqli_error($con));


    $query2 = "INSERT INTO personal_details (patient_ssn, fname, lname, sex, birthdate, address) VALUES ('". $ssn ."','". $fname ."','". $lname ."','". $sex ."','". $birthdate ."','". $address ."')";
    $result2 = mysqli_query($con, $query2) or die('Error: ' . mysqli_error($con));
  }

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title>Appointments - hospitaldb</title>
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
      <div class="mdl-layout-spacer"></div>

      <form action="secretary.php?job=search" method = "post">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">

            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>

            <div class="mdl-textfield__expandable-holder">
              <input value = "<?php echo $search?>" class="mdl-textfield__input" type="text" name="search" id="search" >
              <label class="mdl-textfield__label">Enter Text:</label>
            </div>

          </div>
      </form>

    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
    <div class = "centerit">

      <h4>Appointments</h4>
        <!-- create table and populate with patients -->
        <?php
        $result = mysqli_query($con,"SELECT staff.lname AS staffname, personal_details.fname, personal_details.lname, appointment.time, appointment.room_number FROM appointment JOIN staff JOIN personal_details JOIN patient where personal_details.patient_ssn = appointment.patient_SSN AND appointment.staff_staffID = staff.staffid AND staff.hospital_name = patient.hospital_name AND patient.ssn = personal_details.patient_ssn");

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
        <th class='mdl-data-table__cell--non-numeric'>Patient First name</th>
        <th class='mdl-data-table__cell--non-numeric'>Patient Last Name</th>
        <th class='mdl-data-table__cell--non-numeric'>Doctor</th>
        <th class='mdl-data-table__cell--non-numeric'>Time</th>
        <th class='mdl-data-table__cell--non-numeric'>Room Number</th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "<td>" . $row['staffname'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['room_number'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>

      </div>

    </div>

  </main>

</body>

</html>


<?php

mysqli_close($con);

?>
