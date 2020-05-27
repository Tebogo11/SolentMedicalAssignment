<!DOCTYPE html>
<html>

<head>
    <title>MedicalRecords</title>
    <link rel="stylesheet" type="text/css" href="Maincss.css">
    <?php
    include_once("../Controller/MedicalRecordsLibrary.php");
    include_once("../Controller/UserLibrary.php");
    include("navbar/navbar.php");
    bootstrap();
    Navaccess();
    ?>
</head>

<?php
// Test that the authentication session variable exists
if (!isset($_SESSION["gatekeeper"])) {
    header("Location:index.php");
} else {
?>
    <div id="container">

        <body>
            <div id="banner">
                <!--Header-->
                <?php
                 if($_SESSION["Access"] == "Patient")
                 {
                     $patid = null;
                 } else{
                     $patid = $_GET["Pid"];
                 }
                $userID = $_SESSION["gatekeeper"];

                if ($patid == null) {
                    $accountinfo = findUserByID($userID);
                } else {
                    $accountinfo = findUserByID($patid);
                }
                echo "<h1>" . $accountinfo->getfirstName() . " " . $accountinfo->getlastName() . " Medical Records</h1>";
                ?>
            </div>

            <!--main code-->
            <div id="main">
                <!--Get all Medical Records-->
                <?php
                $patid = $_GET["Pid"];
                $userID = $_SESSION["gatekeeper"];

                if ($patid == null) {
                    GetAllMedicalrecords($userID);
                } else {
                    GetAllMedicalrecords($patid);
                }
                ?>
            </div>
        <?php
    }
        ?>
        <!--footer-->
        <div id="footer">

        </div>


        </body>
    </div>

</html>