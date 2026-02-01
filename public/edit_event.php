<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$id = $_GET['id'] ?? null;
$event = $id ? getEventById($conn, $id) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    if (updateEvent($conn, $id, $title, $location, $event_date)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating event.";
    }
}

include __DIR__ . '/../includes/header.php';
?>

<h2>Edit Event</h2>
<form id="editEventForm" method="POST" action="edit_event.php?id=<?= $event['id'] ?>">

    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($event['title']) ?>" required><br>
    
    <label>Location:</label>
    <input type="text" name="location" value="<?= htmlspecialchars($event['location']) ?>" required><br>
    
    <label>Date:</label>
    <input type="date" name="event_date" value="<?= htmlspecialchars($event['event_date']) ?>" required><br>
    
    <button type="submit">Edit Event</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
