<?php
include("../Models/Disease.php");

class DiseaseDao
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findDiseaseByName($Dname) {
        //SQL statement
        $stmt = $this->conn->query("SELECT * FROM ".  $this->table .  " WHERE DiseaseName LIKE  '%$Dname%' ");
         //Query excuted
        $DieaseResult = [];
        while ($row = $stmt->fetch()){
        $Diease = new Disease($row["DiseaseID"], $row["DiseaseName"],$row["Causes"], $row["Symptoms"], $row["Description"], $row["Treatment1"], $row["Treatment2"], $row["Treatment3"], $row["BodyArea"]);
        $DieaseResult[] = $Diease;
        }
        return $DieaseResult;
    }

    public function findDiseaseByID($ID) {
        //SQL statement
        $stmt = $this->conn->query("SELECT * FROM ".  $this->table .  " WHERE DiseaseID = '$ID' ");
         //Query excuted
        $row = $stmt->fetch();
        return new Disease($row["DiseaseID"], $row["DiseaseName"],$row["Causes"], $row["Symptoms"], $row["Description"], $row["Treatment1"], $row["Treatment2"], $row["Treatment3"], $row["BodyArea"]);
    }

}

?>