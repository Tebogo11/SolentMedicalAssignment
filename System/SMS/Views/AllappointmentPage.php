<!DOCTYPE html>
<html>

<head>
    <title>Appointment Page</title>
    <link rel="stylesheet" type="text/css" href="Maincss.css">
    <?php
    include("../Controller/AppointmentLibrary.php");
    include("navbar/navbar.php");
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
                <!--Show apppointments-->
                <h2>Todays Appointments</h2>
                <?php
                //Gets All appontments of todays date 
                GetAllAppointmentByDate();

                ?>

            </div>

        </body>
    </div>

<?php
}
?>

</div>

</html>