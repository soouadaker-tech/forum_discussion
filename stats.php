<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

// Sujets populaires (par nombre de vues)
$popular = $pdo->query("SELECT * FROM sujets ORDER BY vues DESC LIMIT 5")->fetchAll();

// Auteurs actifs (par nombre de messages)
$active_authors = $pdo->query("SELECT auteur, COUNT(*) as nb 
                               FROM messages 
                               GROUP BY auteur 
                               ORDER BY nb DESC 
                               LIMIT 5")->fetchAll();
?>

<h2>Statistiques</h2>

<h4>Sujets populaires</h4>
<ul class="list-group mb-4">
    <?php foreach ($popular as $p): ?>
        <li class="list-group-item">
            <?= htmlspecialchars($p['titre']) ?> (<?= $p['vues'] ?> vues)
        </li>
    <?php endforeach; ?>
</ul>

<h4>Auteurs les plus actifs</h4>
<ul class="list-group">
    <?php foreach ($active_authors as $a): ?>
        <li class="list-group-item">
            <?= htmlspecialchars($a['auteur']) ?> (<?= $a['nb'] ?> messages)
        </li>
    <?php endforeach; ?>
</ul>

<?php include 'forum/config/includes/footer.php'; ?>
