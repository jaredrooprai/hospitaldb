<!DOCTYPE html>
<?php

$staffid= $_GET["staffid"];

// Create connection
$con=mysqli_connect("127.0.0.1","root","", "hospitaldb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM staff where staffid='$staffid'");

 while($row = mysqli_fetch_array($result))
  {

 ?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Android Theme Color -->
  <meta name="theme-color" content="white">
  <title>Edit Staff - hospitaldb</title>
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
          <a style = "margin-left:-50px;" href ="selectedstaff.php?staffid=<?php echo $staffid ?>" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">arrow_back</i>
          </a>
          <a class="mdl-button mdl-js-button" style = "font-weight:400; text-transform:none; padding-left:10px; color:white; font-size:18px; vertical-align:center" href ="selectedstaff.php?staffid=<?php echo $staffid ?>">
          Back
          </a>
        </span>
      </div>
    </header>

  <main class="mdl-layout__content">
    <div class="mdl-grid">
      <div class = "centerit">
      <h4><?php echo $row["fname"];?> <?php echo $row["lname"];?></h4>


      <form action="selectedstaff.php?staffid=<?php echo $staffid?>&job=save" method="post">
        <br>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input value = "<?php echo $row["access"];?>" class="mdl-textfield__input" type="text" id="access" name = "access">
          <label class="mdl-textfield__label" for="sample1">Access</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input value = "<?php echo $row["salary"];?>" class="mdl-textfield__input" type="text" id="salary" name = "salary">
          <label class="mdl-textfield__label" for="sample1">Salary</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input value = "<?php echo $row["hospital_name"];?>" class="mdl-textfield__input" type="text" id="hospital_name" name = "hospital_name">
          <label class="mdl-textfield__label" for="sample1">Works at Hospital</label>
        </div>
        <br>
        <input style = "float:right" class="mdl-button mdl-js-button mdl-button--accent" type="submit" value="Save Changes">
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
