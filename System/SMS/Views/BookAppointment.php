<!DOCTYPE html>
<html>

<head>
  <title>My Home Page</title>
  <link rel="stylesheet" type="text/css" href="Maincss.css">
  <?php
  include("navbar/navbar.php");
  bootstrap();
  Navaccess();
  ?>
</head>

<div id="container">

  <body>
   
  <?php
include_once("../Controller/AppointmentLibrary.php");
                $userID = $_SESSION["gatekeeper"];

                $patid = $_GET["Pid"];
                $dd = $_POST["ADay"];
                $md = $_POST["AMonth"];
                $yd = $_POST["AYear"];

                $date = date($yd . "-" . $md . "-" . $dd);

                $time = $_POST["ATime"];
                $reason = $_POST["Reason"];

                if ($patid == null && $date != null && $time != null ) {
                    AddAppointment($userID, $date, $time, $reason, 0);
                   
                } else {
                    AddAppointment($patid, $date, $time, $reason, 0);
                    
                }
                echo "<p><div class='alert alert-success' role='alert'>
                <h4 class='alert-heading'>You have successfully Added a new Appointment</h4>
                <p><a href='AppointmentPage.php'>Click here to view results </a></p>
              </div> </p>";
                
                ?>

  </body>
</div>
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

</html>