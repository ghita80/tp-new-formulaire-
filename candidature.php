<?php
$prenom    = '';
$nom       = '';
$email     = '';
$age       = '';
$filiere   = '';
$motivation = '';
$erreurs   = [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Candidature</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="candidature.php" method="POST">

<label>Prénom :</label>
<input type="text" name="prenom">

<label>Nom :</label>
<input type="text" name="nom">

<label>Email :</label>
<input type="email" name="email">

<label>Âge :</label>
<input type="number" name="age">

<label>Filière :</label>
<select name="filiere">
    <option value="">-- Choisir --</option>
    <option value="Informatique">Informatique</option>
    <option value="Électronique">Électronique</option>
    <option value="Mécanique">Mécanique</option>
    <option value="Autre">Autre</option>
</select>

<label>Motivation :</label>
<textarea name="motivation" rows="6"></textarea>

<label>
<input type="checkbox" name="reglement" value="1">
J'ai lu et j'accepte le règlement.

</body>
</html>