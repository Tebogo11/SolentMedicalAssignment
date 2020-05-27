<?php
include_once("../DAO/MedicalRecordsDao.php");

//Get all Medical Records of a giving ID
function GetAllMedicalrecords($UserID)
{
      //Connnect to data base
      $conn = connect();
     //Create Medical Records data access object
    $dao = new MedicalRecordDao($conn, "MedicalRecords");
    $records = $dao->findAllMedicalRecordByUserID($UserID);
    foreach($records as $record)
    {
        echo "<div class='row'>";
        echo "<div class ='col'>";
        echo "<p> Name : " . $record->getRecordType() . "<br>";
        echo "Description : <br>";
        echo " -" . $record->getRecordReport() . "<br>";
        echo "Treatment : <br>";
        echo " -". $record->getTreatment() ."<br>";
        echo "Submitted : " . $record->getDate() . "</p>";
        //sumbitted by
        echo "</div>";
        echo "</div>";
    }
}
?>
<?php
//Add Medical Record to the Medical Record table 
function AddMedicalRecord($recordType, $report, $treatment, $userID, $DoctorID)
{
    try{
          //Connnect to data base
    $conn = connect();
    $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //Create Medical Records data access object
    $dao = new MedicalRecordDao($conn, "MedicalRecords");
    //Get current date 
    $currentDate = date("Y-m-d");
    //Store parameters in a Medical Record Object
    $newRecord = new MedicalRecords(0,$recordType, $report,$currentDate, $treatment, $userID, $DoctorID);
    $dao->AddMedicalRecord($newRecord);
    }
    catch(PDOException $e)
{

    echo "Error: $e";
}
    //referse page
}
