<!DOCTYPE html>
<?php

$ssn = $_GET["ssn"];

// Create connection
$con=mysqli_connect("127.0.0.1","root","", "hospitaldb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM patient, personal_details where patient_ssn='$ssn' AND ssn = '$ssn'");

 while($row = mysqli_fetch_array($result))
  {

 ?>


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
  <title>Add Patient - hospitaldb</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,900|Roboto+Mono:400,700">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="styles/main.css"/>
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-pink.min.css" />
  <script src="https://storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js"></script>
</head>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-shadow--4dp">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">
          <a style = "margin-left:-50px;" href ="selectedpatient.php?ssn=<?php echo $ssn ?>" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">arrow_back</i>
          </a>
          <a class="mdl-button mdl-js-button" style = "font-weight:400; text-transform:none; padding-left:10px; color:white; font-size:18px; vertical-align:center" href ="selectedpatient.php?ssn=<?php echo $ssn ?>">
          Back
          </a>
        </span>
      </div>
    </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
      <div class = "centerit">
      <h4>New Appointment</h4>

      <form action="selectedpatient.php?ssn=<?php echo $ssn?>&job=addappointment" method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="room_number" name = "room_number" pattern="-?[0-9]*(\.[0-9]+)?">
          <label class="mdl-textfield__label" for="sample1">Room Number</label>
          <span class="mdl-textfield__error">Input is not a number!</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="staffid" name = "staffid" pattern="-?[0-9]*(\.[0-9]+)?">
          <label class="mdl-textfield__label" for="sample1">Staff ID</label>
          <span class="mdl-textfield__error">Input is not a number!</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="time" name = "time">
          <label class="mdl-textfield__label" for="sample1">Time</label>
        </div>
        <br>

        <input style = "float:right" class="mdl-button mdl-js-button mdl-button--accent" type="submit" value="Save">
      </form>



    </div>
    </div>
  </main>



</body>

</html>


<?php

}

mysqli_close($con);
?>
