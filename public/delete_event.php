<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$id = $_GET['id'] ?? null;
if ($id) {
    deleteEvent($conn, $id);
}
header("Location: index.php?deleted=1");
exit;
