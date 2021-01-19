<?php
include "./database.php";
$email = $_POST["email"] ? $_POST['email'] : "";
header('Content-type: application/json');

if (!empty($email)) {
    if ($conn) {
        unset($_POST);
        unset($_COOKIE);
        $queryString = "SELECT * FROM historys where email='$email'";
        $resultQuery = $conn->query($queryString);
        
        $data = $resultQuery->fetch_all();
        $conn->close();
        echo json_encode($data);
    }
};
$conn->close();
?>