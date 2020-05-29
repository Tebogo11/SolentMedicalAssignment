<!DOCTYPE html>
<html>

<head>
    <title>Appointment Page</title>
    <link rel="stylesheet" type="text/css" href="Maincss.css">
    <?php
    include_once("../Controller/AppointmentLibrary.php");
    include_once("../Controller/UserLibrary.php");
    include("navbar/navbar.php");
    bootstrap();
    Navaccess();
    ?>
</head>

<?php
// Test that the authentication session variable exists
if (!isset($_SESSION["gatekeeper"])) {
    header("Location: index.php");
} else {
?>

    <div id="container">

        <body>

            <!--main code-->
            <div id="main">

                <h2>Your Appointments</h2>
                <?php
                //if access code
                //if Patid == to null 
                if($_SESSION["Access"] == "Patient")
                {
                    $patid = null;
                } else{
                    $patid = $_GET["Pid"];
                }
                $userID = $_SESSION["gatekeeper"];
                //Header
                if ($patid == null) {
                    $accountinfo = findUserByID($userID);
                    echo "<h1>" . $accountinfo->getfirstName() . " " . $accountinfo->getlastName() . " Next Appointment </h1>";
                } else {
                    $accountinfo = findUserByID($patid);
                    echo "<h1>" . $accountinfo->getfirstName() . " " . $accountinfo->getlastName() . " Next Appointment </h1>";
                }
                ?>
                <div class="row">
                    <!--Show All apppointments-->
                    <?php
                                    if($_SESSION["Access"] == "Patient")
                                    {
                                        $patid = null;
                                    } else{
                                        $patid = $_GET["Pid"];
                                    }
                    $userID = $_SESSION["gatekeeper"];

                    if ($patid == null) {
                        ViewAppointments($userID);
                    } else {
                        ViewAppointments($patid);
                    }
                    ?>


                </div>
                <!--Add Appointment-->
                <h2>Add Appointment</h2>

                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                    </div>
                    <div class="col-md-auto">
                        <?php
                                        if($_SESSION["Access"] == "Patient")
                                        {
                                            $patid = null;
                                        } else{
                                            $patid = $_GET["Pid"];
                                        }

                        echo "<form method='POST' action='BookAppointment.php'>";
                        echo  "<input type='hidden' name='PID' value='$patid' />";
                        echo "<h3> Choose Your Appointment Date : </h3>";
                        echo "Day <select id='ADay' name ='ADay'>";
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value =" . $i . ">" . $i . "</option>";
                        }
                        echo "</select>";

                        echo " Month <select id='AMonth'  name ='AMonth'>";
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value =" . $i . ">" . $i . "</option>";
                        }
                        echo "</select>";

                        $dates = getdate();
                        $minyear = 2020;
                        $maxYear = 2023;
                        echo " Year <select id='AYear'  name ='AYear'>";
                        for ($minyear; $minyear <= $maxYear; $minyear++) {
                            echo "<option value =" . $minyear . ">" . $minyear . "</option>";
                        }
                        echo "</select> <br>";
                        ?>

                        <h3> Choose Your Time : </h3>
                        <?php
                        echo "Hours <select id='ATime' name ='ATime'>";
                        for ($i = 8; $i <= 21; $i++) {
                            echo "<option value =" . $i . ">" . $i . " : 00</option>";
                        }


                        echo "</select>";
                        ?>
                        <br>
                        <label for="reason">
                            <h3>Reason</h3>
                        </label><br>
                        <div class="mx-auto" style="height: 50px;">
                            <input name="Reason" class="form-control" id="Reason" />
                        </div>
                        <input type="submit" class="btn btn-success" value="Add Appointment" />
                        </form>
                    </div>
                    <div class="col col-lg-2">

                    </div>
                </div>

                <?php

                //delete 
                error_reporting(0);
                $AppointID = $_GET["Aid"];
                delete($AppointID);
                ?>


            </div>

        </body>
    </div>

<?php
}
?>




</div>

</html>