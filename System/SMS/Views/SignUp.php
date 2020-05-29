<!DOCTYPE html>
<html>

<head>
  <title>SignUp</title>
  <link rel="stylesheet" type="text/css" href="Maincss.css">
  <?php
  include_once("../Controller/UserLibrary.php");
  include("navbar/navbar.php");
  bootstrap();
  Navaccess();
  ?>
</head>

<div id="container">

  <body>


    <!--main code-->
    <div id="main">
      <h2> Sign Up</h2>
      <!--Form to add patient to the system-->
      <form method="post" action="SignUp.php">
        <div class="form-group text-center">
          <label for="fname" for="lname">Full name</label><br>

          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="First name" id="fname" name="fname">
            </div>
            <div class="col ">
              <input type="text" class="form-control" placeholder="Last name" id="lname" name="lname">
            </div>
          </div>

          <label for="DOB">Date of Birth: </label><br>
          <?php

          echo "Day <select id='BDay'  name ='BDay'>";
          for ($i = 1; $i <= 31; $i++) {
            echo "<option value =" . $i . ">" . $i . "</option>";
          }
          echo "</select>";

          echo " Month <select id='BMonth'  name ='BMonth'>";
          for ($i = 1; $i <= 12; $i++) {
            echo "<option value =" . $i . ">" . $i . "</option>";
          }
          echo "</select>";

          $dates = getdate();
          $year = $dates["year"];
          $minYear = 1890;
          echo " Year <select id='BYear'  name ='BYear'>";
          for ($minYear; $minYear <= $year; $minYear++) {
            echo "<option value =" . $minYear . ">" . $minYear . "</option>";
          }
          echo "</select> <br>";
          ?>
          </select>
          <label for="Uname">Username:</label>
          <div class="mx-auto" style="width: 200px;">
            <input type="text" id="Uname" class="form-control" name="Uname">
          </div>
          <label for="Password">Password:</label>
          <div class="mx-auto" style="width: 200px;">
            <input type="password" id="Password" class="form-control" name="Password">
          </div>
          <label for="Address">Address:</label>
          <div class="mx-auto" style="width: 200px;">
            <input type="text" id="Address" class="form-control" name="Address">
          </div>
          <label for="Email">Email:</label>
          <div class="mx-auto" style="width: 200px;">
            <input type="text" id="Email" class="form-control" name="Email">
          </div>
          <label for="Pnumber">Phone Number:</label>
          <div class="mx-auto" style="width: 200px;">
            <input type="text" id="Pnumber" class="form-control" name="Pnumber">
          </div>
          <input type="hidden" name="AccessLevel" value="Patient">
          <div class="mx-auto" style="margin-top: 10px;">
            <input type="submit" class="btn btn-success" value="Sign Up" />
          </div>
        </div>
      </form>

      <?php
     
      $username = $_POST["Uname"];
      $password = $_POST["Password"];
      $firstName = $_POST["fname"];
      $lastName = $_POST["lname"];
      $address = $_POST["Address"];
      $email = $_POST["Email"];
      $phoneNumber = $_POST["Pnumber"];

      $dd = $_POST["BDay"];
      $md = $_POST["BMonth"];
      $yd = $_POST["BYear"];

      $DOB = date($yd . "-" . $md . "-" . $dd);

      $accessLevel = $_POST["AccessLevel"];


      addUser(
        $username,
        $password,
        $firstName,
        $lastName,
        $address,
        $phoneNumber,
        $email,
        $DOB,
        $accessLevel
      );

      ?>
    </div>
    <div class="col col-lg-2">
    </div>
</div>
</body>



</html>