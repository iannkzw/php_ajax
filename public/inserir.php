<?php
header('Content-Type: aplication/json');

$name = filter_input(INPUT_POST, 'name');
$comment = filter_input(INPUT_POST, 'comment');

$conn = new PDO('mysql:host=localhost;dbname=comment_ajax', 'ian', '');

$stmt = $conn->prepare('INSERT INTO comment (name, comment) VALUES (:na, :co)');
$stmt->bindValue(':na', $name);
$stmt->bindValue(':co', $comment);
$stmt->execute();

if ($stmt->rowCount() >= 1)
{
    echo json_encode('Comentario salvo');
}
else
{
    echo json_encode('Falha ao salvar');
}