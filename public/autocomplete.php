<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

$q = $_GET['q'] ?? '';
$suggestions = [];

if ($q) {
    $stmt = $conn->prepare("SELECT title FROM events WHERE title LIKE ? LIMIT 5");
    $like = "%$q%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['title'];
    }
}

header('Content-Type: application/json');
echo json_encode($suggestions);

?>
