<?php
include("../DAO/DiseaseDao.php");
include("../DAO/TreatmentDao.php");
include("Function.php");
function getDiseaseByName($Name)
{
        try{
        $conn = connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $dao = new DiseaseDao($conn, "Disease");
        $diseaseR = $dao->findDiseaseByName($Name);
        foreach($diseaseR as $result)
        {
        echo "<p>";
        echo "<h4>".$result->getDiseaseName()." </h4><br> " .$result->getDescription(). " <br/>";
        echo "<a href='DiseaseInfo.php?dID=".$result->getDiseaseID()."'> Find Out More....</a>";
        echo "</p>";
        }
        }
        catch(PDOException $e)
        {
        
            echo "Error: $e";
        }
            //referse page
        }

    function getDiseaseInfo($ID)
    {
         try{
            error_reporting(0);
            $conn = connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $dao = new DiseaseDao($conn, "Disease");
            $dao2 = new TreatmentDao($conn, "Treatment");
            $diseaseR = $dao->findDiseaseByID($ID);
            echo "<p>";
            echo "<h4>".$diseaseR->getDiseaseName()." </h4><br> " .$diseaseR->getDescription(). " <br/><br>";
            echo "Symptoms <br> <br> " . $diseaseR->getSympton();
            echo "Causes " . $diseaseR->getCauses(). "<br><br>";
            echo "<h2> Treatment </h2> <br>";

            echo "<h5> ". $diseaseR->getTreatment1() . " </h5><br>";
            $Treat1info = $dao2->findTreatmentByName($diseaseR->getTreatment1());
            echo $Treat1info->getDescription() . "<br><br>";

            echo "<h5> ". $diseaseR->getTreatment2() . " </h5><br>";
            $Treat2info = $dao2->findTreatmentByName($diseaseR->getTreatment2());
            echo $Treat2info->getDescription() . "<br><br>";

            echo "<h5> " . $diseaseR->getTreatment3() . " </h5><br>";
            $Treat3info = $dao2->findTreatmentByName($diseaseR->getTreatment3());
            echo $Treat3info->getDescription() ;
            echo "</p>";
            }
             
            catch(PDOException $e)
            {
             echo "Error: $e";
            }
             //referse page
    }

?>