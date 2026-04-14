<?php
$prenom    = '';
$nom       = '';
$email     = '';
$age       = '';
$filiere   = '';
$motivation = '';
$erreurs   = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $prenom     = $_POST['prenom']     ?? '';
    $nom        = $_POST['nom']        ?? '';
    $email      = $_POST['email']      ?? '';
    $age        = $_POST['age']        ?? '';
    $filiere    = $_POST['filiere']    ?? '';
    $motivation = $_POST['motivation'] ?? '';

    $reglement = isset($_POST['reglement']);

    if (empty($prenom)) {
    $erreurs[] = "Le prénom est obligatoire.";
    }

    if (empty($nom)) {
    $erreurs[] = "Le nom est obligatoire.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'adresse email est invalide.";
    }
    
    if (!is_numeric($age) || $age < 16 || $age > 30) {
    $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
    }

    if (empty($filiere)) {
    $erreurs[] = "Veuillez choisir une filière.";
    }

    if (strlen($motivation) < 30) {
    $erreurs[] = "La motivation doit contenir au moins 30 caractères.";
    }

    if (!$reglement) {
    $erreurs[] = "Vous devez accepter le règlement.";
    }


}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Candidature</title>
    <link rel="stylesheet" href="style.css">
</head>
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
J'ai lu et j'accepte le règlement
</label>

<button type="submit">Envoyer</button>

</form>

</body>
</html>