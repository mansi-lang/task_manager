<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 320px;">
    <h2 class="text-center mb-3">Register</h2>
    <form id="registerForm" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="cpassword" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
</form>

    <p class="mt-3 text-center">
        Already have an account? <a href="login.php">Login</a>
    </p>
</div>
<script src="js/script.js"></script>

</body>
</html>

<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $cpassword = $_POST['cpassword'];

    if ($_POST["password"] !== $cpassword) {
        echo "<div class='text-danger text-center mt-3'>Passwords do not match...</div>";
        exit;
    }

    $sql = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $name, $email, $password);

    if ($sql->execute()) {
        header("Location: login.php");
    }
}
?>
