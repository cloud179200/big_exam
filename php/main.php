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
    <link rel="icon" href="../images/exam.png">

    <title>Exam Online</title>
</head>

<body>
    <?php
    include("db.php");
    if(!isset($_SESSION["email"])){
        header("Location:index.php", true, 301);
    }
    ?>
    <div id="app">
        <div class="main-containner">
            <div class="main-navbar">
                <div class="navbar-logo" id="goToHome">
                    <i class="large big home icon"></i>
                </div>
                <div class="navbar-link ui buttons">
                    <a href="/dotest">Do Test</a>
                    <a href="/history">History</a>
                </div>
                <div class="navbar-current-info">
                    <?php echo $_SESSION["email"] ?>
                    <span id="menuBtn"><i class="chevron down icon"></i>
                        <div class="navbar-info-menu">Logout</div>
                    </span>
                </div>
            </div>
            <div class="main-content">
                <div class="subject-content">
                    <div class="subject" id="math">
                        <div class="content">Toán</div>
                    </div>
                    <div class="subject" id="history">
                        <div class="content">Lịch Sử</div>
                    </div>
                    <div class="subject" id="biology">
                        <div class="content">Sinh Học</div>
                    </div>
                    <div class="subject" id="physic">
                        <div class="content">Vật Lý</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>