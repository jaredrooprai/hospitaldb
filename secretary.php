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
    $hospital_address = $_POST["hospital_address"];


    $query1 = "INSERT INTO patient (SSN, Date_admitted, Date_discharged, hospital_address) VALUES ('". $ssn ."','". $Date_admitted ."','". $Date_discharged ."','". $hospital_address ."')";
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
  <title>Patients - hospitaldb</title>
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
      <form action="#">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="sample6">
              <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
            </div>
          </div>
      </form>
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
    <div class = "centerit">

      <h4>Patients</h4>
        <!-- create table and populate with patients -->
        <?php
        $result = mysqli_query($con,"SELECT * FROM patient JOIN personal_details");

        echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
        <tr>
        <th class='mdl-data-table__cell'>First name</th>
        <th class='mdl-data-table__cell--non-numeric'>Last Name</th>
        <th class='mdl-data-table__cell--non-numeric'>Date Admitted</th>
        <th class='mdl-data-table__cell--non-numeric'>Date Discharged</th>
        <th class='mdl-data-table__cell--non-numeric'>Address</th>
        <th class='mdl-data-table__cell--non-numeric'></th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "<td>" . $row['Date_admitted'] . "</td>";
        echo "<td>" . $row['Date_discharged'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td><a style='color:grey' href='selectedpatient.php?ssn=".$row['ssn']."'</a><i class='material-icons'>arrow_forward</i></td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>

      </div>

    </div>

  </main>
  <div class = "cornerButton">
      <a id = "patient" href ="addpatient.html" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp">
        <i class="material-icons">add</i>
      </a>
      <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--left" for="patient">
        Add Patient
      </div>
  </div>
</div>


</body>

</html>


<?php

mysqli_close($con);

?>
