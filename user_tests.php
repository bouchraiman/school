<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tests WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Erreur dans la requête: " . $conn->error);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Mes Tests de Niveaux - ALLAL SCHOOL</title>
    <link rel="stylesheet" href="profil.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <li><a href="user_dashboard.php"><i class='bx bxs-dashboard'></i><span class="nav-item">Tableau de Bord</span></a></li>
        <li><a href="user_tests.php"><i class='bx bx-check-circle'></i><span class="nav-item">Mes Tests de Niveaux</span></a></li>
        <li><a href="logout.php"><i class='bx bx-log-out'></i><span class="nav-item">Logout</span></a></li>
    </ul>
</nav>
<div class="main--content">
    <h1>Mes Tests de Niveaux</h1>
    <div class="table user">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Résultat</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id_test']; ?></td>
                    <td><?php echo htmlspecialchars($row['nom_test']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_test']); ?></td>
                    <td><?php echo htmlspecialchars($row['resultat_test']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
