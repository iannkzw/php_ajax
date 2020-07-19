<?php
header('Content-Type: aplication/json');

$conn = new PDO('mysql:host=localhost;dbname=comment_ajax', 'ian', '');

$stmt = $conn->prepare('SELECT * FROM comment');
$stmt->execute();

if ($stmt->rowCount() >= 1) {
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} else {
    echo json_encode('Falha ao selecionar');
}