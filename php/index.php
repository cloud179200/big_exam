<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/Semantic-UI-CSS-master/semantic.css" />
  <link rel="stylesheet" href="../css/Semantic-UI-CSS-master/semantic.min.css" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital@1&display=swap" rel="stylesheet" />
  <link rel="icon" href="../images/home.png">
  <title>Exam Online</title>
  <link rel="stylesheet" href="../css/style.css" />
  <?php
  if ($_GET["action"] == "logout") {
    echo '<script>localStorage.clear();</script>';
  }
  ?>
  <script src="../js/index.js"></script>
</head>

<body>
  <div id="app">
    <div class="home-container">
      <div class="home-header"></div>
      <div class="home-main">
        <?php
        if (isset($_GET["verify"])) {
          echo '<form method="POST" class="verifyForm" id="secretStringForm" name="secretStringForm">
            <div class="ui right icon input">
              <input name="secretString" type="text" placeholder="Check email and enter your secret text..." />
              <i class="arrow right icon" id="submitBtn"></i>
            </div>
          </form>';
        } else {
          echo '<form method="POST" class="verifyForm" id="emailForm" name="emailForm">
          <div class="ui right icon input">
            <input name="email" type="email" placeholder="Enter your email to do the test..." />
            <i class="arrow right icon" id="submitBtn"></i>
          </div>
        </form>';
        }
        ?>
      </div>
      <div class="home-footer">
        <i class="copyright outline icon"></i> 2021 - LeVietAnh
      </div>
    </div>
    <?php
    if (isset($_GET["error"])) {
      echo '<div class="erorr-container">
        <div class="ui negative message">
          <i class="close icon"></i>
          <div class="header">
            Opps! some thing went wrong
          </div>
          <p>' . $_GET["error"] . '
          </p>
        </div>
      </div>';
    }
    ?>
  </div>
</body>
<script src="../js/home.js"></script>

</html>