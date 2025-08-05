<?php
session_start();
include 'db_connection.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Récupérer les informations de l'utilisateur depuis la base de données
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

// Vérifier les erreurs de requête
if (!$result) {
    die("Erreur dans la requête: " . $conn->error);
}

$user = $result->fetch_assoc();

if (!$user) {
    die("Utilisateur non trouvé.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametre - ALLAL SCHOOL</title>
    <link rel="stylesheet" href="profil.css">
     
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="FB_IMG_1709296500631.jpg" alt="ALLAL SCHOOL">
                    <span class="nav-item">ALLAL SCHOOL</span>
                </a>
            </li>

            <li><a href="user_dashboard.php">
                <i class='bx bx-home'></i>
                <span class="nav-item">Accueil</span>               
            </a>
        
        </li>
            <li><a href="profil.php">
                <i class='bx bxs-user'></i>
                <span class="nav-item">Profil</span>
            </a></li>
            <li><a href="cours.php">
                <i class='bx bx-book-open bx-tada'></i>
                <span class="nav-item">Cours en Ligne</span>
            </a></li>
            <li><a href="parametre.php">
                <i class='bx bx-cog'></i>
                <span class="nav-item">Parametre</span>
            </a></li>
            <li><a href="logout.php" class="logout">
                <i class='bx bx-log-out'></i>
                <span class="nav-item">Logout</span>
            </a></li>
        </ul>
    </nav>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Parametre</span>
            </div>
            <div class="user--info">
                <form action="update_parametre.php" method="POST">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="" required><br>
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required><br>
                    <!-- Ajouter d'autres champs de paramètres nécessaires -->
                    <button type="submit">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

