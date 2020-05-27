<?php
//Appointment class
class Treatment
{

    private $ID, $TreatmentName, $Description;
      
    //cpnstructor
    public function __construct($Tid, $Tname, $Desc)
    {
        $this->ID = $Tid;
        $this->TreatmentName = $Tname;
        $this->Description = $Desc;
    }
    //Getter methods
    public function getTreatmentID()
    {
        return $this->ID;
    }

    public function getTreatmentName()
    {
        return $this->TreatmentName;
    }

    public function getDescription()
    {
        return $this->Description;
    }

}
?>
