<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['questions'])) {
    $_SESSION['questionsData'] = $data['questions'];
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "No questions data received"]);
}
