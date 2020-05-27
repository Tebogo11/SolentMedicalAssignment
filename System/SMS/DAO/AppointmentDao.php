<?php
include("../Models/Appointment.php");
include("../DAO/UserDao.php");

class AppointmentDao
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }


    // Find an Appointment By a gving User ID

    public function findAllAppointmentByUser($id)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE UserID=? AND Checked_IN = ?");
        //Query excuted
        $stmt->execute([$id, 0]);
        $Appointments = [];
        while ($row = $stmt->fetch()) {
            //While loop to collect all results and store them in a Appointment Object
            $Appointment = new Appointment($row["AppointmentID"], $row["UserID"], $row["Date"], $row["Time"], $row["Reason"], $row["Checked_IN"]);
            $Appointments[] = $Appointment;
        }
        return  $Appointments;
    }


    // Find All Appointments by a giving Date

    public function findAppointmentByDate($Date)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE Date=? AND Checked_IN = ?");
        //Query excuted
        $stmt->execute([$Date, 0]);
        $Appointments = [];
        //While loop to collect all results and store them in a Appointment Object
        while ($row = $stmt->fetch()) {
            $Appointment = new Appointment($row["AppointmentID"], $row["UserID"], $row["Date"], $row["Time"], $row["Reason"], $row["Checked_IN"]);
            $Appointments[] = $Appointment;
        }
        return  $Appointments;
    }


    // Add an appointment To the Appointemnt Database 
    public function addAppointment(Appointment $AppointmentObj)
    {
        //SQL statement
        $stmt = $this->conn->prepare("INSERT INTO " .  $this->table .  "(AppointmentID, UserID, Date, Time, Reason, Checked_IN) VALUES (?,?,?,?,?,?)");
        //Query excuted
        $stmt->execute([$AppointmentObj->getAppointmentID(), $AppointmentObj->getUserID(), $AppointmentObj->getDate(), $AppointmentObj->getTime(), $AppointmentObj->getReason(), $AppointmentObj->getcheckIn()]);
        $AppointmentObj->setAppointmentID($this->conn->lastInsertId());
    }

    public function updateAppointment($AppointID)
    {
        //SQL statement
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET Checked_IN=? WHERE AppointmentID=?");
        //Query excuted
        $stmt->execute([1, $AppointID]);
    }

    //delete Appointment with a giving Appointment ID
    public function deleteAppointment($AppointID)
    {
        //SQL statement
        $stmt = $this->conn->prepare("DELETE FROM " .  $this->table . " WHERE AppointmentID = ?");
        //Query excuted
        $stmt->execute([$AppointID]);
    }
}
