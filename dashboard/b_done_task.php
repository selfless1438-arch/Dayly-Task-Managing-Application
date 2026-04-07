<?php
include "db.php";
header("Content-Type: application/json");

$id = $_POST['id'];

$status = 'completed';
$date = new DateTime();
$formattedDate = $date->format("Y-m-d H:i:s");

$sql = $conn->prepare("UPDATE tasks SET completed_at = ?, status = ? WHERE id = ?");
$sql->bind_param("ssi", $formattedDate,$status, $id);

if ($sql->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}

exit;
