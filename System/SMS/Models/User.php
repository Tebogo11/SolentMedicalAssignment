<?php
//User class
class User
{

    private $UserID, $username, $password,
        $firstName, $lastName, $address, $phoneNumber, $email, $DOB,
        $accessLevel;
    //constructor  
    public function __construct(
        $id,
        $userN,
        $pass,
        $firstN,
        $lName,
        $address,
        $Phonenum,
        $email,
        $DOB,
        $accessLevel
    ) {
        $this->UserID = $id;
        $this->username = $userN;
        $this->password = $pass;
        $this->firstName = $firstN;
        $this->lastName = $lName;
        $this->address = $address;
        $this->phoneNumber = $Phonenum;
        $this->email = $email;
        $this->DOB = $DOB;
        $this->accessLevel = $accessLevel;
    }

    //Getter methods 
    public function getUserID()
    {
        return $this->UserID;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getfirstName()
    {
        return $this->firstName;
    }

    public function getlastName()
    {
        return $this->lastName;
    }

    public function getaddress()
    {
        return $this->address;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function getDOB()
    {
        return $this->DOB;
    }

    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    public function setUserID($id)
    {
        $this->UserID = $id;
    }
}
