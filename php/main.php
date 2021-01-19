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
    <script src="../js/index.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-containner">
            <div class="main-navbar">
                <div class="navbar-logo" id="goToHome">
                    <i class="large big home icon" id="homeBtn"></i>
                </div>
                <div class="navbar-info">
                    <div class="current-email"></div>
                    <span class="menu-btn"><i class="chevron right icon"></i></span>
                    <div class="navbar-info-menu">
                        <ul class="navbar-info-menu-sub">
                            <form id="actionForm" action="./action.php" method="post" style="display: none;">
                                <input type="text" name="action">
                            </form>
                            <li id="historyBtn"><i class="history icon"></i>History</li>
                            <li id="logoutBtn"><i class="power off icon"></i>Logout</li>
                        </ul>
                    </div>
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
<script src="../js/main.js"></script>
</html>