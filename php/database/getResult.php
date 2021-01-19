<?php
include "./database.php";
header('Content-type: application/json');
if (count($_POST) == 17) {
    if ($conn) {
            $scores = 0;
            foreach ($_POST as $key => $val) {
                if ($key !== "email" && $key !== "subject")
                    $queryString = "SELECT * FROM questions WHERE idquestion='$key' AND idcorrectanswer='$val'";
                $resultQuery = $conn->query($queryString);
                $resultQuery->num_rows > 0 && $scores += 0.66666666666;
            }
            $insertString = "INSERT INTO historys value('" . $_POST['email'] . "', '" . $_POST['subject'] . "', CURRENT_TIMESTAMP(), " . $scores . ")";
            $resultInsert = $conn->query($insertString);
            echo json_encode(array("scores" => $scores));
    } else json_encode(array("error" => "database error"));
} else json_encode(array("error" => "not enough value"));
$conn->close();
?>