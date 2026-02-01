<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();
ensureAttendeesTable($conn);

$event_id = $_GET['event_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO attendees (event_id, name, email) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $event_id, $name, $email);

    if ($stmt->execute()) {
        header("Location: view_attendees.php?event_id=" . $event_id);
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
    exit;
}

include __DIR__ . '/../includes/header.php';
?>

<h2>Register Attendee</h2>
<form method="POST" action="register_attendee.php">
    <input type="hidden" name="event_id" value="<?= htmlspecialchars($event_id) ?>">

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Register</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
