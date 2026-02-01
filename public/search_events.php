<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

$query = $_GET['q'] ?? '';
$events = getAllEvents($conn, $query);

foreach ($events as $event) {
    echo "<tr>
            <td>" . htmlspecialchars($event['id']) . "</td>
            <td>" . htmlspecialchars($event['title']) . "</td>
            <td>" . htmlspecialchars($event['location']) . "</td>
            <td>" . htmlspecialchars($event['event_date']) . "</td>
            <td>
                <a href='edit_event.php?id=" . $event['id'] . "'>Edit</a> |
                <a href='delete_event.php?id=" . $event['id'] . "' class='delete-btn'>Delete</a> |
                <a href='register_attendee.php?event_id=" . $event['id'] . "'>Register Attendee</a>
            </td>
          </tr>";
}
?>
