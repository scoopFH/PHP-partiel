<?php require_once 'bdd.php';

function getinfo()
{
    $pdo = getPdo();
    $query = 'SELECT * FROM users';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$row) {
        return null;
    }

    return $row;
}

