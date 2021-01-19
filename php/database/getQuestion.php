<?php
include "./database.php";
if (!empty($_POST["email"]) && !empty($_POST["secretString"])) {
    if ($conn && $_POST["email"] == "cloud179200@gmail.com") {
        $hashedString =  hash("sha256", $_POST["secretString"], false);
        $resultQuery = $conn->query("SELECT * FROM users where currentPassword='$hashedString'");

        if ($resultQuery->num_rows > 0) {

            $resultQuery = $conn->query("SELECT * FROM questions");
            $questions = $resultQuery->fetch_all();
            $arrayResult = array();

            foreach ($questions as $ques) {
                $idQuestion = $ques[0];
                $subject = $ques[1];
                $content = $ques[2];
                $ans_1 = $ques[4];
                $answer_1 = (($conn->query("SELECT * FROM answers WHERE idanswer='$ans_1'"))->fetch_all())[0][1];
                $ans_2 = $ques[5];
                $answer_2 = (($conn->query("SELECT * FROM answers WHERE idanswer='$ans_2'"))->fetch_all())[0][1];

                $ans_3 = $ques[6];
                $answer_3 = (($conn->query("SELECT * FROM answers WHERE idanswer='$ans_3'"))->fetch_all())[0][1];

                $ans_4 = $ques[7];
                $answer_4 = (($conn->query("SELECT * FROM answers WHERE idanswer='$ans_4'"))->fetch_all())[0][1];

                $level = $ques[8];
                $created = $ques[9];
                array_push($arrayResult, array("idQuestion" => $idQuestion, "subject" => $subject, "content" => $content, "level" => $level, "created" => $created, "answer1" => $answer_1, "answer2" => $answer_2, "answer3" => $answer_3, "answer4" => $answer_4));
            }
            echo json_encode($arrayResult);
        }
    }
}
