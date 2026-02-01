<?php
require_once __DIR__ . '/../config/db.php';

$title = $_GET['title'] ?? '';
$response = ['exists' => false];

if ($title) {
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM events WHERE title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result['count'] > 0) {
        $response['exists'] = true;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
