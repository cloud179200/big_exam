<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "./database/database.php";
    if (isset($_GET["subject"])) {
        $subject = $_GET["subject"];
        $queryString5Question_lvl_1 = "SELECT * FROM questions WHERE subject='$subject' and level=1 ORDER BY RAND() LIMIT 5";
        $queryString5Question_lvl_2 = "SELECT * FROM questions WHERE subject='$subject' and level=2 ORDER BY RAND() LIMIT 5";
        $queryString5Question_lvl_3 = "SELECT * FROM questions WHERE subject='$subject' and level=3 ORDER BY RAND() LIMIT 5";   
    ?>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/Semantic-UI-CSS-master/semantic.css" />
        <link rel="stylesheet" href="../css/Semantic-UI-CSS-master/semantic.min.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital@1&display=swap" rel="stylesheet" />
        <link rel="icon" href="../images/exam.png">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="../css/Semantic-UI-CSS-master/semantic.min.js"></script>
        <title>Do <?php echo  ucfirst($subject); ?> Test</title>
        <script src="../js/index.js"></script>
</head>

<body>
    <?php

        if ($conn) {
            $result_5_ques_lvl_1 = $conn->query($queryString5Question_lvl_1);
            $result_5_ques_lvl_1_array = $result_5_ques_lvl_1->fetch_all();

            $result_5_ques_lvl_2 = $conn->query($queryString5Question_lvl_2);
            $result_5_ques_lvl_2_array = $result_5_ques_lvl_2->fetch_all();

            $result_5_ques_lvl_3 = $conn->query($queryString5Question_lvl_3);
            $result_5_ques_lvl_3_array = $result_5_ques_lvl_3->fetch_all();

    ?>
        <div id="app">
            <div class="main-containner">
                <div class="main-content">
                    <div class="main-navbar">
                        <div class="navbar-logo">
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
                    <div class="test-content">
                        <form class="ui form">
                            <h4 class="ui dividing header">You are testing: <?php echo ucfirst($subject); ?></h4>
                            <div class="ui form">
                        <?php
                        $questions = array_merge($result_5_ques_lvl_1_array, $result_5_ques_lvl_2_array);
                        $questions = array_merge($questions, $result_5_ques_lvl_3_array);
                        foreach ($questions as $ques) {
                            $idquestion = $ques[0];
                            $subject = $ques[1];
                            $content = $ques[2];
                            $idCorrectAns = $ques[3];
                            $idAns_1 = $ques[4];
                            $idAns_2 = $ques[5];
                            $idAns_3 = $ques[6];
                            $idAns_4 = $ques[7];
                            $level = $ques[8];



                            $queryAnsString_correct = "SELECT answers.content as correctAnswer from questions, answers WHERE questions.idcorrectanswer = answers.idanswer AND idquestion='$idquestion'";
                            $queryAnsString_1 = "SELECT answers.content as answer1 from questions, answers WHERE questions.idanswer1 = answers.idanswer AND idquestion='$idquestion'";
                            $queryAnsString_2 = "SELECT answers.content as answer2 from questions, answers WHERE questions.idanswer2 = answers.idanswer AND idquestion='$idquestion'";
                            $queryAnsString_3 = "SELECT answers.content as answer3 from questions, answers WHERE questions.idanswer3 = answers.idanswer AND idquestion='$idquestion'";
                            $queryAnsString_4 = "SELECT answers.content as answer4 from questions, answers WHERE questions.idanswer4 = answers.idanswer AND idquestion='$idquestion'";
                            $result_correct = $conn->query($queryAnsString_correct);
                            $row = $result_correct->fetch_array();
                            $correctAns = $row["correctAnswer"];
                            $result_ans1 = $conn->query($queryAnsString_1);
                            $row = $result_ans1->fetch_array();
                            $ans_1 = $row["answer1"];
                            $result_ans2 = $conn->query($queryAnsString_2);
                            $row = $result_ans2->fetch_array();
                            $ans_2 = $row["answer2"];
                            $result_ans3 = $conn->query($queryAnsString_3);
                            $row = $result_ans3->fetch_array();
                            $ans_3 = $row["answer3"];
                            $result_ans4 = $conn->query($queryAnsString_4);
                            $row = $result_ans4->fetch_array();
                            $ans_4 = $row["answer4"];
                            echo '
                            <div class="grouped fields">
                            <label class="question-content" id=' . $idquestion . '>' . $content . ' - Level:' . $level . '?</label>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="' . $idquestion . '" value="' . $idAns_1 . '"/>
                                    <label>' . $ans_1 . '</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="' . $idquestion . '" value="' . $idAns_2 . '"/>
                                    <label>' . $ans_2 . '</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="' . $idquestion . '" value="' . $idAns_3 . '"/>
                                    <label>' . $ans_3 . '</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="' . $idquestion . '" value="' . $idAns_4 . '"/>
                                    <label>' . $ans_4 . '</label>
                                </div>
                            </div>
                        </div>';
                        }
                        echo '<div class="control-btn-group"><button id="sendBtn" class="ui primary button">
                        Send
                      </button>
                      <button id="cancelBtn" class="ui button">
                        Cancel
                      </button></div>';
                    } else {
                        echo "database error!";
                    }
                }
                        ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui basic modal">
            <div class="ui icon header">
                <i class="x icon"></i>
                Warning
            </div>
            <div class="content">
                <p>
                    You have not filled in enough answer. Do you want to send?</p>
            </div>
            <div class="actions">
                <div class="ui red basic cancel inverted button" id="cancelSendBtn">
                    <i class="remove icon"></i>
                    No
                </div>
                <div class="ui green ok inverted button" id="acceptSendBtn">
                    <i class="checkmark icon"></i>
                    Yes
                </div>
            </div>
        </div>
        <div class="countdown-timer">
            Start
        </div>
</body>
<script src="../js/main.js"></script>
<script src="../js/dotest.js"></script>

</html>
?>