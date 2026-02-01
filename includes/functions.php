<?php
function ensureEventsTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        location VARCHAR(255) NOT NULL,
        event_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql)) {
        die("Error creating events table: " . $conn->error);
    }
}

function ensureAttendeesTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS attendees (
        id INT AUTO_INCREMENT PRIMARY KEY,
        event_id INT NOT NULL,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        FOREIGN KEY (event_id) REFERENCES events(id)
    )";

    if (!$conn->query($sql)) {
        die("Error creating attendees table: " . $conn->error);
    }
}

function requireLogin() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}


function getAllEvents($conn, $search = null) {
    if ($search) {
        $stmt = $conn->prepare("SELECT * FROM events WHERE title LIKE ? OR location LIKE ? ORDER BY event_date ASC");
        $like = "%$search%";
        $stmt->bind_param("ss", $like, $like);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } else {
        $result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

function createEvent($conn, $title, $location, $event_date) {
    $stmt = $conn->prepare("INSERT INTO events (title, location, event_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $location, $event_date);
    return $stmt->execute();
}

function getEventById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateEvent($conn, $id, $title, $location, $event_date) {
    $stmt = $conn->prepare("UPDATE events SET title = ?, location = ?, event_date = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $location, $event_date, $id);
    return $stmt->execute();
}

function deleteEvent($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

?>