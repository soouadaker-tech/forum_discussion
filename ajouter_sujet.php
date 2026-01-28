<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

$cat_id = $_GET['cat'] ?? 0;
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];

    $stmt = $pdo->prepare("INSERT INTO sujets (categorie_id, titre, auteur) VALUES (?, ?, ?)");
    $stmt->execute([$cat_id, $titre, $auteur]);

    $sujet_id = $pdo->lastInsertId();
    header("Location: messages.php?sujet=$sujet_id");
    exit;
}
?>

<h2>Nouveau Sujet</h2>
<form method="post">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre du sujet</label>
        <input type="text" name="titre" id="titre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Créer</button>
</form>

<?php include 'forum/config/includes/footer.php'; ?>
