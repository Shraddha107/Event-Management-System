<?php
session_start();

// Hard-coded single user credentials
$validEmail = "shraddha@example.com";

// Hash for password "1234"
$validHash = '$2y$10$Hj89jaMtMruTCRfKMPEFaecPIBOgiQEy9Mo46bNShxrxNdGPemSo2';

// Error message placeholder
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check against hard-coded credentials
    if ($email === $validEmail && password_verify($password, $validHash)) {
        $_SESSION['user_id'] = 1; // fixed ID for single user
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" id="login-form" action="login.php">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</div>
</body>
</html>
