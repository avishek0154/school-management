<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Manement</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo" height="80px"></a>
            <div class="navbar-nav d-flex flex-row">
                <?php
                    $page = basename($_SERVER['REQUEST_URI']);
                ?>
                <a class="nav-link me-3 <?php if($page=="" || $page=="index.php") {echo "active";} ?>" aria-current="page" href="index.php">Home</a>
                <a class="nav-link me-3 <?php if($page=="teacher.php") {echo "active";} ?>" aria-current="page" href="teacher.php">Teachers</a>
                <a class="nav-link me-3 <?php if($page=="pupil.php") {echo "active";} ?>" aria-current="page" href="pupil.php">Pupils</a>
                <a class="nav-link me-3 <?php if($page=="classes.php") {echo "active";} ?>" aria-current="page" href="classes.php">Classes</a>
                <a class="nav-link me-3 <?php if($page=="gurdian.php") {echo "active";} ?>" aria-current="page" href="gurdian.php">Gurdians</a>
            </div>
        </div>
    </nav>
</div>