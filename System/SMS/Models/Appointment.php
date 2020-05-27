<?php
//Appointment class
class Appointment
{

    private $AppointmentID, $userID, $Date,
        $Time, $Reason, $checkedIn;
    //cpnstructor
    public function __construct($AppointID, $userID, $D, $T, $reason, $chckIn)
    {
        $this->AppointmentID = $AppointID;
        $this->userID = $userID;
        $this->Date = $D;
        $this->Time = $T;
        $this->Reason = $reason;
        $this->checkedIn = $chckIn;
    }
    //Getter methods
    public function getAppointmentID()
    {
        return $this->AppointmentID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getDate()
    {
        return $this->Date;
    }

    public function getTime()
    {
        return $this->Time;
    }

    public function getReason()
    {
        return $this->Reason;
    }

    public function getcheckIn()
    {
        return $this->checkedIn;
    }

    public function setAppointmentID($id)
    {
        $this->AppointmentID = $id;
    }
    //set appointment id
}
