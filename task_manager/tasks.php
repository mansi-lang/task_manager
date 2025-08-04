<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) header("Location: login.php");

// --- Add or Update Task ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $due = $_POST['due_date'];

    if (!empty($_POST['task_id'])) {
        // Update task if task_id is set
        $task_id = $_POST['task_id'];
        $conn->query("UPDATE tasks SET title='$title', description='$desc', due_date='$due' WHERE id=$task_id");
    } else {
        // Insert task
        $conn->query("INSERT INTO tasks (title, description, due_date) 
                      VALUES ('$title', '$desc', '$due')");
    }
    header("Location: tasks.php");
    exit;   
}

// --- Delete Task ---
if (isset($_GET['delete'])) {
    $task_id = $_GET['delete'];
    $conn->query("DELETE FROM tasks WHERE id=$task_id");
    header("Location: tasks.php");
    exit;
}

// --- Mark Complete ---
if (isset($_GET['complete'])) {
    $task_id = $_GET['complete'];
    $conn->query("UPDATE tasks SET status='completed' WHERE id=$task_id");
    header("Location: tasks.php");
    exit;
}

// --- Mark Pending ---
if (isset($_GET['pending'])) {
    $task_id = $_GET['pending'];
    $conn->query("UPDATE tasks SET status='pending' WHERE id=$task_id");
    header("Location: tasks.php");
    exit;
}

// --- Edit Task ---
$edit_task = null;
if (isset($_GET['edit'])) {
    $task_id = $_GET['edit'];
    $edit_result = $conn->query("SELECT * FROM tasks WHERE id=$task_id");
    $edit_task = $edit_result->fetch_assoc();
}

// --- Fetch Tasks ---
$tasks = $conn->query("SELECT * FROM tasks");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="text-center mb-3">Your Tasks</h2>

        <!-- Task Form (Add / Edit) -->
        <form id="taskForm" method="post">
            <input type="hidden" name="task_id" value="<?= $edit_task['id'] ?? '' ?>">
            <input type="text" name="title" placeholder="Title" value="<?= $edit_task['title'] ?? '' ?>" required>
            <input type="text" name="description" placeholder="Description" value="<?= $edit_task['description'] ?? '' ?>" required>
            <input type="date" name="due_date" value="<?= $edit_task['due_date'] ?? '' ?>">
            <button type="submit"><?= $edit_task ? 'Update Task' : 'Add Task' ?></button>
        </form>

        <!-- Task Table -->
        <table class="table table-bordered table-striped text-center mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tasks && $tasks->num_rows > 0) { 
                    while ($row = $tasks->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['due_date'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <a href="?complete=<?= $row['id'] ?>" class="btn btn-success btn-sm">Complete</a>
                                <a href="?pending=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Pending</a>
                                <a href="?edit=<?= $row['id'] ?>" onclick="return confirm('Edit this task?')" class="btn btn-info btn-sm">Edit</a>
                                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this task?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                <?php } } else { ?>
                        <tr><td colspan="5">No tasks found.</td></tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Navigation -->
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">Home</a>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>
