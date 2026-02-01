<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

$query = $_GET['q'] ?? '';

$sql = "SELECT attendees.id, attendees.name, attendees.email, events.title 
        FROM attendees 
        JOIN events ON attendees.event_id = events.id
        WHERE attendees.name LIKE ? OR attendees.email LIKE ? OR events.title LIKE ?";
$stmt = $conn->prepare($sql);
$like = "%" . $query . "%";
$stmt->bind_param("sss", $like, $like, $like);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['title']) . "</td>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
          </tr>";
}
?>
