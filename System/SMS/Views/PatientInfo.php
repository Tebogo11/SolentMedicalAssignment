<!DOCTYPE html>
<html>

<head>
  <title>Appointment Page</title>
  <link rel="stylesheet" type="text/css" href="Maincss.css">
  <?php
  include("../Controller/UserLibrary.php");
  include("navbar/navbar.php");
  bootstrap();
  Navaccess();
  error_reporting(0);
  ?>
</head>

<?php
// Test that the authentication session variable exists
if (!isset($_SESSION["gatekeeper"])) {
  header("Location: index.php");
} else if ($_SESSION["Access"] == "Staff" || $_SESSION["Access"] == "Doctor") {
?>

  <div id="container">

    <body>

      <!--main code-->
      <div id="main">
        <!--Form to search for patient by name -->
        <h2>Patient Search</h2>
        <form method="get" action="PatientInfo.php">
          <div class="row">
            <div class="col" style="width:100px">
              <input type="text" class="form-control" placeholder="Enter FirstName" id="FirstName" name="FirstName">
            </div>
            <div class="col" style="width:100px">
              <input type="text" class="form-control" placeholder="Enter LastName " id="LasttName" name="LasttName">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
          </div>
        </form>
        <!--Retrive all patients-->
        <?php
        $fname = $_GET["FirstName"];
        $lname = $_GET["LasttName"];

        if ($fname == null && $lname == null) {
          //Retrive all patients
          GetAllpatientInfo();
        } else {
          //Retrive all patients by name
          findPatientByName($fname, $lname);
        }

        ?>

      </div>

    </body>
  </div>

<?php
}
?>




</div>

</html>