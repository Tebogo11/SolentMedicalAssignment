
<?php
include("../Models/User.php");
//User data access object to connect to the User data base and retrive, store and update information
class UserDao
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }


    // find a User by given User ID

    public function findUserByUserID($id)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE UserID=?");
        //Query excuted
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new User(
            $row["UserID"],
            $row["Username"],
            $row["password"],
            $row["FirstName"],
            $row["LastName"],
            $row["Address"],
            $row["PhoneNumber"],
            $row["Email"],
            $row["DOB"],
            $row["AccessLevel"]
        );
    }

    //Check if user exist by finding out if a specfic Username or Password exists in the system 
    public function findUserByUserNandPass($userN, $pass)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table . " WHERE Username = ? AND password = ?");
        //Query excuted
        $stmt->execute([$userN, $pass]);
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Retriving a user id by the username and password 
    public function findUserIDByUserNandPass($userN, $pass)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE Username=? AND password=?");
        //Query excuted
        $stmt->execute([$userN, $pass]);
        $row = $stmt->fetch();
        return $id = $row["UserID"];
    }

    //Retriving the access level of a specfic user, by the username and password 
    public function findUserAccessByUserNandPass($userN, $pass)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE Username=? AND password=?");
        //Query excuted
        $stmt->execute([$userN, $pass]);
        $row = $stmt->fetch();
        return $access = $row["AccessLevel"];
    }

    // Find all Users with a specficed Access-level

    public function findAllUsersByAccessLevel($accessLevel)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE AccessLevel=?");
        //Query excuted
        $stmt->execute([$accessLevel]);
        $Users = [];
        //While loop to collect all results and store them in a User Object
        while ($row = $stmt->fetch()) {
            $User =  new User(
                $row["UserID"],
                $row["Username"],
                $row["password"],
                $row["FirstName"],
                $row["LastName"],
                $row["Address"],
                $row["PhoneNumber"],
                $row["Email"],
                $row["DOB"],
                $row["AccessLevel"]
            );
            $Users[] = $User;
        }
        return  $Users;
    }

    //find all Users with a specficed Access-level and Name 
    public function findAllUsersByAccessLevelAndName($accessLevel, $firstN, $LastN)
    {
        //SQL statement
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE FirstName = ? AND LastName = ? AND AccessLevel = ?");
        //Query excuted
        $stmt->execute([$firstN, $LastN, $accessLevel]);
        $Users = [];
        //While loop to collect all results and store them in a User Object
        while ($row = $stmt->fetch()) {
            $User = new User(
                $row["UserID"],
                $row["Username"],
                $row["password"],
                $row["FirstName"],
                $row["LastName"],
                $row["Address"],
                $row["PhoneNumber"],
                $row["Email"],
                $row["DOB"],
                $row["AccessLevel"]
            );
            $Users[] = $User;
        }
        return  $Users;
    }

    //add a User to the User database
    public function addUser(User $UserObj)
    {
        //SQL statement
        $stmt = $this->conn->prepare("INSERT INTO " .  $this->table .  "(UserID,Username,password,FirstName,LastName,Address,PhoneNumber,Email,DOB,AccessLevel) VALUES (?,?,?,?,?,?,?,?,?,?)");
        //Query excuted
        $stmt->execute([
            $UserObj->getUserID(), $UserObj->getUsername(), $UserObj->getPassword(), $UserObj->getfirstName(),
            $UserObj->getlastName(), $UserObj->getaddress(), $UserObj->getPhoneNumber(),
            $UserObj->getemail(), $UserObj->getDOB(), $UserObj->getAccessLevel()
        ]);
    }

    //delete a User from the User database
    public function deleteUser(User $UserObj)
    {
        //SQL statement
        $stmt = $this->conn->prepare("DELETE FROM " .  $this->table . " WHERE userID=? ");
        //Query excuted
        $stmt->execute([$UserObj->getUserID()]);
    }
}
?>

