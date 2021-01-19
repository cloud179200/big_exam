<?php
$action = $_POST["action"];
if ($action == "logout") {
    header("Location: ./index.php?action=logout", true, 301);
} else if ($action == "directToHistory") {
    header("Location: ./history.php", true, 301);
} else if ($action == "directToHome") {
    header("Location: ./main.php", true, 301);
} else if ($action == "doMathTest") {
    header("Location: ./dotest.php?subject=math", true, 301);
} else if ($action == "doHistoryTest") {
    header("Location: ./dotest.php?subject=history", true, 301);
} else if ($action == "doBiologyTest") {
    header("Location: ./dotest.php?subject=biology", true, 301);
} else if ($action == "doPhysicTest") {
    header("Location: ./dotest.php?subject=physic", true, 301);
}?>
