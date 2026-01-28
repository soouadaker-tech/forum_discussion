<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $ordre = $_POST['ordre'];

    $stmt = $pdo->prepare("INSERT INTO categories (nom, description, ordre) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $description, $ordre]);

    header("Location: index.php");
    exit;
}
?>

<h2>Ajouter une catégorie</h2>
<form method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="ordre" class="form-label">Ordre</label>
        <input type="number" name="ordre" id="ordre" class="form-control" value="1">
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>

<?php include 'forum/config/includes/footer.php'; ?>
