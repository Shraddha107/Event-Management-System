<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    if (createEvent($conn, $title, $location, $event_date)) {
        echo "success";
    } else {
        echo "error";
    }
    exit;
}

include __DIR__ . '/../includes/header.php';
?>

<h2>Add Event</h2>
<form id="addEventForm" method="POST" action="add_event.php">
    <label>Title:</label>
    <input type="text" name="title" id="title" required>
    <div id="titleMsg" class="validation-msg"></div>

    <label>Location:</label>
    <input type="text" name="location" id="location" required>

    <label>Date:</label>
    <input type="date" name="event_date" id="event_date" required>

    <button type="submit">Add</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
