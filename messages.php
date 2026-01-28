<?php
require 'forum/config/database.php';
require 'forum/config/includes/bbcode.php';
include 'forum/config/includes/header.php';

$sujet_id = $_GET['sujet'] ?? 0; 
$stmt = $pdo->prepare("SELECT * FROM messages WHERE sujet_id = ? ORDER BY date_creation ASC"); 
$stmt->execute([$sujet_id]); $messages = $stmt->fetchAll(); ?> 
<h2>Messages du sujet</h2> 
<table id="messagesTable" class="table table-striped"> 
    <thead>
         <tr>
             <th>Auteur</th>
              <th>Contenu</th> 
              <th>Date</th> 
            </tr>
         </thead> 
            <tbody>
                 <?php foreach ($messages as $m): ?> <tr> <td><?= htmlspecialchars($m['auteur']) ?></td>
                    <td><?= bbcode_to_html(htmlspecialchars($m['contenu'])) ?></td>
                    <td><?= $m['date_creation'] ?></td> </tr> <?php endforeach; ?> 
            </tbody> 
</table> 
<a href="ajouter_message.php?sujet=<?= $sujet_id ?>" class="btn btn-success mt-3">Ajouter un message</a>
<script>
$(document).ready(function() {
    $('#messagesTable').DataTable({
        "pageLength": 5, 
        "lengthMenu": [5, 10, 25, 50],
        "order": [[2, "asc"]] 
    });
});
</script>


<?php include 'forum/config/includes/footer.php'; ?>