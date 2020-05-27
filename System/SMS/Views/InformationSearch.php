<!DOCTYPE html>
<html>

<head>
    <title>Appointment Page</title>
    <link rel="stylesheet" type="text/css" href="Maincss.css">
    <?php
    include("../Controller/InformationLibrary.php");
    include("navbar/navbar.php");
    bootstrap();
    Navaccess();
    ?>
</head>
    <div id="container">

        <body>

            <!--main code-->
            <div id="main">
                <!--Show All search results-->
                <h2>Search results</h2>
                <?php
               $Name = $_GET["DiseaseN"];
               getDiseaseByName($Name);
                ?>

            </div>

        </body>
    </div>



</div>

</html>