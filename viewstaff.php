<?php
  $con=mysqli_connect("127.0.0.1","root","", "hospitaldb");
  $hospital_name = $_GET["name"];

  if (mysqli_connect_errno($con))
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  if ($_GET["job"] == "addstaff"){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $access = $_POST["access"];
    $salary = $_POST["salary"];

    $query1 = "INSERT INTO staff (staffid, fname, lname, access, salary, hospital_name) VALUES (NULL,'". $fname ."','". $lname ."','". $access ."','". $salary ."', '". $hospital_name."')";
    $result1 = mysqli_query($con, $query1) or die('Error: ' . mysqli_error($con));

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
  <title><?php echo $hospital_name?> Staff - hospitaldb</title>
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

      <form action="viewstaff.php?name=<?php echo $hospital_name?>&job=search" method = "post">
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

      <h4><?php echo $hospital_name; ?> Staff</h4>
        <!-- create table and populate with staff -->
        <?php
        $result = mysqli_query($con,"SELECT * FROM staff where staff.hospital_name = '$hospital_name'");
        if($_GET["job"] == "search"){
          if ($_POST["search"] === ""){
            $result = mysqli_query($con,"SELECT * FROM staff where staff.hospital_name = '$hospital_name'");
          }
          else {
            $search = $_POST["search"];

          $result = mysqli_query($con,"SELECT * FROM staff where staff.hospital_name = '$hospital_name' AND (fname = '$search' OR lname = '$search' OR staffid = '$search' OR Access = '$search')");
          }
        }


        echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
        <tr>
        <th class='mdl-data-table__cell--non-numeric'>First name</th>
        <th class='mdl-data-table__cell--non-numeric'>Last Name</th>
        <th class='mdl-data-table__cell--non-numeric'>Staff ID</th>
        <th class='mdl-data-table__cell--non-numeric'>Access</th>
        <th class='mdl-data-table__cell--non-numeric'></th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "<td>" . $row['staffid'] . "</td>";
        echo "<td>" . $row['access'] . "</td>";
        echo "<td><a style='color:grey' href='selectedstaff.php?staffid=".$row['staffid']."'</a><i class='material-icons'>arrow_forward</i></td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>

      </div>

    </div>

  </main>
  <div class = "cornerButton">
      <a id = "patient" href ="addstaff.php?hospital_name=<?php echo $hospital_name ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp">
        <i class="material-icons">add</i>
      </a>
      <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--left" for="patient">
        Add <?php echo $hospital_name?> Staff
      </div>
  </div>
</div>


</body>

</html>


<?php

mysqli_close($con);

?>
