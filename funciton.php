<?php
$host = '127.0.0.1';
$db   = 'your_database';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// INSERT INTO raksti VALUES title, text
$title = 'your title';
$text = 'your text';
$stmt = $pdo->prepare("INSERT INTO raksti (title, text) VALUES (:title, :text)");
$stmt->execute(['title' => $title, 'text' => $text]);

// SELECT title, text FROM raksti
$stmt = $pdo->query("SELECT title, text FROM raksti");
while ($row = $stmt->fetch())
{
    echo $row['title'].' '.$row['text']."\n";
}

// UPDATE raksti SET text = $text WHERE id = $id
$id = 1;
$text = 'updated text';
$stmt = $pdo->prepare("UPDATE raksti SET text = :text WHERE id = :id");
$stmt->execute(['id' => $id, 'text' => $text]);

// DELETE * FROM raksti WHERE id = $id
$id = 1;
$stmt = $pdo->prepare("DELETE FROM raksti WHERE id = :id");
$stmt->execute(['id' => $id]);
?>
