<?php
include "./database.php";
if (!empty($_POST["idQuestion"]) && !empty($_POST["email"] && !empty($_POST["secretString"]))) {
    $idQuestion = $_POST["idQuestion"];
    $email = $_POST["idQuestion"];
    $secretString = $_POST["secretString"];
    if ($conn) {
        $queryString = "SELECT * FROM questions where idquestion = '$idQuestion'";
        $resultQuery = $conn->query($queryString);
        if ($resultQuery->num_rows > 0) {
            $arr = $resultQuery->fetch_array();
            $conn->query("DELETE FROM questions WHERE idquestion='$idQuestion'");
            $idAns1 = $arr["idanswer1"];
            $conn->query("DELETE FROM answers WHERE idanswer='$idAns1'");
            $idAns2 = $arr["idanswer2"];
            $conn->query("DELETE FROM answers WHERE idanswer='$idAns2'");
            $idAns3 = $arr["idanswer3"];
            $conn->query("DELETE FROM answers WHERE idanswer='$idAns3'");
            $idAns4 = $arr["idanswer4"];
            $conn->query("DELETE FROM answers WHERE idanswer='$idAns4'");
            echo json_encode(array("success" => "$idQuestion"));
        } else echo json_encode(array("error" => "not found id!"));
    } else echo json_encode(array("error" => "error database"));
} else echo json_encode(array("error" => "not found id!"));
