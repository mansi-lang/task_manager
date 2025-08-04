<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) header("Location: login.php");

$id = $_SESSION['id'];
$sql = $conn->query("SELECT name,email,join_date,photo FROM users WHERE id=$id");
$user = $sql->fetch_assoc();

// Upload new photo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $file = $_FILES['photo']['name'];
    if (!is_dir("uploads")) mkdir("uploads");
    move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$file);
    $conn->query("UPDATE users SET photo='$file' WHERE id=$id");
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 text-center shadow" style="width: 320px;">
    <h2 class="mb-3">Profile</h2>
    <p><strong>Name:</strong> <?= $user['name'] ?></p>
    <p><strong>Email:</strong> <?= $user['email'] ?></p>
    <p><strong>Joined:</strong> <?= $user['join_date'] ?></p>
    <img src="uploads/<?= $user['photo'] ?>" class="img-fluid rounded-circle mb-3" width="120" height="120">

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary w-100">Upload</button>
    </form>

    <div class="d-flex justify-content-between mt-3">
        <a href="index.php" class="btn btn-secondary btn-sm">Home</a>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</div>
<script src="js/script.js"></script>

</body>
</html> 
