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
    <link rel="icon" href="../images/server.png">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../css/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="../css/Semantic-UI-CSS-master/semantic.js"></script>

    <title>Admin page</title>
    <script src="../js/index.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-containner">
            <div class="main-navbar">
                <div class="navbar-logo" id="goToHome">
                </div>
                <div class="navbar-info">
                    <div class="current-email"></div>
                    <span class="menu-btn"><i class="chevron right icon"></i></span>
                    <div class="navbar-info-menu">
                        <ul class="navbar-info-menu-sub">
                            <form id="actionForm" action="./action.php" method="post" style="display: none;">
                                <input type="text" name="action">
                            </form>
                            <li id="logoutBtn"><i class="power off icon"></i>Logout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="admin-content">
                    <div class="action-picked">
                        <div class="ui compact menu">
                            <div class="ui simple dropdown item">
                                Action
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" id="actionAdd">Add question</div>
                                    <div class="item" id="actionUpdate">Update question</div>
                                    <div class="item" id="actionRemove">Remove question</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="list-question">
                        
                    </div>
                    <?php
                    if ($_GET["action"] == "add") {
                        echo '
                        <form class="ui form" id="addForm">
                        <div class="field">
                            <label>Content</label>
                            <input type="text" name="content" placeholder="Content...">
                        </div>
                        <div class="field">
                            <label>Subject</label>
                            <select class="ui dropdown" name="subject">
                                <option value="math">Math</option>
                                <option value="history">History</option>
                                <option value="biology">Biology</option>
                                <option value="physic">Physic</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Correct Answer</label>
                            <input type="text" name="answerCorrect" placeholder="Correct answer...">
                        </div>
                        <div class="field">
                            <label>Answer 1</label>
                            <input type="text" name="answer1" placeholder="Answer 1...">
                        </div>
                        <div class="field">
                            <label>Answer 2</label>
                            <input type="text" name="answer2" placeholder="Answer 2...">
                        </div>
                        <div class="field">
                            <label>Answer 3</label>
                            <input type="text" name="answer3" placeholder="Answer 3...">
                        </div>
                        <div class="field">
                            <label>level</label>
                            <select class="ui dropdown" name="level">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <button class="ui button" type="submit" id="addBtn">Add</button>
                    </form>';
                    }
                    if ($_GET["action"] == "update") {
                        echo '<form class="ui form" id="updateForm">
                        <div class="field">
                            <label>Id Question</label>
                            <input type="text" name="idQuestion" placeholder="Content...">
                        </div>
                        <div class="field">
                            <label>Content</label>
                            <input type="text" name="content" placeholder="Content...">
                        </div>
                        <div class="field">
                            <label>Subject</label>
                            <select class="ui dropdown" name="subject">
                                <option value="math">Math</option>
                                <option value="history">History</option>
                                <option value="biology">Biology</option>
                                <option value="physic">Physic</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Answer 1</label>
                            <input type="text" name="answer1" placeholder="Answer 1...">
                        </div>
                        <div class="field">
                            <label>Answer 2</label>
                            <input type="text" name="answer2" placeholder="Answer 2...">
                        </div>
                        <div class="field">
                            <label>Answer 3</label>
                            <input type="text" name="answer3" placeholder="Answer 3...">
                        </div>
                        <div class="field">
                            <label>Answer 4</label>
                            <input type="text" name="answer4" placeholder="Answer 1...">
                        </div>
                        <div class="field">
                            <label>level</label>
                            <select class="ui dropdown" name="level">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <button class="ui button" type="submit" id="updateBtn">Update</button>
                    </form>';
                    }
                    if ($_GET["action"] == "remove") {
                        echo ' <form class="ui form" id="removeForm">
                        <div class="field">
                            <label>Id Question</label>
                            <input type="text" name="idQuestion" placeholder="Id question...">
                            </div>
                        <button class="ui button" type="submit" id="removeBtn">Remove</button>
                    </form>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["error"])) {
        echo '<div class="erorr-container notification-container">
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
    if (isset($_GET["success"])) {
        echo '<div class="success-container notification-container">
        <div class="ui success message">
          <i class="close icon"></i>
          <div class="header">
            Success
          </div>
          <p>' . $_GET["success"] . '
          </p>
        </div>
      </div>';
    }
    ?>
</body>
<script src="../js/admin.js"></script>

</html>