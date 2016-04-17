<!DOCTYPE html>
<html>
<!--
  Copyright 2015 Google Inc.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title>Edit Patient - hospitaldb</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,900|Roboto+Mono:400,700">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="styles/main.css"/>
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.deep_purple-red.min.css" />
  <script src="https://storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js"></script>
</head>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><a href ="addpatient.html"><i style="color:white;" class="material-icons">arrow_back</i></a></span>
      <!-- Add spacer, to align navigation to the right -->
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
      <div class = "centerit">

        <a href ="secretary.php" class="custombutton mdl-button mdl-js-button mdl-js-ripple-effect">
          Next
        </a>

    </div>
    </div>
  </main>

</body>

</html>


<?php

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$birthdate = $_POST["birthdate"];
$sex = $_POST["sex"];
$ssn = $_POST["ssn"];
$patient_address = $_POST["patient_address"];

$Date_admitted = $_POST["Date_admitted"];
$Date_discharged = $_POST["Date_discharged"];
$hospital_address = $_POST["hospital_address"];


// Create connection
$con=mysqli_connect("127.0.0.1","root","", "hospitaldb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query1 = "INSERT INTO patient (SSN, Date_admitted, Date_discharged, hospital_address) VALUES ('". $ssn ."','". $Date_admitted ."','". $Date_discharged ."','". $hospital_address ."')";
  $result1 = mysqli_query($con, $query1) or die('Error: ' . mysqli_error($con));


  $query2 = "INSERT INTO personal_details (patient_ssn, fname, lname, sex, birthdate, address) VALUES ('". $ssn ."','". $fname ."','". $lname ."','". $sex ."','". $birthdate ."','". $patient_address ."')";
  $result2 = mysqli_query($con, $query2) or die('Error: ' . mysqli_error($con));


  if($result1 && $result2)
     echo 'New record created successfully';
  else
     echo 'something did not work';

mysqli_close($con);
?>
