<?php 
require('../../../assets/function.php');

if (!isset($_SESSION['auth'])) {
    redirect('../../loginpage.php', "Oops, something went wrong");
}


header('Content-Type: application/json');

$encrypt_jsonFile = md5("data");
$jsonFile = trim($encrypt_jsonFile) . ".json";  // Corrected concatenation

$data = file_get_contents('php://input');  // Get JSON input from POST
$userId = $_SESSION['auth'];
$generated = json_decode($data, true);

$id = rand(1000, 9999);


$generatedData = [
    'id' => $id,
    'user_id' => $userId,
    'user_question' => $generated,
    'timestamp' => date('Y-m-d H:i:s')
];

$existingFile = [];
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $existingFile = json_decode($jsonData, true);
    if (!is_array($existingFile)) {
        $existingFile = [];
    }
}

$existingFile[] = $generatedData;

if (file_put_contents($jsonFile, json_encode($existingFile, JSON_PRETTY_PRINT))) {
    $response = ['status' => 'success', 'message' => "Data is placed successfully"];
    // redirect("../generated_question.php", $response['message']);
} else {
    $response = ['status' => 'error', 'message' => 'Failed to save order'];
}

echo json_encode($response);  // Output response as JSON
?>
