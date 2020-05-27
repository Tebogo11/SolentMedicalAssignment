<?php
//Delete Appointment 
include_once("../Controller/AppointmentLibrary.php");
$page = $_GET["Location"];
$AppointID = $_GET["Aid"];
$usr = $_GET["usrid"];

delete($AppointID);
header("Location: $page.php?Pid=$usr");
