<?php
include "db.php";
header("Content-Type: application/json");

$data = new DateTime();
$formattedDate = $data->format("Y-m-d H:i:s");

$id = $_POST['id'];
$status = "inprocess";
$sql = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ? ");
$sql->bind_param("si", $status, $id);

if ($sql->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(['success' => false]);
}

exit;
