<?php
include "db.php";
header("Content-Type: application/json");
$username = $_POST["username"];

$completed = "completed";
$sql = $conn->prepare("SELECT 
COUNT(CASE WHEN DATE(completed_at) = CURDATE() THEN 1 END) AS com_10,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 1 DAY THEN 1 END) AS com_09,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 2 DAY THEN 1 END) AS com_08,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 3 DAY THEN 1 END) AS com_07,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 4 DAY THEN 1 END) AS com_06,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 5 DAY THEN 1 END) AS com_05,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 6 DAY THEN 1 END) AS com_04,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 7 DAY THEN 1 END) AS com_03,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 8 DAY THEN 1 END) AS com_02,
COUNT(CASE WHEN DATE(completed_at) = CURDATE() - INTERVAL 9 DAY THEN 1 END) AS com_01
FROM tasks WHERE username = ? AND status = ?
");

$sql->bind_param("ss", $username, $completed);
$sql->execute();

$com_result = $sql->get_result();
$com_count = $com_result->fetch_assoc();

$pending = "pending";
$sql = $conn->prepare("SELECT 
COUNT(CASE WHEN DATE(created_at) = CURDATE() THEN 1 END) AS pen_10,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 1 DAY THEN 1 END) AS pen_09,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 2 DAY THEN 1 END) AS pen_08,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 3 DAY THEN 1 END) AS pen_07,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 4 DAY THEN 1 END) AS pen_06,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 5 DAY THEN 1 END) AS pen_05,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 6 DAY THEN 1 END) AS pen_04,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 7 DAY THEN 1 END) AS pen_03,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 8 DAY THEN 1 END) AS pen_02,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 9 DAY THEN 1 END) AS pen_01
FROM tasks WHERE username = ? AND status = ?
");

$sql->bind_param("ss", $username, $pending);
$sql->execute();

$pen_result = $sql->get_result();
$pen_count = $pen_result->fetch_assoc();


$inprocess = "inprocess";
$sql = $conn->prepare("SELECT 
COUNT(CASE WHEN DATE(created_at) = CURDATE() THEN 1 END) AS pro_10,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 1 DAY THEN 1 END) AS pro_09,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 2 DAY THEN 1 END) AS pro_08,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 3 DAY THEN 1 END) AS pro_07,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 4 DAY THEN 1 END) AS pro_06,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 5 DAY THEN 1 END) AS pro_05,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 6 DAY THEN 1 END) AS pro_04,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 7 DAY THEN 1 END) AS pro_03,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 8 DAY THEN 1 END) AS pro_02,
COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 9 DAY THEN 1 END) AS pro_01
FROM tasks WHERE username = ? AND status = ?
");

$sql->bind_param("ss", $username, $inprocess);
$sql->execute();

$pro_result = $sql->get_result();
$pro_count = $pro_result->fetch_assoc();

$data = [
    "completed" => $com_count,
    "pending" => $pen_count,
    "inprocess" => $pro_count,
];

echo json_encode($data);