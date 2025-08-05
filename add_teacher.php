<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Ajouter Enseignant - ALLAL SCHOOL</title>
    <link rel="stylesheet" href="adm.css">
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="#" class="logo">
                <img src="FB_IMG_1709296500631.jpg" alt="">
                <span class="nav-item">ALLAL SCHOOL</span>
            </a>
        </li>
        <li><a href="admin_dashboard.php"><i class='bx bxs-school'></i><span class="nav-item">Administration</span></a></li>
        <li><a href="enseignant.php"><i class='bx bxs-user-plus'></i><span class="nav-item">Enseignant</span></a></li>
        <li><a href="apprenant.php"><i class='bx bxs-graduation'></i><span class="nav-item">Apprenant</span></a></li>
        <li><a href="type.php"><i class='bx bxl-typescript'></i><span class="nav-item">Types</span></a></li>
        <li><a href="logout.php"><i class='bx bx-log-out'></i><span class="nav-item">Logout</span></a></li>
    </ul>
</nav>
<div class="main--content">
    <h1>Ajouter Enseignant</h1>
    <form action="process_add_teacher.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="date_nais">Date de Naissance:</label>
        <input type="date" id="date_nais" name="date_nais" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required><br>
        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" required><br>
        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
