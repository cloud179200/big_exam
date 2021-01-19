<?php
include "../database/database.php";
$email = $_POST["email"] ? $_POST['email'] : "";
$secretString = $_POST["secretString"] ? $_POST['secretString'] : "";
$currentPassHashed = hash("sha256", $secretString, false);
header('Content-type: application/json');
if (!empty($email) && !empty($secretString) && $conn) {
    $queryString = "SELECT * FROM users WHERE email='$email' AND currentPassword='$currentPassHashed'";
    $queryResult = $conn->query($queryString);
    if ($queryResult->num_rows > 0) {
        if ($email == "cloud179200@gmail.com") {
            echo json_encode(array("verify" => true, "admin" => true));
        } else if ($email != "cloud179200@gmail.com") {
            echo json_encode(array("verify" => true, "admin" => false));
        }
    } else {
        echo json_encode(array("verify" => false));
    }
} else echo json_encode(array("error" => "empty email or secret key"));
