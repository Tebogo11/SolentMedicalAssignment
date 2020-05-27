<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
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
      <h2>Login</h2>
      <p>
        <!--Form to type in Loggin details-->
        <form method="post" action="Login.php">
          <div class="form-group text-center">
            <label for="username">Username</label>
            <div class="mx-auto" style="width: 200px; margin-top:10px;">
              <input name="username" class="form-control" id="username" />
            </div>
            <label for="password">Password</label>
            <div class="mx-auto" style="width: 200px;">
              <input name="password" class="form-control" id="password" type="password" />
            </div>
            <div class="mx-auto" style="margin-top: 10px;">
              <input type="submit" class="btn btn-success" value="Login" />
            </div>
          </div>
        </form>
      </p>
      <?php
       error_reporting(0);
      $userN = $_POST["username"];
      $pass = $_POST["password"];
     

      if ($userN == null) {
        
      } else {
        verifyLogIn($userN, $pass);
       
      }
      ?>
    </div>

  </body>
  <div>
    <!--footer-->
    <div id="footer">
      <h2>Contact US</h2>
      <p> Email : SMS@outlook.co.uk</p>
      <p> Phone Number : 44-765-5512-377 </p>
      <div class="row justify-content-md-center">
        <div class="col-md-auto">
          <p> Address :</p>
        </div>
        <div class="col-md">
          <p>1 London Road, Southampton, SO15 2AE</p>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
    </div>

</html>