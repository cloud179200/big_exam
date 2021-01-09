<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/Semantic-UI-CSS-master/semantic.css" />
  <link rel="stylesheet" href="../css/Semantic-UI-CSS-master/semantic.min.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital@1&display=swap" rel="stylesheet" />
  <link rel="icon" href="../images/home.png">
  <title>Exam Online</title>
</head>

<body>
  <?php
  include("../php/shared/debug_to_console.php");
  $email = $_POST["email"];
  if (isset($_SESSION["email"])) {
    debug_to_console($_SESSION["email"]);
    header("Location:main.php", true, 301);
  } else {
    $_SESSION["email"] = $email;
    debug_to_console($_SESSION["email"]);
  }
  unset($_POST);
  ?>
  <div id="app">
    <div class="home-container">
      <div class="home-header"></div>
      <div class="home-main">
        <form id="emailForm" action="index.php" method="POST">
          <div class="ui right icon input">
            <input autocomplete="off" name="email" type="email" placeholder="Enter your email to do the test..." />
            <i class="arrow right icon"></i>
          </div>
        </form>

      </div>
      <div class="home-footer">
        <i class="copyright outline icon"></i> 2020 - LeVietAnh<?php echo $_POST["email"] ?>
      </div>
    </div>
  </div>
</body>
<script src="../js/home.js"></script>


</html>