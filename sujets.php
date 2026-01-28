<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

$cat_id = $_GET['cat'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM sujets WHERE categorie_id = ? ORDER BY epingle DESC, date_creation DESC");
$stmt->execute([$cat_id]);
$sujets = $stmt->fetchAll();
?>

<h2>Sujets</h2>
<table id="forumTable" class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Vues</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sujets as $s): ?>
        <tr>
            <td><a href="messages.php?sujet=<?= $s['id'] ?>"><?= htmlspecialchars($s['titre']) ?></a></td>
            <td><?= htmlspecialchars($s['auteur']) ?></td>
            <td><?= $s['date_creation'] ?></td>
            <td><?= $s['vues'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#forumTable').DataTable({
        "pageLength": 10, 
        "lengthMenu": [5, 10, 25, 50],
        "order": [[2, "desc"]] 
    });
});
</script>

<?php include 'forum/config/includes/footer.php'; ?>
