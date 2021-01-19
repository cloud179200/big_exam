<?php
include "../shared/mail.php";
include "../shared/generateRandString.php";
include "./database.php";
$email = $_POST["email"] ? $_POST['email'] : "cloud179200@gmail.com";
header('Content-type: application/json');

if (!empty($email)) {
    if ($conn) {
        $queryString = "SELECT email, created FROM users where email='$email'";
        $resultQuery = $conn->query($queryString);
        if ($resultQuery->num_rows > 0) {
            
            $secretString = generateRandString(5);
            sendMail($email, $secretString);

            //update current secrectKey in mysql
            $currentPassHashed = hash("sha256", $secretString, false);
            $updateString = "UPDATE users SET currentPassword='$currentPassHashed'";
            
            $conn->query($updateString);
            $data = $resultQuery->fetch_all();
            echo json_encode($data);
        } else {
            $secretString = generateRandString(5);
            //hash secrectString
            $currentPassHashed = hash("sha256", $secretString, false);
            //insert DB
            $insertString = "INSERT INTO users values('$email', CURRENT_TIMESTAMP(), '$currentPassHashed')";
            $resultInsert = $conn->query($insertString);
            sendMail($email, $secretString);

            $queryString = "SELECT email, created FROM users where email='$email'";
            $resultQuery = $conn->query($queryString);
            $data = $resultQuery->fetch_all();
            echo json_encode($data);
        }
    }
}
$conn->close();
