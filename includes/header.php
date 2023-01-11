<?php require 'php_scripts/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EMPLOYEE SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <?php if(isset($_SESSION['role'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">PROFILE</a>
                    </li>
                    <?php endif;?>
                    <?php if(isset($_SESSION['role'])&&$_SESSION['role']=='admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="crud.php">CRUD</a>
                    </li>
                    <?php endif;?>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">ABOUT</a>
                    </li>
                    <?php if (isset($_SESSION['role'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="logout.php">LOGOUT</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">LOGIN</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>