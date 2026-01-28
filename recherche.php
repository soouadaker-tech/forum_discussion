<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

$query = $_GET['q'] ?? '';
$results = [];

if ($query) {
    $stmt = $pdo->prepare("SELECT * FROM sujets WHERE titre LIKE ? OR auteur LIKE ?");
    $stmt->execute(["%$query%", "%$query%"]);
    $results = $stmt->fetchAll();
}
?>

<h2>Recherche</h2>
<form method="get" class="mb-3">
    <input type="text" name="q" class="form-control" placeholder="Rechercher..." value="<?= htmlspecialchars($query) ?>">
</form>

<?php if ($results): ?>
<ul class="list-group">
    <?php foreach ($results as $r): ?>
        <li class="list-group-item">
            <a href="messages.php?sujet=<?= $r['id'] ?>"><?= htmlspecialchars($r['titre']) ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php include 'forum/config/includes/footer.php'; ?>
