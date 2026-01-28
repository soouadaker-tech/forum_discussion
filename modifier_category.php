<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$cat = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $ordre = $_POST['ordre'];

    $stmt = $pdo->prepare("UPDATE categories SET nom = ?, description = ?, ordre = ? WHERE id = ?");
    $stmt->execute([$nom, $description, $ordre, $id]);

    header("Location: index.php");
    exit;
}
?>

<h2>Modifier la catégorie</h2>
<form method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?= htmlspecialchars($cat['nom']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control"><?= htmlspecialchars($cat['description']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="ordre" class="form-label">Ordre</label>
        <input type="number" name="ordre" id="ordre" class="form-control" value="<?= $cat['ordre'] ?>">
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
</form>

<?php include 'forum/config/includes/footer.php'; ?>
