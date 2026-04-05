<?php
include "db.php";
header("Content-Type: application/json");

$username = $_POST['username'];
$taskTitle = $_POST['taskTitle'];
$taskDesc = $_POST['taskDesc'];

$sql = $conn->prepare("INSERT INTO tasks (username, taskTitle, taskDesc) VALUES (?,?,?)");
$sql->bind_param("sss", $username, $taskTitle, $taskDesc);
if ($sql->execute()) {
    echo json_encode(['success' => true]);
    exit;
} else {
    echo json_encode(['success' => false]);
    exit;
}
