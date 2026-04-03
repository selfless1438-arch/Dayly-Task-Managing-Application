<?php
include "db.php";
header("Content-Type: application/json");

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$password = $_POST['password'];
$hash_password = password_hash($password, PASSWORD_DEFAULT);

// checking email

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo json_encode(
        ["success" => false, "message" => "Eamil already registered!"]
    );
    exit;
}
$sql = $conn->prepare("INSERT INTO users (username, fullname, email, question, answer, password) VALUES (?,?,?,?,?,?)");
$sql->bind_param("ssssss", $username, $fullname, $email, $question, $answer, $hash_password);
if ($sql->execute()) {
    echo json_encode(["success" => true, "message" => "Congratulation your registration is approved"]);
    exit;
} else {
    echo json_encode(["success" => false , "message" => "Something went wrong at server"]);
    exit;
}
