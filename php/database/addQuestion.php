<?php
include "./database.php";
include "../shared/generateRandString.php";
if (
    !empty($_POST["email"]) && !empty($_POST["secretString"]) && !empty($_POST["content"]) && !empty($_POST["subject"])
    && !empty($_POST["correctAnswer"]) && !empty($_POST["answer1"]) && !empty($_POST["answer2"]) && !empty($_POST["answer3"]) && !empty($_POST["level"])
) {
    $email = $_POST["email"];
    $secretString = $_POST["secretString"];
    $subject = $_POST["subject"];
    $contentQues = $_POST["content"];
    $ans_correct = $_POST["correctAnswer"];
    $ans_1 = $_POST["answer1"];
    $ans_2 = $_POST["answer2"];
    $ans_3 = $_POST["answer3"];
    $level = $_POST["level"];
    if ($conn) {
        //ans 1
        $idAns_1 = generateRandString(20);
        $queryString = "SELECT * FROM answers where idanswer='$idAns_1'";
        $resultQuery = $conn->query($queryString);
        while ($resultQuery->num_rows > 0) {
            $idAns_1 = generateRandString(20);
            $queryString = "SELECT * FROM answers where idanswer='$idAns_1'";
            $resultQuery = $conn->query($queryString);
        }
        $insertString = "INSERT INTO answers values('$idAns_1', '$ans_1')";
        $resultInsert = $conn->query($insertString);
        //ans2
        $idAns_2 = generateRandString(20);
        $queryString = "SELECT * FROM answers where idanswer='$idAns_2'";
        $resultQuery = $conn->query($queryString);
        while ($resultQuery->num_rows > 0) {
            $idAns_2 = generateRandString(20);
            $queryString = "SELECT * FROM answers where idanswer='$idAns_2'";
            $resultQuery = $conn->query($queryString);
        }
        $insertString = "INSERT INTO answers values('$idAns_2', '$ans_2')";
        $conn->query($insertString);
        //ans3
        $idAns_3 = generateRandString(20);
        $queryString = "SELECT * FROM answers where idanswer='$idAns_3'";
        $resultQuery = $conn->query($queryString);
        while ($resultQuery->num_rows > 0) {
            $idAns_3 = generateRandString(20);
            $queryString = "SELECT * FROM answers where idanswer='$idAns_3'";
            $resultQuery = $conn->query($queryString);
        }
        $insertString = "INSERT INTO answers values('$idAns_3', '$ans_3')";
        $conn->query($insertString);
        //ans correct
        $idAns_Correct = generateRandString(20);
        $queryString = "SELECT * FROM answers where idanswer='$idAns_Correct'";
        $resultQuery = $conn->query($queryString);
        while ($resultQuery->num_rows > 0) {
            $idAns_Correct = generateRandString(20);
            $queryString = "SELECT * FROM answers where idanswer='$idAns_Correct'";
            $resultQuery = $conn->query($queryString);
        }
        $insertString = "INSERT INTO answers values('$idAns_Correct', '$ans_correct')";
        $conn->query($insertString);
        //question

        $idQues = generateRandString(20);
        $queryString = "SELECT * FROM questions where idquestion='$idQues'";
        $resultQuery = $conn->query($queryString);
        while ($resultQuery->num_rows > 0) {
            $idQues = generateRandString(20);
            $queryString = "SELECT * FROM questions where idquestion='$idQues'";
            $resultQuery = $conn->query($queryString);
        }
        $randomNum = rand(1, 4);

        switch ($randomNum) {
            case 1:
                $insertString = "INSERT INTO questions VALUES('$idQues', '$subject', '" . $contentQues . "', '$idAns_Correct', '$idAns_Correct', '$idAns_1', '$idAns_2', '$idAns_3', " . $level . ", CURRENT_TIMESTAMP())";
                $conn->query($insertString);
                break;
            case 2:
                $insertString = "INSERT INTO questions VALUES('$idQues', '$subject', '" . $contentQues . "', '$idAns_Correct', '$idAns_1' , '$idAns_Correct', '$idAns_2', '$idAns_3', " . $level . ", CURRENT_TIMESTAMP())";
                $conn->query($insertString);
                break;
            case 3:
                $insertString = "INSERT INTO questions VALUES('$idQues', '$subject', '" . $contentQues . "', '$idAns_Correct', '$idAns_1', '$idAns_2', '$idAns_Correct', '$idAns_3', " . $level . ", CURRENT_TIMESTAMP())";
                $conn->query($insertString);
                break;
            case 4:
                $insertString = "INSERT INTO questions VALUES('$idQues', '$subject', '" . $contentQues . "', '$idAns_Correct', '$idAns_1', '$idAns_2', '$idAns_3', '$idAns_Correct', " . $level . ", CURRENT_TIMESTAMP())";
                $conn->query($insertString);
                break;
        }
        $queryString = "SELECT * FROM questions where idquestion='$idQues'";
        $resultQuery = $conn->query($queryString);
        echo json_encode($resultQuery->fetch_all());
    } else echo json_encode(array("error" => "database error"));
} else echo json_encode(array("error" => "not enough info"));
$conn->close();
