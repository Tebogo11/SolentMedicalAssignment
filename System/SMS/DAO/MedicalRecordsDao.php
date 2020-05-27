<?php
include("../Models/MedicalRecord.php");

class MedicalRecordDao {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }


    // Find Medical Record by giving User ID

    public function findMedicalRecordByUserID($id) {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE UserID=?");
         //Query excuted
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new MedicalRecords($row["RecordID"], $row["RecordType"],$row["RecordReport"], $row["Date"], $row["Treatment"], $row["UserID"], $row["DoctorID"]);
    }


    // Find All Medical Records of a giving User ID

    public function findAllMedicalRecordByUserID($UserID) {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE userID=?");
         //Query excuted
        $stmt->execute([$UserID]);
        $Records = [];
        //While loop to collect all results and store them in a Medical Record Object
        while($row = $stmt->fetch()) {
            $Record = new MedicalRecords($row["RecordID"], $row["RecordType"],$row["RecordReport"] ,$row["Date"], $row["Treatment"], $row["UserID"], $row["DoctorID"]);
            $Records[] = $Record;
        }
        return  $Records;
    }


    //Add Medical Record to Medical Record table giving MecordRecord Object
    public function addMedicalRecord(MedicalRecords $MRObj) {
        //SQL statement
        $stmt = $this->conn->prepare("INSERT INTO ".  $this->table . "(RecordID, RecordType, RecordReport, Date, Treatment, UserID, DoctorID) VALUES (?,?,?,?,?,?,?)");
         //Query excuted
        $stmt->execute([$MRObj->getRecordID(),$MRObj->getRecordType(), $MRObj->getRecordReport(),$MRObj->getDate(),$MRObj->getTreatment(),$MRObj->getUserID(),$MRObj->getDoctorID()]);
        $MRObj->setRecordID($this->conn->lastInsertId());
    }

    
    //Delete Medical Record with a giving MecordRecord Object
    public function deleteMedicalRecord(MedicalRecords $MRObj) {
        //SQL statement
        $stmt = $this->conn->prepare("DELETE FROM " .  $this->table . " WHERE userID=? ");
        //Query excuted
        $stmt->execute([$MRObj->getuserID()]);
    }
}
