<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM enseignants WHERE id_ens = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $enseignant = $result->fetch_assoc();

    if (!$enseignant) {
        die("Enseignant non trouvé.");
    }
} else {
    die("ID de l'enseignant non fourni.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier Enseignant - ALLAL SCHOOL</title>
    <link rel="stylesheet" href="adm.css">
</head>
<body>
    <h2>Modifier Enseignant</h2>
    <form action="process_edit_teacher.php" method="post">
        <input type="hidden" name="id" value="<?php echo $enseignant['id_ens']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($enseignant['nom']); ?>" required><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($enseignant['prenom']); ?>" required><br>
        <label for="date_nais">Date de Naissance:</label>
        <input type="date" id="date_nais" name="date_nais" value="<?php echo htmlspecialchars($enseignant['date_nais']); ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($enseignant['email']); ?>" required><br>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($enseignant['adresse']); ?>" required><br>
        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" value="<?php echo htmlspecialchars($enseignant['grade']); ?>" required><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
