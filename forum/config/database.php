<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'so_ouadaker_forum_discussion');
define('DB_USER', 'so_ouadaker_Soufiane');
define('DB_PASS', 'scYzBkH8|1U3dWsy');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
