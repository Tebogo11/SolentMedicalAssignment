
<?php

//Link Bootstrap to the site 
function bootstrap()
{
  echo "
<!--navbar loged Out-->
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'
integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>

<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>";
}

//Naviagtion bar when Logged out 
function logedoutNav()
{

  echo "


<!--navbar loged Out-->
<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo03' aria-controls='navbarTogglerDemo03' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <a class='navbar-brand' href='#'><img src='img/SMSLOGO.png' alt='Logo' height='42' width='100'></a>


  <div class='collapse navbar-collapse' id='navbarTogglerDemo03'>
    <ul class='navbar-nav mr-auto mt-2 mt-lg-0 '>
      <li class='nav-item active'>
        <a class='nav-link' href='index.php'>Home </a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='AppointmentPage.php'>Appointments</a>
      </li>
      <li class='nav-item active'>
        <a class='nav-link' href='Login.php'>Login</a>
      </li>
      <li class='nav-item active'>
        <a class='nav-link' href='SignUp.php'>Sign Up</a>
      </li>
    </ul>
    <form class='form-inline' method ='get' action='InformationSearch.php'>
      <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search' name='DiseaseN'>
      <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
    </form>
  </div>
</nav>";
}

//Logged In Naviagtion Bar 
function logedinNav()
{
  echo " 
  <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo03' aria-controls='navbarTogglerDemo03' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <a class='navbar-brand' href='#'><img src='img/SMSLOGO.png' alt='Logo' height='42' width='100'></a>
  
  
    <div class='collapse navbar-collapse' id='navbarTogglerDemo03'>
      <ul class='navbar-nav mr-auto mt-2 mt-lg-0 '>
        <li class='nav-item active'>
          <a class='nav-link ' href='index.php'>Home </a>
        </li>
        <li class='nav-item active'>
          <a class='nav-link' href='AppointmentPage.php'>Appointments</a>
        </li>
        <li class='nav-item active'>
          <a class='nav-link' href='MedicalRecords.php'>Medical Records</a>
        </li>
        <li class='nav-item dropdown active'>
        <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Account Settings</a>
        <div class='dropdown-menu'>
          <a class='dropdown-item' href='AccountPage.php'>Account Info</a>
          <a class='dropdown-item' href='Logoff.php'>Log Out</a>
          <a class='dropdown-item' href='Help.php'>Help</a>
            </li>
      </ul>
      <form class='form-inline'  method ='get' action='InformationSearch.php'>
        <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'  name='DiseaseN'>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
      </form>
    </div>
  </nav>";
}

//Staff Logged in Naviagtion bar 
function staffNav()
{
  echo " 
  <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo03' aria-controls='navbarTogglerDemo03' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <a class='navbar-brand' href='#'><img src='img/SMSLOGO.png' alt='Logo' height='42' width='100'></a>
  
  
    <div class='collapse navbar-collapse' id='navbarTogglerDemo03'>
      <ul class='navbar-nav mr-auto mt-2 mt-lg-0 '>
        <li class='nav-item active'>
          <a class='nav-link ' href='index.php'>Home </a>
        </li>
        <li class='nav-item active'>
          <a class='nav-link' href='AllappointmentPage.php'> All Appointments</a>
        </li>
        <li class='nav-item active'>
          <a class='nav-link' href='PatientInfo.php'>Patient Search</a>
        </li>
        <li class='nav-item dropdown active'>
        <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Account Settings</a>
        <div class='dropdown-menu'>
          <a class='dropdown-item' href='AccountPage.php'>Account Info</a>
          <a class='dropdown-item' href='Logoff.php'>Log Out</a>
          <a class='dropdown-item' href='Help.php'>Help</a>
            </li>
      </ul>
      <form class='form-inline' method ='get' action='InformationSearch.php'>
        <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'  name='DiseaseN'>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
      </form>
    </div>
  </nav>";
}

//Chechs if user is logged in and shows naviagtion bar based on weather its a user or Staff. 
function Navaccess()
{
session_start();

  if (isset($_SESSION["gatekeeper"]) && $_SESSION["Access"] == "Staff") {
    staffNav();
  } else if (isset($_SESSION["gatekeeper"])) {
    logedinNav();
  } else {
    logedoutNav();
  }
}
?>
