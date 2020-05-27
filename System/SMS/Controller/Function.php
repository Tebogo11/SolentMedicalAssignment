
<?php
function connect()
{
    //Rename datebase to the one you have imported table in
    //set the username and password to your local php account, default is usual username ="root" password="" 
   $connection = new PDO("mysql:host=localhost:8111; dbname=solentmedical;", "root", "root");
    return $connection;
}
?>
