<?php
include 'db.php';
header("Content-Type: application/json");

$username = $_POST['username'];


// Completed
$status = "completed";
$com = $conn->prepare("SELECT COUNT(*) FROM tasks WHERE status = ? AND username = ?");
$com->bind_param("ss", $status, $username);
$com->execute();
$com->bind_result($completed);
$com->fetch();
$com->close();


// Pending
$status = "pending";
$pen = $conn->prepare("SELECT COUNT(*) FROM tasks WHERE status = ? AND username = ?");
$pen->bind_param("ss", $status, $username);
$pen->execute();
$pen->bind_result($pending);
$pen->fetch();
$pen->close();


// In Process
$status = "inprocess";
$pro = $conn->prepare("SELECT COUNT(*) FROM tasks WHERE status = ? AND username = ?");
$pro->bind_param("ss", $status, $username);
$pro->execute();
$pro->bind_result($inprocess);
$pro->fetch();
$pro->close();


$data = [
    "completed" => $completed,
    "pending" => $pending,
    "inprocess" => $inprocess
];

echo json_encode($data);
