<?php
require 'forum/config/database.php';

// Récupérer les 10 derniers messages
$messages = $pdo->query("SELECT * FROM messages ORDER BY date_creation DESC LIMIT 10")->fetchAll();

// En-têtes RSS
header("Content-Type: application/rss+xml; charset=UTF-8");

echo "<?xml version='1.0' encoding='UTF-8'?>";
?>
<rss version="2.0">
<channel>
    <title>Forum de Discussion - Derniers messages</title>
    <link>http://votresite/forum</link>
    <description>Flux RSS des derniers messages du forum</description>
    <?php foreach ($messages as $m): ?>
    <item>
        <title><?= htmlspecialchars($m['auteur']) ?></title>
        <description><?= htmlspecialchars($m['contenu']) ?></description>
        <pubDate><?= date(DATE_RSS, strtotime($m['date_creation'])) ?></pubDate>
        <link>http://votresite/messages.php?sujet=<?= $m['sujet_id'] ?></link>
    </item>
    <?php endforeach; ?>
</channel>
</rss>
