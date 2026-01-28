<?php
require 'forum/config/database.php';
include 'forum/config/includes/header.php';

$sujet_id = $_GET['sujet'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auteur = $_POST['auteur'];
    $contenu = $_POST['contenu'];

    $stmt = $pdo->prepare("INSERT INTO messages (sujet_id, auteur, contenu) VALUES (?, ?, ?)");
    $stmt->execute([$sujet_id, $auteur, $contenu]);

    header("Location: messages.php?sujet=$sujet_id");
    exit;
}
?>

<h2>Ajouter un message</h2>
<form method="post">
    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="contenu" class="form-label">Message</label>
        <textarea name="contenu" id="contenu" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php include 'forum/config/includes/footer.php'; ?>
