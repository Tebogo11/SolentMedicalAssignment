<!DOCTYPE html>
<html>

<head>
  <title>Appointment Page</title>
  <link rel="stylesheet" type="text/css" href="Maincss.css">
  <?php
  include("../Controller/MedicalRecordsLibrary.php");
  include("navbar/navbar.php");
  include_once("../Controller/UserLibrary.php");
  bootstrap();
  Navaccess();
  ?>
</head>

<?php
// Test that the authentication session variable exists
if (!isset($_SESSION["gatekeeper"])) {
  header("Location: index.php");
} else if ($_SESSION["Access"] == "Staff") {
?>

  <div id="container">

    <body>

      <!--main code-->
      <div id="main">
        <!--Comfirmation page for submitted Medical Record-->


        <?php
        $patid = $_GET["patientID"];
        $accountinfo = findUserByID($patid);
        echo "<h1>Record Add To " . $accountinfo->getfirstName() . " " . $accountinfo->getlastName() . " Account</h1>";
        ?>

        <?php

        $RType = $_GET["RecordType"];
        $Rreport = $_GET["Report"];
        $Treat = $_GET["Treatment"];
        $usrID = $_GET["patientID"];
        $DocID = $_SESSION["gatekeeper"];
        AddMedicalRecord($RType, $Rreport, $Treat, $usrID, $DocID);

        echo "<div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>You have successfully Add a Patient Record!</h4>
  <p><a href='MedicalRecords.php?Pid=$usrID'>Click here to view results </a></p>
</div>";
        ?>

      </div>

    </body>
  </div>

<?php
}
?>

<!--footer-->
<div id="footer">
  <h2>Contact US</h2>
  <p> Email : SMS@outlook.co.uk</p>
  <p> Phone Number : 44-765-5512-377 </p>
  <div class="row justify-content-md-center">
    <div class="col-md-auto">
      <p> Address :</p>
    </div>
    <div class="col-md">
      <p>1 London Road, Southampton, SO15 2AE</p>
    </div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
</div>



</div>

</html>
