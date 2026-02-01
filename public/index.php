<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();
// Ensure both tables exist
ensureEventsTable($conn);
ensureAttendeesTable($conn);


include __DIR__ . '/../includes/header.php';
?>

<h2>Event List</h2>

<!-- Search input for live search + autocomplete -->
<input type="text" id="search" name="search" placeholder="Search events...">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Event</th>
            <th>Location</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="eventsBody">
        <!-- Ajax will populate this dynamically -->
    </tbody>
</table>

<div class="actions">
    <a href="add_event.php">Add Event</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

