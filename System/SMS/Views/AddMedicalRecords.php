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
// Test that the authentication, checks if session variable exists
if (!isset($_SESSION["gatekeeper"])) {
  header("Location: index.php");
} else if ($_SESSION["Access"] == "Staff") {
?>

  <div id="container">

    <body>

      <!--main code-->
      <div id="main">
        <!--Header-->
        <?php
        $patid = $_GET["Pid"];
        $accountinfo = findUserByID($patid);
        echo "<h1> Add Record To " . $accountinfo->getfirstName() . " " . $accountinfo->getlastName() . " Account</h1>";

        ?>
        <!--Form to Add Medical Record-->
        <form method='get' action='SubmitRecord.php'>
          <div class="form-group">
            <label for="RecordType">Record Type</label>
            <!--Drop Down to pick Record Type-->
            <select class="form-control" name="RecordType" id="RecordType">
              <option>Test Results</option>
              <option>Recommadation</option>
              <option>Prescription</option>
              <option>Documents</option>
              <option>Medications</option>
              <option>Allergies</option>
              <option>Other</option>
            </select>
          </div>
          <!--Texts area to fill in Record Report-->
          <div class="form-group">
            <label for="Report">Record Report</label>
            <textarea class="form-control" name="Report" id="Report" rows="3"></textarea>
          </div>
          <!--Texts area to fill in Treatment information-->
          <div class="form-group">
            <label for="Treatment">Treatment</label>
            <textarea class="form-control" name="Treatment" id="Treatment" rows="3"></textarea>
          </div>
          <!--Hidden field to carry patient ID-->
          <?php
          $patid = $_GET["Pid"];
          echo " <input type='hidden' name='patientID' value='$patid' />";
          ?>
          <!--Button to submit -->
          <input type="submit" class="btn btn-success" value="Add Record" />
        </form>


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