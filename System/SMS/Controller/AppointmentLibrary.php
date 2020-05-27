<?php
include("../DAO/AppointmentDao.php");
//Get All appointment of a giving ID
function ViewAppointments($UserID){
      //Connnect to data base
      $conn = connect();
    //Create Appointment data access object
    $dao = new AppointmentDao($conn, "Appointment");
    //Store apointments list 
    $appointments = $dao->findAllAppointmentByUser($UserID);
    //Retrive all stored appointment list information and display it with get methods 
    foreach($appointments as $appointment)
    {
        echo "<div class='row'>";
        echo "<div class='col'>";
        echo "<p>";
        echo "Date : " . $appointment->getDate(). "<br/> ";
        echo "Time : " . $appointment->getTime(). " <br/>";
        echo "Reason : " . $appointment->getReason() ."<br/>";
        echo "<a class='btn btn-danger'  href='AppointmentPage.php?Aid=". $appointment->getAppointmentID(). "&Pid=".$appointment->getUserID()."'>Delete</a> ";
        echo "</p>";
        echo "</div>";
        echo "</div>";
    }
}


//Add Appointment 
function AddAppointment($UserID, $Date, $Time, $Reason, $chckIn)
{
  include_once("Function.php");
      //Connnect to data base
      $conn = connect();
    //Create Appointment data access object
    $dao = new AppointmentDao($conn, "Appointment");
    $newAppointment = new Appointment(0,$UserID, $Date, $Time, $Reason, $chckIn);
    $dao->AddAppointment($newAppointment);
    

}

//Get All Appointments of the current Date 
function GetAllAppointmentByDate()
{
  include("Function.php");
      //Connnect to data base
      $conn = connect();
    //Create Appointment data access object
    $dao = new AppointmentDao($conn, "Appointment");
    $currentDate = date("Y-m-d");
    $todaysAppointments = $dao->findAppointmentByDate($currentDate);
    foreach($todaysAppointments as $appointment)
    {
        $daoU = new UserDao($conn, "User");
        $patientInfo = $daoU->findUserByUserID($appointment->getUserID());
        echo "<div class='row'>";
        echo "<div class ='col'>";
        echo "<p>";
        echo "Name :" . $patientInfo->getfirstName() ." ". $patientInfo->getlastName() ."<br>";
        echo "PhoneNumber +44" . $patientInfo->getPhoneNumber() ."<br>";
        echo "Email :" . $patientInfo->getemail() ." <br>";
        echo "Date " . $appointment->getDate() . "<br>";
        echo "Time " . $appointment->getTime() . "</br>";
        echo "Reason" . $appointment->getReason() . "</br>";
        echo "<a class='btn btn-danger' href='delete.php?Aid=". $appointment->getAppointmentID(). "&Location=AllappointmentPage&usrid=".$appointment->getUserID()."'>Delete</a> ";
        echo "<a class='btn btn-primary' href='AllappointmentPage.php?ChAid=". $appointment->getAppointmentID(). " '>Check In</a> ";
        echo "</p>";
        echo "</div>";
        echo "</div>";
    }
}

function checkIN($AppointID)
{
      //Connnect to data base
      $conn = connect();
    $dao = new AppointmentDao($conn, "Appointment");
    $dao->updateAppointment($AppointID);
}

//Delete Appointment with a giving ID 
function delete($AppointID)
{
      //Connnect to data base
      $conn = connect();
    $dao = new AppointmentDao($conn, "Appointment");
    $dao->deleteAppointment($AppointID);
}
