<?php
include_once("../DAO/UserDao.php");
include("Function.php");


//Method used to verify log in details and store gaterkeeper session key and Access session key
function verifyLogIn($userN, $pass)
{
    //Connnect to data base

    try{
    $conn = connect();
    //Create User data access object
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dao = new UserDao($conn, "User");
    //method to check user exists 
    
    $account = $dao->findUserByUserNandPass($userN, $pass);
    if ($account == true) {
        //store session keys if user exists
        $_SESSION["gatekeeper"] = $dao->findUserIDByUserNandPass($userN, $pass);
        $_SESSION["Access"] = $dao->findUserAccessByUserNandPass($userN, $pass);
        //redirect to home Page
        header("location: index.php");
    } else {
        //Echo error if log in details can not be found 
        echo "<div>";
        echo "Incorrect password/Username <br/>";
        echo "try again";
        echo "</div>";
    }

} catch (PDOException $e) {

    echo "Error: $e";
}
}

//find user details by ID
function findUserByID($userID)
{
    //Connnect to data base
    $conn = connect();
    //Create User data access object
    $dao = new UserDao($conn, "User");
    //store user details
    $user = $dao->findUserByUserID($userID);
    return $user;
}

//Add user
function addUser(
    $username,
    $password,
    $firstName,
    $lastName,
    $address,
    $phoneNumber,
    $email,
    $dob,
    $accessLevel
) {
    try {
        //Connnect to data base
        $conn = connect();
        //check any errors 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Create User data access object
        $dao = new UserDao($conn, "User");
        //create User Object
        $newAcc = new User(0, $username, $password, $firstName, $lastName, $address, $phoneNumber, $email, $dob, $accessLevel);
        //Store user to data base with addUser method
        $dao->addUser($newAcc);
    } catch (PDOException $e) {

        echo "Error: $e";
    }
}
//Get All patients in the User Table
function GetAllpatientInfo()
{
    //Connnect to data base
    $conn = connect();
    //Create User data access object
    $dao = new UserDao($conn, "User");
    //Get list of all the patients and store them 
    $patients = $dao->findAllUsersByAccessLevel("Patient");
    //display all patient info one by one
    foreach ($patients as $patient) {
        echo "<div class='row'>";
        echo "<div class ='col'>";
        echo "<p>";
        echo "Name :" . $patient->getfirstname() . " " . $patient->getlastName() . " <br>";
        echo "Date of Birth :" . $patient->getDOB() . " PhoneNumber +44 " . $patient->getPhoneNumber()  . "<br>";
        echo "Address :" . $patient->getaddress() . "<br>";
        echo "Email :" . $patient->getemail() . "<br>";
        echo "<a class='btn btn-primary' href='AppointmentPage.php?Pid=" . $patient->getUserID() . "'>View Appointments</a> ";
        echo "<a class='btn btn-success' href='MedicalRecords.php?Pid=" . $patient->getUserID() . "'>View Medical Records</a>";
        echo "<a class='btn btn-success' href='AddMedicalRecords.php?Pid=" . $patient->getUserID() . "'>Add Patient Records</a>";
        echo "</p>";
        echo "</div>";
        echo "</div>";
    }
}
//Get All patients with a giving name in the User Table
function findPatientByName($fName, $LName)
{

    //Connnect to data base
    $conn = connect();
    //Create User data access object
    $dao = new UserDao($conn, "User");
    $patients = $dao->findAllUsersByAccessLevelAndName("Patient", $fName, $LName);
    //display all patient info one by one
    foreach ($patients as $patient) {
        echo "<div class='row'>";
        echo "<div class ='col'>";
        echo "<p>";
        echo "Name :" . $patient->getfirstname() . " " . $patient->getlastName() . " <br>";
        echo "Date of Birth :" . $patient->getDOB() . " PhoneNumber +44 " . $patient->getPhoneNumber()  . "<br>";
        echo "Address :" . $patient->getaddress() . "<br>";
        echo "Email :" . $patient->getemail() . "<br>";
        echo "<a class='btn btn-primary' href='AppointmentPage.php?Pid=" . $patient->getUserID() . "'>View Appointments</a> ";
        echo "<a class='btn btn-success' href='MedicalRecords.php?Pid=" . $patient->getUserID() . "'>View Medical Records</a>";
        echo "<a class='btn btn-success' href='AddMedicalRecords.php?Pid=" . $patient->getUserID() . "'>Add Patient Records</a>";
        echo "</p>";
        echo "</div>";
        echo "</div>";
    }
}
