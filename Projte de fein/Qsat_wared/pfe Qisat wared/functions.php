<?php

function getAllFleurs($pdo){

    $sql = "SELECT * FROM fleurs";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
function addFleur(
    $pdo,
    $nom,
    $prix,
    $size,
    $couleur,
    $image
){

    $sql = "INSERT INTO fleurs
    (nom,prix,size,couleur,image)
    VALUES(?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $nom,
        $prix,
        $size,
        $couleur,
        $image
    ]);
}
function getFleurById($pdo,$id){

    $stmt = $pdo->prepare(
        "SELECT * FROM fleurs WHERE id=?"
    );

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
