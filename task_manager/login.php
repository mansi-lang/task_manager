<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->bind_result($id, $name, $hashed_password);

    if ($sql->fetch()) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            header("Location: index.php");
            exit;
        } else {
            echo "<div class='text-danger text-center mt-3'>Invalid Password</div>";
        }
    } else {
        echo "<div class='text-danger text-center mt-3'>Invalid Email</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 320px;">
    <h2 class="text-center mb-3">Login</h2>
    <form id="loginForm" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

    <p class="mt-3 text-center">New user? <a href="register.php">Register here</a></p>
</div>
<script src="js/script.js"></script>

</body>
</html>
