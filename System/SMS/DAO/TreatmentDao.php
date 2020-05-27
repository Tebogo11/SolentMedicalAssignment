<?php
include("../Models/Treatment.php");

class TreatmentDao
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findTreatmentByName($TreatName) {
        //SQL statement
        $stmt = $this->conn->query("SELECT * FROM ".  $this->table .  " WHERE TreatmentName LIKE '%$TreatName' ");
         //Query excuted
        $row = $stmt->fetch();
        return new Treatment($row["ID"], $row["TreatmentName"],$row["Description"]);
    }

}

?>