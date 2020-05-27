<?php
//Medical Records Class
class MedicalRecords
{

    private $RecordID, $RecordType, $RecordReport, $Date,
        $Treatment, $userID, $DoctorID;
    //constructor  
    public function __construct($id, $RType, $RReport, $D, $Trtment, $uID, $dID)
    {
        $this->RecordID = $id;
        $this->RecordType = $RType;
        $this->RecordReport = $RReport;
        $this->Date = $D;
        $this->Treatment = $Trtment;
        $this->userID = $uID;
        $this->DoctorID = $dID;
    }
    //Getter methods 
    public function getRecordID()
    {
        return $this->RecordID;
    }

    public function getRecordType()
    {
        return $this->RecordType;
    }

    public function getRecordReport()
    {
        return $this->RecordReport;
    }

    public function getDate()
    {
        return $this->Date;
    }

    public function getTreatment()
    {
        return $this->Treatment;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getDoctorID()
    {
        return $this->DoctorID;
    }


    public function setRecordID($id)
    {
        $this->RecordID = $id;
    }
    //set id
}
