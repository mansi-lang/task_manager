<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 text-center shadow" style="width: 300px;">
        <h2 class="mb-3">Welcome, <?= $_SESSION['name'] ?>!</h2>
        <div class="d-flex flex-column gap-2">
            <a href="profile.php" class="btn btn-primary">Profile</a>
            <a href="tasks.php" class="btn btn-success">Manage Tasks</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
<script src="js/script.js"></script>

</body>
</html>
