<?php
include "db.php";
header("Content-Type: application/json");

$username = $_POST['username'];
$notStatus = "completed";
$sql = $conn->prepare("SELECT * FROM tasks WHERE username = ? AND status != ?");
$sql->bind_param("ss", $username, $notStatus);
$sql->execute();

$result = $sql->get_result();

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode($data);
}
exit;
