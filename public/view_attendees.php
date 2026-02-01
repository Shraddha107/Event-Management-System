<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();
ensureAttendeesTable($conn);

include __DIR__ . '/../includes/header.php';
?>

<h2>All Registered Attendees</h2>

<!-- Search input for live search -->
<input type="text" id="attendeeSearch" name="attendeeSearch" placeholder="Search attendees...">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Event</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody id="attendeesBody">
        <!-- Ajax will populate this -->
    </tbody>
</table>

<a href="index.php">Back to Events</a>

<?php include __DIR__ . '/../includes/footer.php'; ?>
