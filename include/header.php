<?php require_once "scripts/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <style>
        nav a.nav-link {
            color: #fff !important;
        }
    </style>

    <title>Home Services</title>
</head>

<body>
    <nav class="nav bg-dark">
        <?php if (!isset($_SESSION['user'])): ?>
        <a class="nav-link active" href="index.php">Find Service Provider</a>
        <a class="nav-link" href="login.php">Login</a>
        <a class="nav-link" href="register.php">Register Service Provider</a>
        <a class="nav-link" href="about.php">About</a>

        <?php elseif ($_SESSION['user']->name == 'admin'): ?>
        <a class="nav-link" href="managehall.php">Manage Providers</a>
        <a class="nav-link" href="admin.php">Manage Booking</a>
        <a class="nav-link" href="logout.php">Log Out</a>

        <?php else: ?>
        <a class="nav-link" href="logout.php">Log Out</a>
        <?php endif; ?>

    </nav>