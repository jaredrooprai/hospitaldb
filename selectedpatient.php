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

if ($_GET["job"] == "save"){
  $address = $_POST["address"];
  $Date_admitted = $_POST["Date_admitted"];
  $Date_discharged = $_POST["Date_discharged"];
  $hospital_name = $_POST["hospital_name"];

  $update1= mysqli_query($con,"UPDATE personal_details JOIN patient SET address='$address',Date_admitted='$Date_admitted',Date_discharged='$Date_discharged',hospital_name='$hospital_name' where patient_ssn='$ssn'");

  }

  if ($_GET["job"] == "addappointment"){
    $room_number = $_POST["room_number"];
    $staffid = $_POST["staffid"];
    $time = $_POST["time"];

    $query1 = "INSERT INTO appointment (room_number, staff_staffID, patient_SSN, time) VALUES ('". $room_number ."','". $staffid ."','". $ssn ."','". $time ."')";
    $result1 = mysqli_query($con, $query1) or die('Error: ' . mysqli_error($con));

  }

$result = mysqli_query($con,"SELECT * FROM patient, personal_details where patient_ssn='$ssn' AND ssn = '$ssn'");


 while($row = mysqli_fetch_array($result))
  {

 ?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title><?php echo $row['fname'];?> <?php echo $row['lname']?> - hospitaldb</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,900|Roboto+Mono:400,700">
  <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="styles/main.css"/>
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-pink.min.css" />
  <script src="https://storage.googleapis.com/code.getmdl.io/1.1.3/material.min.js"></script>
</head>

<!-- php to get info with ssn -->

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-shadow--4dp">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">
          <a style = "margin-left:-50px;" href ="secretary.php" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">arrow_back</i>
          </a>
          <a class="mdl-button mdl-js-button" style = "font-weight:400; text-transform:none; padding-left:10px; color:white; font-size:18px; vertical-align:center" href ="secretary.php">
          Back
          </a>
        </span>
        <div class="mdl-layout-spacer"></div>
        <a href ="editpatient.php?ssn=<?php echo $ssn ?>" class="mdl-button mdl-js-button mdl-button--icon mdl-textfield--align-right" for="fixed-header-drawer-exp">
          <i class="material-icons">create</i>
        </a>
      </div>
    </header>
  <main class="mdl-layout__content">
    <div class="mdl-grid">
      <div class = "centerit" style = "width:700px;">
      <h4><?php echo $row['fname'];?> <?php echo $row['lname']?></h4>

        <br>
        <h6><b>Birthdate:</b> <?php echo $row["birthdate"];?></h6>

        <br>
        <h6><b>Sex:</b>  <?php echo $row["sex"];?></h6>

        <br>
        <h6><b>SSN:</b>  <?php echo $row["ssn"];?></h6>

        <br>
        <h6><b>Patient Address:</b> <?php echo $row["address"];?></h6>

        <br>
        <br>

        <h6><b>Date Admitted:</b> <?php echo $row["Date_admitted"];?></h6>

        <br>
        <h6><b>Date discharged:</b> <?php echo $row["Date_discharged"];?></h6>

        <br>
        <h6><b>Hospital Name:</b> <?php echo $row["hospital_name"];?></h6>

    </div>
    </div>
  </main>

  <div class = "cornerButton">
    <a id = "schedule" href ="addappointment.php?ssn=<?php echo $ssn ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp">
      <i class="material-icons">perm_contact_calendar</i>
    </a>
    <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--left" for="schedule">
      New Appointment
    </div>
  </div>
</body>


</html>

<?php

}

mysqli_close($con);

?>
