<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

$stmt = $pdo->query("SELECT * FROM categories ORDER BY ordre ASC");
$categories = $stmt->fetchAll();
?>

<div class="wrapper"> 
    <div class="content container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Catégories du Forum</h2>
            <a href="ajouter_category.php" class="btn btn-primary">Ajouter une catégorie</a>
        </div>

        <div class="list-group">
            <?php foreach ($categories as $cat): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="sujets.php?cat=<?= $cat['id'] ?>" class="text-black text-decoration-none">
                            <h5 class="mb-1"><?= htmlspecialchars($cat['nom']) ?></h5>
                            <p class="mb-1"><?= htmlspecialchars($cat['description']) ?></p>
                        </a>
                    </div>
                    <div>
                        <a href="modifier_category.php?id=<?= $cat['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                        <a href="supprimer_category.php?id=<?= $cat['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>


</div>

    <?php include 'forum/config/includes/footer.php'; ?>