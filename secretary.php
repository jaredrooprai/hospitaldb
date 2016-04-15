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
  <title>Patients - hospitaldb</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,900|Roboto+Mono:400,700">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-green.min.css" />
  <link rel="stylesheet" href="styles/main.css" />
  <script src="https://storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js"></script>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><a href ="index.html">Back</a></span>
      <!-- Add spacer, to align navigation to the right -->
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
    <div class = "centerit">

      <h4>Patients</h4>

        <?php
        $con=mysqli_connect("127.0.0.1","root","", "hospitaldb");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM patient, personal_details WHERE SSN = patient_ssn");

        echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp'>
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
        echo "<td><a href='editpatient.php?fname=".$row['fname']."&lname=".$row['lname']."'</a>Edit</td>";
        echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>

        <a a href ="addpatient.html" class="fab mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
          <i class="material-icons">add</i>
        </a>
      </div>

    </div>
  </main>

</body>

</html>
