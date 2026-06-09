<?php 
    include 'config/db.php'; 
    if(!isset($_SESSION['user'])) header("Location: login.php"); 
    $u=$_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="header">
            <img src="assets/img/logo.png">
            <h1>TENDO SECONDARY SCHOOL - SRS</h1>
            <div class="nav">Karibu, <?=$u['fullname']?> 
                <a href="logout.php">Toka</a>
            </div>
        </div>
        <div class="container"><h2>Dashboard</h2>
            <div class="grid">
                <a href="students.php" class="card">
                    <h3>Wanafunzi</h3>
                    <p>Angalia/Sajili</p>
                </a>
                <a href="add_student.php" class="card">
                    <h3>Sajili Mpya</h3>
                    <p>Form 1-4</p>
                </a>
                <a href="allocate_subjects.php" class="card">
                    <h3>Masomo</h3>
                    <p>Peleka masomo</p>
                </a>
                <a href="results.php" class="card">
                    <h3>Matokeo</h3>
                    <p>Ingiza/Angalia</p>
                </a>
            </div>
        </div>
    </body>
</html>
